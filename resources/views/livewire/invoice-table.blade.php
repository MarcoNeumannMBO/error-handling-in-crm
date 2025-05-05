<div>
    <h2 class="text-xl font-bold mb-4">Invoice Table (Livewire)</h2>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Invoice #</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Amount</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach(App\Models\Invoice::all() as $invoice)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $invoice->invoice_number }}</td>
                    <td class="px-6 py-4">€{{ $invoice->total_amount }}</td>
                    <td class="px-6 py-4">{{ ucfirst($invoice->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
