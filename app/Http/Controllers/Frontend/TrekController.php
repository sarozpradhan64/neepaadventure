<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceDeparture;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\Testimonial;

class TrekController extends Controller
{
    public function index()
    {
        // Get all active services
        $treks = Service::where('status', true)
            ->orderBy('sort_order')
            ->get();

        $difficulties = Service::where('status', true)
            ->whereNotNull('difficulty_level')
            ->where('difficulty_level', '!=', '')
            ->distinct()
            ->pluck('difficulty_level');

        $seasons = Service::where('status', true)
            ->whereNotNull('best_season')
            ->where('best_season', '!=', '')
            ->distinct()
            ->pluck('best_season');

        return view('treks', compact('treks', 'difficulties', 'seasons'));
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

        $testimonials = Testimonial::where('status', true)->orderBy('sort_order')->get();

        return view('trek-detail', compact('trek', 'departures', 'testimonials'));
    }
}
