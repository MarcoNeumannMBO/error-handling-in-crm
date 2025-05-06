
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Companies</h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<form action="/companies" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    @csrf
    <div class="mb-4">
        <label for="company_name" class="block text-gray-700 font-bold mb-2">Company Name</label>
        <input type="text" name="company_name" id="company_name" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="Enter company name" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
        <input type="email" name="email" id="email" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="Enter email address" required>
    </div>
    <div class="mb-4">
        <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
        <textarea name="address" id="address" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="Enter company address"></textarea>
    </div>
    <div class="mb-4">
        <label for="city" class="block text-gray-700 font-bold mb-2">City</label>
        <input type="text" name="city" id="city" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="Enter city name">
    </div>
    <div class="mb-4">
        <label for="vat_number" class="block text-gray-700 font-bold mb-2">VAT Number</label>
        <input type="text" name="vat_number" id="vat_number" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="Enter VAT number">
    </div>
    <div class="mb-4">
        <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
        <input type="text" name="phone" id="phone" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500" placeholder="Enter phone number">
    </div>
    <div class="mb-4">
        <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Create</button>
    </div>

</form>
        </div>
    </div>
</x-app-layout>