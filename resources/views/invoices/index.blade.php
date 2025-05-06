<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Invoices</h2>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto">


        <div class="bg-white shadow rounded p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Invoice #</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Company</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Date</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Amount</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoices as $invoice)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="text-blue-500 hover:underline">
                                    #{{ $invoice->invoice_number }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('companies.show', $invoice->company->id) }}" class="text-blue-500 hover:underline">
                                    {{ $invoice->company->company_name }}
                                </a>
                            </td>
                            <td class="px-6 py-4">{{ $invoice->issue_date }}</td>
                            <td class="px-6 py-4">€{{ $invoice->total_amount }}</td>
                            <td class="px-6 py-4">{{ ucfirst($invoice->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
