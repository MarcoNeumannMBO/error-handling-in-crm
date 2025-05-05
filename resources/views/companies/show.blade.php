<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $company->name }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-2">Company Info</h3>
                <p><strong>Address:</strong> {{ $company->address }}</p>
                <p><strong>Email:</strong> {{ $company->email }}</p>
                <p><strong>Phone:</strong> {{ $company->phone }}</p>
                <p><strong>VAT:</strong> {{ $company->vat_number }}</p>
            </div>

            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-4">Contacts</h3>
                <ul class="list-disc pl-5">
                    @foreach($company->contacts as $contact)
                        <li>{{ $contact->first_name }} {{ $contact->last_name }} ({{ $contact->email }})</li>
                    @endforeach
                </ul>
            </div>

            <div class="bg-white p-6 shadow rounded">
                <h3 class="text-lg font-bold mb-4">Invoices</h3>
                <ul class="list-disc pl-5">
                    @foreach($company->invoices as $invoice)
                        <li>#{{ $invoice->invoice_number }} - {{ $invoice->status }} - €{{ $invoice->total_amount }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
