<x-layouts.admin>
    <x-slot:title>Manage Departures</x-slot:title>

    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-2xl font-bold tracking-tight">Departures</h2>
            <x-ui.button href="{{ route('admin.service-departures.create') }}">
                <x-slot:before>
                    <x-lucide-plus class="size-4" />
                </x-slot:before>
                Add Departure
            </x-ui.button>
        </div>

        <x-ui.card>
            <div class="relative w-full overflow-auto rounded-lg">
                <table class="w-full caption-bottom text-sm">
                    <thead class="bg-muted/50 border-border border-b">
                        <tr class="hover:bg-muted/50 transition-colors">
                            <th class="text-muted-foreground h-12 w-[50px] px-4 text-left align-middle font-medium">
                                ID
                            </th>
                            <th class="text-muted-foreground h-12 px-4 text-left align-middle font-medium">Service</th>
                            <th class="text-muted-foreground h-12 px-4 text-left align-middle font-medium">Dates</th>
                            <th class="text-muted-foreground h-12 px-4 text-left align-middle font-medium">Seats</th>
                            <th class="text-muted-foreground h-12 px-4 text-left align-middle font-medium">Status</th>
                            <th class="text-muted-foreground h-12 w-[100px] px-4 text-right align-middle font-medium">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-border border-border divide-y border-b">
                        @forelse ($departures as $departure)
                            <tr class="hover:bg-muted/50 transition-colors">
                                <td class="p-4 align-middle">{{ $departure->id }}</td>
                                <td class="p-4 align-middle font-medium">{{ $departure->service->title ?? 'N/A' }}</td>
                                <td class="p-4 align-middle">
                                    {{ $departure->start_date->format('M d, Y') }} – {{ $departure->end_date->format('M d, Y') }}
                                </td>
                                <td class="p-4 align-middle">
                                    {{ $departure->seats_booked }} / {{ $departure->seats_total }}
                                </td>
                                <td class="p-4 align-middle">
                                    <span
                                        class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-semibold
                                        @if($departure->status === 'Available') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300
                                        @elseif($departure->status === 'Guaranteed') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300
                                        @elseif($departure->status === 'Full') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300
                                        @else bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-300 @endif
                                    "
                                    >
                                        {{ $departure->status }}
                                    </span>
                                </td>
                                <td class="p-4 text-right align-middle">
                                    <div class="flex items-center justify-end gap-2">
                                        <x-ui.button
                                            variant="ghost"
                                            size="icon"
                                            class="size-8"
                                            href="{{ route('admin.service-departures.edit', $departure) }}"
                                        >
                                            <x-lucide-pencil class="text-muted-foreground size-4" />
                                            <span class="sr-only">Edit</span>
                                        </x-ui.button>
                                        <form
                                            action="{{ route('admin.service-departures.destroy', $departure) }}"
                                            method="POST"
                                            onsubmit="
                                                return confirm('Are you sure you want to delete this departure?');
                                            "
                                            class="inline-block"
                                        >
                                            @csrf
                                            @method('DELETE')
                                            <x-ui.button type="submit" variant="ghost" size="icon" class="size-8">
                                                <x-lucide-trash-2 class="text-destructive size-4" />
                                                <span class="sr-only">Delete</span>
                                            </x-ui.button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted-foreground p-8 text-center">No departures found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($departures->hasPages())
                <div class="border-t p-4">{{ $departures->links() }}</div>
            @endif
        </x-ui.card>
    </div>
</x-layouts.admin>
