<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceDeparture;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            if ($request->input('source') === 'home' || $request->has('limit')) {
                $limit = (int) $request->input('limit', 3);
                $departures = $query->take($limit)->get();

                return view('components.departures-list', compact('departures'))->render();
            }

            $departures = $query->paginate(12);

            if ($request->wantsJson() || $request->has('partial')) {
                return response()->json([
                    'html' => view('components.departures-list', compact('departures'))->render(),
                    'total' => $departures->total(),
                    'count_text' => 'Showing '.$departures->total().' confirmed '.Str::plural('departure', $departures->total()),
                    'pagination' => $departures->hasPages() ? (string) $departures->withQueryString()->links() : '',
                ]);
            }

            return view('components.departures-list', compact('departures'))->render();
        }

        $departures = $query->paginate(12);

        return view('schedules', compact('departures'));
    }
}
