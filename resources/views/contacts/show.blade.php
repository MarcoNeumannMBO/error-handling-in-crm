<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $contact->first_name }} {{ $contact->last_name }}</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto space-y-4">
        <div class="bg-white p-6 shadow rounded">
            <h3 class="text-lg font-bold mb-2">Contact Info</h3>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p><strong>Company:</strong> {{ $contact->company->company_name }}</p>
        </div>

        <div class="bg-white p-6 shadow rounded">

            <div class="bg-white p-6 shadow rounded" x-data="{ interactionOpen: false }">
                <h3 class="text-lg font-bold mb-4">Interactions</h3>
                <!-- Open modal knop -->
                <div class="flex justify-end mb-4">
                    <button @click="interactionOpen = true" class="px-4 py-2 bg-indigo-600 text-white rounded">
                        Add Interaction
                    </button>
                </div>
            
                <!-- Modal -->
                <div x-show="interactionOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
                    <div class="bg-white p-6 rounded shadow-lg w-full max-w-md" @click.away="interactionOpen = false">
                        <h2 class="text-xl font-bold mb-4">New Interaction</h2>
            
                        <form action="{{ route('interactions.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="contact_id" value="{{ $contact->id }}">
            
                            <div>
                                <label for="type">Type interactie</label>
                                <select name="interaction_type" class="w-full border px-3 py-2 rounded">
                                    <option value="email">E-mail</option>
                                    <option value="call">Call</option>
                                    <option value="meeting">Meeting</option>
                                </select>
                            </div>

                            <div>
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" class="w-full border px-3 py-2 rounded" required />
                            </div>
            
                            <div>
                                <label for="content">notes</label>
                                <textarea name="notes" class="w-full border px-3 py-2 rounded" rows="4" required ></textarea>
                            </div>

            
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="interactionOpen = false" class="px-4 py-2 border rounded">Annuleren</button>
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Opslaan</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            <ul class="space-y-4">
                @foreach($contact->interactions as $interaction)
                    <li class="bg-white p-4 shadow rounded">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-lg font-semibold">{{ ucfirst($interaction->type) }}</h4>
                            <span class="text-sm text-gray-500">{{ $interaction->interaction_date }} {{ $interaction->interaction_time }}</span>
                        </div>
                        <p class="text-gray-700"><strong>Onderwerp:</strong> {{ $interaction->subject }}</p>
                        <p class="text-gray-700 mt-2"><strong>Notities:</strong> {{ $interaction->notes }}</p>
                    </li>
                @endforeach
            </ul>
            </div>
            
            
        </div>
    </div>
</x-app-layout>
