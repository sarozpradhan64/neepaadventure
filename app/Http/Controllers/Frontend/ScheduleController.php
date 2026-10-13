<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceDeparture;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceDeparture::with('service')
            ->where('start_date', '>=', now()->startOfDay())
            ->whereIn('status', ['Available', 'Guaranteed'])
            ->orderBy('start_date');

        if ($request->has('season') && $request->season != '') {
            if ($request->season == 'spring') {
                $query->whereMonth('start_date', '>=', 3)->whereMonth('start_date', '<=', 5);
            } elseif ($request->season == 'autumn') {
                $query->where(function ($q) {
                    $q->whereMonth('start_date', '>=', 9)->whereMonth('start_date', '<=', 11);
                });
            }
        }

        if ($request->ajax()) {
            $departures = $query->take(3)->get();

            return view('components.departures-list', compact('departures'))->render();
        }

        $departures = $query->paginate(12);

        return view('schedules', compact('departures'));
    }
}
