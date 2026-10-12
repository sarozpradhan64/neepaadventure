<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceDeparture;
use Blaze\AdminCore\Models\Enquiry;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\ServiceCategory;
use Blaze\AdminCore\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrekController extends Controller
{
    public function index(Request $request): RedirectResponse
    {
        $firstCategory = ServiceCategory::whereNull('parent_id')
            ->where('status', true)
            ->orderBy('sort_order')
            ->first();

        if ($firstCategory) {
            return redirect()->route('services.category', array_merge(
                ['categorySlug' => $firstCategory->slug],
                $request->query()
            ), 301);
        }

        return redirect()->route('home', [], 301);
    }

    public function category(Request $request, string $categorySlug): View
    {
        $category = ServiceCategory::where('slug', $categorySlug)
            ->where('status', true)
            ->with(['parent', 'children' => function ($query): void {
                $query->where('status', true)->orderBy('sort_order');
            }, 'seoMetadata'])
            ->firstOrFail();

        $categoryIds = $category->getAllCategoryIds();

        $query = Service::whereIn('service_category_id', $categoryIds)
            ->where('status', true)
            ->with(['features', 'category'])
            ->orderBy('sort_order');

        if ($request->filled('search')) {
            $search = trim((string) $request->input('search'));
            $query->where(function ($q) use ($search): void {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $services = $query->get();
        $childCategories = $category->children;
        $ancestors = $category->ancestors();

        return view('category-services', compact('category', 'services', 'childCategories', 'ancestors'));
    }

    public function show(string $categorySlug, ?string $serviceSlug = null): View
    {
        $slug = $serviceSlug ?? $categorySlug;

        $trek = Service::where('slug', $slug)
            ->where('status', true)
            ->with(['features', 'category.parent', 'seoMetadata'])
            ->firstOrFail();

        $departures = ServiceDeparture::where('service_id', $trek->id)
            ->where('status', 'Available')
            ->orderBy('start_date', 'asc')
            ->get();

        $testimonials = Testimonial::where('status', true)
            ->where(function ($query) use ($trek) {
                $query->where('service_id', $trek->id)
                    ->orWhereHas('services', function ($sq) use ($trek) {
                        $sq->where('services.id', $trek->id);
                    });
            })
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();

        if ($testimonials->isEmpty()) {
            $testimonials = Testimonial::where('status', true)
                ->where('is_featured', true)
                ->orderBy('sort_order')
                ->take(3)
                ->get();
        }

        return view('trek-detail', compact('trek', 'departures', 'testimonials'));
    }

    public function legacyShow(string $slug): RedirectResponse
    {
        $trek = Service::where('slug', $slug)->with('category')->firstOrFail();
        $categorySlug = $trek->category?->slug ?? 'trekking';

        return redirect()->route('services.show', [
            'categorySlug' => $categorySlug,
            'serviceSlug' => $trek->slug,
        ], 301);
    }

    public function book(Request $request, string $categorySlug, string $serviceSlug): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'departure_id' => 'nullable|string|max:100',
            'trekkers_count' => 'nullable|integer|min:1|max:50',
            'country' => 'nullable|string|max:100',
            'notes' => 'nullable|string',
        ]);

        $trek = Service::where('slug', $serviceSlug)
            ->where('status', true)
            ->firstOrFail();

        $trekkers = (int) ($validated['trekkers_count'] ?? 1);
        $totalPrice = $trek->price_from ? ($trek->price_from * $trekkers) : null;
        $deposit = $trek->deposit_requirement ?: '20% ($350 USD/person)';

        $departureInfo = 'Flexible / Custom Dates';
        if (! empty($validated['departure_id']) && is_numeric($validated['departure_id'])) {
            $dep = ServiceDeparture::find($validated['departure_id']);
            if ($dep) {
                $departureInfo = $dep->start_date?->format('M d, Y').' – '.$dep->end_date?->format('M d, Y');
            }
        } elseif (! empty($validated['departure_id'])) {
            $departureInfo = $validated['departure_id'];
        }

        $messageLines = [
            "Trek: {$trek->title}",
            "Selected Departure: {$departureInfo}",
            "Trekkers / Group Size: {$trekkers}",
            'Estimated Total: '.($totalPrice ? ('$'.number_format($totalPrice).' USD') : 'TBA'),
            "Deposit Terms: {$deposit}",
        ];

        if (! empty($validated['country'])) {
            $messageLines[] = "Country / Nationality: {$validated['country']}";
        }

        if (! empty($validated['notes'])) {
            $messageLines[] = "Special Requests / Medical / Diet:\n{$validated['notes']}";
        }

        $enquiry = Enquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'service_id' => $trek->id,
            'subject' => "Booking Request: {$trek->title} ({$departureInfo})",
            'message' => implode("\n", $messageLines),
            'status' => 'new',
            'priority' => 'high',
            'source' => 'Online Booking Form',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        $successMessage = "Thank you {$validated['name']}! Your booking reservation for {$trek->title} has been received. Our mountain operations team will contact you within 12 hours with permit clearance and confirmation.";

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
                'enquiry_id' => $enquiry->id,
            ]);
        }

        return back()->with('success', $successMessage);
    }
}
