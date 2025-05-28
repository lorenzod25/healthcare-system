<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800 leading-tight">
                {{ __('Prescriptions') }}
            </h2>
            <a href="{{ route('prescriptions.create') }}"
               class="bg-blue-600 text-black font-medium px-4 py-2 rounded hover:bg-blue-700 transition">
                ➕ Add New Prescription
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search Bar -->
            <div class="mb-6">
                <form method="GET" action="{{ route('prescriptions.index') }}" class="flex flex-col sm:flex-row gap-4 sm:items-center">
                    <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search prescriptions by medication..."
                    class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-4 py-2 rounded shadow">
                Search
                </button>
                </form>
            </div>

            <div class="bg-white p-6 rounded shadow-md">
                <h1 class="text-2xl font-bold mb-4">Prescription List</h1>

                <table class="min-w-full table-auto border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2">Appointment Info</th>
                            <th class="px-4 py-2">Medication</th>
                            <th class="px-4 py-2">Dosage</th>
                            <th class="px-4 py-2">Frequency</th>
                            <th class="px-4 py-2">Duration</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prescriptions as $prescription)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2">
                                    <strong>Patient:</strong> {{ $prescription->appointment->patient->name ?? 'N/A' }}<br>
                                    <strong>Provider:</strong> {{ $prescription->appointment->provider->name ?? 'N/A' }}<br>
                                    <strong>Scheduled:</strong> {{ $prescription->appointment->scheduled_at ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-2">{{ $prescription->medication_name }}</td>
                                <td class="px-4 py-2">{{ $prescription->dosage }}</td>
                                <td class="px-4 py-2">{{ $prescription->frequency }}</td>
                                <td class="px-4 py-2">{{ $prescription->duration }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <a href="{{ route('prescriptions.edit', $prescription) }}"
                                       class="text-blue-600 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('prescriptions.destroy', $prescription) }}" method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Are you sure you want to delete this prescription?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline ml-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500">No prescriptions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
