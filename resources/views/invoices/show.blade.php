<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Invoice #{{ $invoice->invoice_number }}</h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white p-6 shadow rounded space-y-2">
            <p><strong>Company:</strong> {{ $invoice->company->name }}</p>
            <p><strong>Issue Date:</strong> {{ $invoice->issue_date }}</p>
            <p><strong>Due Date:</strong> {{ $invoice->due_date }}</p>
            <p><strong>Total:</strong> €{{ $invoice->total_amount }}</p>
            <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>
            @if($invoice->pdf_path)
                <p><a href="{{ Storage::url($invoice->pdf_path) }}" target="_blank" class="text-blue-500 underline">Download PDF</a></p>
            @endif
        </div>
    </div>
</x-app-layout>
