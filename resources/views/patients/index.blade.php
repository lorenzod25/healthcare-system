<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patients') }}
        </h2>
        <a href="{{ route('patients.create') }}"
           class="bg-blue-600 text-black font-medium px-4 py-2 rounded hover:bg-blue-700 transition">
            ➕ Add New Patient
        </a>
    </div>
</x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded p-6">
                <h1 class="text-2xl font-bold mb-4">Patient List</h1>

                <table class="min-w-full table-auto border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Date of Birth</th>
                            <th class="px-4 py-2">Gender</th>
                            <th class="px-4 py-2">Contact Info</th>
                            <th class="px-4 py-2">Insurance Info</th>
                            <th class="px-4 py-2">Medical History</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $patient->name }}</td>
                                <td class="px-4 py-2">{{ $patient->dob }}</td>
                                <td class="px-4 py-2">{{ $patient->gender }}</td>
                                <td class="px-4 py-2">{{ $patient->contact_info }}</td>
                                <td class="px-4 py-2">{{ $patient->insurance_info }}</td>
                                <td class="px-4 py-2">{{ $patient->medical_history }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <a href="{{ route('patients.edit', $patient) }}"
                                       class="text-blue-500 hover:underline mr-3">Edit</a>

                                    <form action="{{ route('patients.destroy', $patient) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this patient?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-4 text-center text-gray-500">No patients found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
