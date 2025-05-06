<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Companies</h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('companies.create') }}"
               class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Add Company
            </a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">VAT</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">{{ $company->company_name }}</td>
                                <td class="px-6 py-4">{{ $company->email }}</td>
                                <td class="px-6 py-4">{{ $company->vat_number }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('companies.show', $company) }}"
                                       class="text-indigo-600 hover:text-indigo-900">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
