<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Interactions</h2>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto">
        <div class="bg-white shadow rounded p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Date</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Type</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Subject</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Contact</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($interactions as $interaction)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $interaction->interaction_date }}</td>
                            <td class="px-6 py-4">{{ $interaction->type }}</td>
                            <td class="px-6 py-4">{{ $interaction->subject }}</td>
                            <td class="px-6 py-4">{{ $interaction->contact->first_name }} {{ $interaction->contact->last_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
