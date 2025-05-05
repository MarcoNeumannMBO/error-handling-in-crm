<div>
    <h2 class="text-xl font-bold mb-4">Contact List (Livewire)</h2>
    <ul>
        @foreach(App\Models\Contact::all() as $contact)
            <li class="border-b py-2">{{ $contact->first_name }} {{ $contact->last_name }}</li>
        @endforeach
    </ul>
</div>
