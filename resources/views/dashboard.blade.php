<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Livewire Card for Total Invoices -->
                        <x-dashboard-card title="Total Invoices This Year" :value="$totalInvoices" />
        
                        <!-- Livewire Card for Total Amount -->
                        <x-dashboard-card title="Total Amount This Year" :value="number_format($totalAmount, 2)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
