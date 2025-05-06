<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $company->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="bg-white p-6 shadow rounded">
                <h2 class="text-xl font-bold mb-2">Company Info</h2>
                <h3 class="text-4xl font-bold mb-2 text-blue-500">
                    {{ $company->company_name }}
                </h3>
                <p><strong>Address:</strong> {{ $company->address }}</p>
                <p><strong>Email:</strong> {{ $company->email }}</p>
                <p><strong>Phone:</strong> {{ $company->phone }}</p>
                <p><strong>VAT:</strong> {{ $company->vat_number }}</p>
            </div>

            <div class="bg-white p-6 shadow rounded">
<!-- Modal -->
<div x-data="{ open: false }">
    <!-- Modal toggle button -->
    <div class="flex justify-end">
        <button
            @click="open = true"
            class="px-4 py-2 bg-blue-600 text-white rounded flex items-center"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    </div>

    <!-- Modal content -->
    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md" @click.away="open = false">
            <h2 class="text-xl font-bold mb-4">Nieuw contactpersoon</h2>

            <form action="{{ route('contacts.store') }}" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="company_id" value="{{ $company->id }}">

                <div>
                    <label for="first name">Voornaam</label>
                    <input type="text" name="first_name" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div>
                    <label for="last_name">Achternaam</label>
                    <input type="text" name="last_name" class="w-full border px-3 py-2 rounded" required>
                </div>

                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="w-full border px-3 py-2 rounded">
                </div>

                <div>
                    <label for="phone">Telefoon</label>
                    <input type="text" name="phone" class="w-full border px-3 py-2 rounded">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" @click="open = false" class="px-4 py-2 border rounded">Annuleren</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
</div>


                <h3 class="text-lg font-bold mb-4">Contacts</h3>
                <ul class="list-disc pl-5">
                    @if ($company->contacts->isEmpty())
                    <li class="text-gray-500">No contacts yet</li>
                    @else
                        

                    @foreach($company->contacts as $contact)
                    <li>
                        <a href="{{ route('contacts.show', $contact->id) }}" class="text-blue-500 hover:underline">
                            {{ $contact->first_name }} {{ $contact->last_name }} ({{ $contact->email }})
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="bg-white p-6 shadow rounded">
                <div class="bg-white p-6 shadow rounded" x-data="{ invoiceOpen: false }">
                    <!-- Modal openen knop -->
                    <div class="flex justify-end mb-4">
                        <button @click="invoiceOpen = true" class="px-4 py-2 bg-blue-600 text-white rounded">
                            Voeg factuur toe
                        </button>
                    </div>
                
                    <!-- Factuur modal -->
                    <div x-show="invoiceOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
                        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md" @click.away="invoiceOpen = false">
                            <h2 class="text-xl font-bold mb-4">Nieuwe factuur</h2>
                
                            <form action="{{ route('invoices.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="company_i" value="{{ $company->id }}">
                             
                
                  
                                <div>
                                    <label for="description">Omschrijving</label>
                                    <input type="text" name="description" class="w-full border px-3 py-2 rounded" required>
                
                                <div>
                                    <label for="total_amount">Totaalbedrag (€)</label>
                                    <input type="number" name="total_amount" step="0.01" class="w-full border px-3 py-2 rounded" required>
                                </div>
                
                                <div>
                                    <label for="status">Status</label>
                                    <select name="status" class="w-full border px-3 py-2 rounded">
                                        <option value="open">Open</option>
                                        <option value="betaald">Betaald</option>
                                        <option value="verlopen">Verlopen</option>
                                    </select>
                                </div>
                
                                <div class="flex justify-end gap-2">
                                    <button type="button" @click="invoiceOpen = false" class="px-4 py-2 border rounded">Annuleren</button>
                                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Opslaan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
                    <!-- Facturen overzicht -->
                    <h3 class="text-lg font-bold mb-4 mt-6">Invoices</h3>
                    <ul class="list-disc pl-5">
                        @foreach($company->invoices as $invoice)
                        <li>
                            #{{ $invoice->invoice_number }} -
                            {{ $invoice->status }} - €{{ $invoice->total_amount }} - 
                            {{ $invoice->created_at->format('d-m-Y') }}
                            <a href="{{ route('invoices.show', $invoice->id) }}" class="text-blue-500 hover:underline">Bekijk</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
               
            </div>
        </div>
    </div>


</x-app-layout>
