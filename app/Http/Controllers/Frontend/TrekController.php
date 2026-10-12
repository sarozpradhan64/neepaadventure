<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceDeparture;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\ServiceCategory;
use Blaze\AdminCore\Models\Testimonial;
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

    public function show(string $slug)
    {
        $trek = Service::where('slug', $slug)
            ->where('status', true)
            ->with(['features', 'category', 'seoMetadata'])
            ->firstOrFail();

        // Let's also load the departures associated with this trek
        // assuming we have a relation named departures on Service
        // We'll just fetch them via ServiceDeparture model
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

        // If no service-specific reviews are linked yet, fall back to active featured testimonials
        if ($testimonials->isEmpty()) {
            $testimonials = Testimonial::where('status', true)
                ->where('is_featured', true)
                ->orderBy('sort_order')
                ->take(3)
                ->get();
        }

        return view('trek-detail', compact('trek', 'departures', 'testimonials'));
    }
}
