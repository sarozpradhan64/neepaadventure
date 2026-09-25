<x-layouts.admin>
    <x-slot:title>{{ isset($departure) ? 'Edit Departure' : 'Add Departure' }}</x-slot:title>

    <div class="space-y-6 max-w-2xl mx-auto">
        <div class="flex items-center gap-4">
            <x-ui.button variant="ghost" size="icon" href="{{ route('admin.service-departures.index') }}" class="rounded-full">
                <x-lucide-arrow-left class="size-4" />
                <span class="sr-only">Back</span>
            </x-ui.button>
            <h2 class="text-2xl font-bold tracking-tight">{{ isset($departure) ? 'Edit Departure' : 'Add New Departure' }}</h2>
        </div>

        <form action="{{ isset($departure) ? route('admin.service-departures.update', $departure) : route('admin.service-departures.store') }}" method="POST">
            @csrf
            @if (isset($departure))
                @method('PUT')
            @endif

            <x-ui.card>
                <x-ui.card-content class="space-y-6 pt-6">
                    <x-ui.field>
                        <x-ui.field-label>Service</x-ui.field-label>
                        <select name="service_id" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50" required>
                            <option value="">Select Service...</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" @selected(old('service_id', $departure->service_id ?? '') == $service->id)>
                                    {{ $service->title }}
                                </option>
                            @endforeach
                        </select>
                        <x-ui.field-error name="service_id" />
                    </x-ui.field>

                    <div class="grid grid-cols-2 gap-4">
                        <x-ui.field>
                            <x-ui.field-label>Start Date</x-ui.field-label>
                            <x-ui.input type="date" name="start_date" value="{{ old('start_date', isset($departure) ? $departure->start_date->format('Y-m-d') : '') }}" required />
                            <x-ui.field-error name="start_date" />
                        </x-ui.field>
                        <x-ui.field>
                            <x-ui.field-label>End Date</x-ui.field-label>
                            <x-ui.input type="date" name="end_date" value="{{ old('end_date', isset($departure) ? $departure->end_date->format('Y-m-d') : '') }}" required />
                            <x-ui.field-error name="end_date" />
                        </x-ui.field>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <x-ui.field>
                            <x-ui.field-label>Total Seats</x-ui.field-label>
                            <x-ui.input type="number" min="1" name="seats_total" value="{{ old('seats_total', $departure->seats_total ?? '') }}" required />
                            <x-ui.field-error name="seats_total" />
                        </x-ui.field>
                        <x-ui.field>
                            <x-ui.field-label>Seats Booked</x-ui.field-label>
                            <x-ui.input type="number" min="0" name="seats_booked" value="{{ old('seats_booked', $departure->seats_booked ?? '0') }}" />
                            <x-ui.field-error name="seats_booked" />
                        </x-ui.field>
                    </div>

                    <x-ui.field>
                        <x-ui.field-label>Status</x-ui.field-label>
                        <select name="status" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-sm shadow-sm transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50" required>
                            @foreach(['Available', 'Guaranteed', 'Full', 'Cancelled'] as $status)
                                <option value="{{ $status }}" @selected(old('status', $departure->status ?? 'Available') == $status)>{{ $status }}</option>
                            @endforeach
                        </select>
                        <x-ui.field-error name="status" />
                    </x-ui.field>
                </x-ui.card-content>
                <x-ui.card-footer class="flex justify-end gap-2 border-t pt-4">
                    <x-ui.button variant="outline" href="{{ route('admin.service-departures.index') }}">Cancel</x-ui.button>
                    <x-ui.button type="submit">Save Departure</x-ui.button>
                </x-ui.card-footer>
            </x-ui.card>
        </form>
    </div>
</x-layouts.admin>
