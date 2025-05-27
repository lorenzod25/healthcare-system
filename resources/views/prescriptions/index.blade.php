<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Prescriptions') }}
        </h2>
        <a href="{{ route('prescriptions.create') }}" class="text-blue-600 hover:underline">Add New Prescription</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4">
            <h1 class="text-2xl font-bold mb-4">Prescription List</h1>

            @if(session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
    <tr class="bg-gray-100">
        <th class="border px-4 py-2">Appointment Info</th>
        <th class="border px-4 py-2">Medication</th>
        <th class="border px-4 py-2">Dosage</th>
        <th class="border px-4 py-2">Frequency</th>
        <th class="border px-4 py-2">Duration</th>
        <th class="border px-4 py-2">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($prescriptions as $prescription)
        <tr>
            <td class="border px-4 py-2">
                <strong>Patient:</strong> {{ $prescription->appointment->patient->name ?? 'N/A' }}<br>
                <strong>Provider:</strong> {{ $prescription->appointment->provider->name ?? 'N/A' }}<br>
                <strong>Scheduled:</strong> {{ $prescription->appointment->scheduled_at ?? 'N/A' }}
            </td>
            <td class="border px-4 py-2">{{ $prescription->medication_name }}</td>
            <td class="border px-4 py-2">{{ $prescription->dosage }}</td>
            <td class="border px-4 py-2">{{ $prescription->frequency }}</td>
            <td class="border px-4 py-2">{{ $prescription->duration }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('prescriptions.edit', $prescription) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('prescriptions.destroy', $prescription) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline ml-2" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>


        </div>
    </div>
</x-app-layout>
