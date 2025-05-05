<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $contact->first_name }} {{ $contact->last_name }}</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto space-y-4">
        <div class="bg-white p-6 shadow rounded">
            <h3 class="text-lg font-bold mb-2">Contact Info</h3>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p><strong>Company:</strong> {{ $contact->company->name }}</p>
        </div>

        <div class="bg-white p-6 shadow rounded">
            <h3 class="text-lg font-bold mb-4">Interactions</h3>
            <ul class="list-disc pl-5">
                @foreach($contact->interactions as $interaction)
                    <li>{{ $interaction->interaction_date }} - {{ $interaction->type }} - {{ $interaction->subject }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
