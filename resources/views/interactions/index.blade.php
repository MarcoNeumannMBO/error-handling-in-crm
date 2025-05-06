<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Interactions</h2>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto">
        <div class="bg-white shadow rounded p-4">
            <div class="bg-white p-6 shadow rounded" x-data="{ interactionOpen: false }">
    <!-- Open modal knop -->
    <div class="flex justify-end mb-4">
        <button @click="interactionOpen = true" class="px-4 py-2 bg-indigo-600 text-white rounded">
            Nieuwe interactie
        </button>
    </div>

    <!-- Modal -->
    <div x-show="interactionOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md" @click.away="interactionOpen = false">
            <h2 class="text-xl font-bold mb-4">Nieuwe interactie</h2>

            <form action="{{ route('interactions.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="company_id" value="{{ $company->id }}">

                <div>
                    <label for="type">Type interactie</label>
                    <select name="type" class="w-full border px-3 py-2 rounded">
                        <option value="notitie">Notitie</option>
                        <option value="telefoontje">Telefoontje</option>
                        <option value="afspraak">Afspraak</option>
                        <option value="e-mail">E-mail</option>
                    </select>
                </div>

                <div>
                    <label for="content">Inhoud</label>
                    <textarea name="content" class="w-full border px-3 py-2 rounded" rows="4" required></textarea>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" @click="interactionOpen = false" class="px-4 py-2 border rounded">Annuleren</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
