<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prescriptions') }}
        </h2>
        <a href="{{ route('prescriptions.create') }}" class="text-sm text-black bg-blue-500 px-4 py-2 rounded hover:bg-blue-600 ml-4">
            Add New Prescription
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Prescription List</h1>

                <table class="min-w-full table-auto border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left">Appointment ID</th>
                            <th class="px-4 py-2 text-left">Medication</th>
                            <th class="px-4 py-2 text-left">Dosage</th>
                            <th class="px-4 py-2 text-left">Frequency</th>
                            <th class="px-4 py-2 text-left">Duration</th>
                            <th class="px-4 py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prescriptions as $prescription)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $prescription->appointment_id }}</td>
                                <td class="px-4 py-2">{{ $prescription->medication }}</td>
                                <td class="px-4 py-2">{{ $prescription->dosage }}</td>
                                <td class="px-4 py-2">{{ $prescription->frequency }}</td>
                                <td class="px-4 py-2">{{ $prescription->duration }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="text-blue-600 hover:underline">Edit</a>

                                    <form action="{{ route('prescriptions.destroy', $prescription->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this prescription?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($prescriptions->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center py-4">No prescriptions found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
