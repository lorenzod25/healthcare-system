<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Patients') }}
            </h2>
            <a href="{{ route('patients.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-5 py-2 rounded shadow transition">
                ➕ Add New Patient
            </a>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            
            <!-- Search Bar -->
            <div class="mb-6">
                <form method="GET" action="{{ route('patients.index') }}" class="flex flex-col sm:flex-row gap-4 sm:items-center">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search patients by name..."
                        class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-4 py-2 rounded shadow">
                        Search
                    </button>
                </form>
            </div>


            <!-- Patient Table -->
            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <h3 class="text-xl font-semibold text-gray-700 px-6 py-4 border-b">Patient List</h3>

                <table class="min-w-full text-left text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-800 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Date of Birth</th>
                            <th class="px-6 py-3">Gender</th>
                            <th class="px-6 py-3">Contact Info</th>
                            <th class="px-6 py-3">Insurance Info</th>
                            <th class="px-6 py-3">Medical History</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($patients as $patient)
                            <tr>
                                <td class="px-6 py-4">{{ $patient->name }}</td>
                                <td class="px-6 py-4">{{ $patient->dob }}</td>
                                <td class="px-6 py-4">{{ $patient->gender }}</td>
                                <td class="px-6 py-4">{{ $patient->contact_info }}</td>
                                <td class="px-6 py-4">{{ $patient->insurance_info }}</td>
                                <td class="px-6 py-4">{{ $patient->medical_history }}</td>
                                <td class="px-6 py-4 text-center whitespace-nowrap space-x-4">
                                    <a href="{{ route('patients.edit', $patient) }}"
                                       class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('patients.destroy', $patient) }}"
                                          method="POST" class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this patient?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-6 text-center text-gray-500">
                                    No patients found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
