<div>
    <h2 class="text-xl font-bold mb-4">Company List (Livewire)</h2>
    <ul>
        @foreach(App\Models\Company::all() as $company)
            <li class="border-b py-2">{{ $company->name }}</li>
        @endforeach
    </ul>
</div>
