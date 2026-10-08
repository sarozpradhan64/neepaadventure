<?php

namespace App\Http\Controllers;

use App\Models\ServiceDeparture;
use Blaze\AdminCore\Models\Service;
use Illuminate\Http\Request;

class ServiceDepartureController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceDeparture::with('service')->orderBy('start_date', 'asc');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('service', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $departures = $query->paginate(20)->withQueryString();

        return view('admin.service-departures.index', compact('departures'));
    }

    public function create()
    {
        $services = Service::orderBy('title')->get();

        return view('admin.service-departures.form', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'seats_total' => 'required|integer|min:1',
            'seats_booked' => 'nullable|integer|min:0|max:'.$request->input('seats_total', 0),
            'status' => 'required|in:Available,Guaranteed,Full,Cancelled',
        ]);

        $validated['seats_booked'] = $validated['seats_booked'] ?? 0;

        ServiceDeparture::create($validated);

        return redirect()->route('admin.service-departures.index')->with('success', 'Departure created successfully.');
    }

    public function edit(ServiceDeparture $service_departure)
    {
        $services = Service::orderBy('title')->get();

        return view('admin.service-departures.form', ['departure' => $service_departure, 'services' => $services]);
    }

    public function update(Request $request, ServiceDeparture $service_departure)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'seats_total' => 'required|integer|min:1',
            'seats_booked' => 'nullable|integer|min:0|max:'.$request->input('seats_total', $service_departure->seats_total),
            'status' => 'required|in:Available,Guaranteed,Full,Cancelled',
        ]);

        $validated['seats_booked'] = $validated['seats_booked'] ?? 0;

        $service_departure->update($validated);

        return redirect()->route('admin.service-departures.index')->with('success', 'Departure updated successfully.');
    }

    public function destroy(ServiceDeparture $service_departure)
    {
        $service_departure->delete();

        return redirect()->route('admin.service-departures.index')->with('success', 'Departure deleted successfully.');
    }
}
