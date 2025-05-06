<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Contacts</h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Phone</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Company</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4">
                                    <a href="{{ route('contacts.show', $contact->id) }}" class="text-blue-500 hover:underline">
                                        {{ $contact->first_name }} {{ $contact->last_name }}
                                    </a>
                                </td>
                                <td class="px-6 py-4">{{ $contact->email }}</td>
                                <td class="px-6 py-4">{{ $contact->phone }}</td>
                                <td class="px-6 py-4">{{ $contact->company->company_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
