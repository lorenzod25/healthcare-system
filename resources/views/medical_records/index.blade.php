<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Medical Records') }}
        </h2>
        <a href="{{ route('medical-records.create') }}" class="text-blue-600 hover:underline">Add New Record</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4">
            <h1 class="text-2xl font-bold mb-4">List of Medical Records</h1>

            @if(session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Patient</th>
                        <th class="border px-4 py-2">Appointment Date</th>
                        <th class="border px-4 py-2">Diagnosis</th>
                        <th class="border px-4 py-2">Treatment</th>
                        <th class="border px-4 py-2">Lab Results</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicalRecords as $record)
                        <tr>
                            <td class="border px-4 py-2">{{ $record->appointment->patient->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $record->appointment->scheduled_at ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $record->diagnosis }}</td>
                            <td class="border px-4 py-2">{{ $record->treatment_plan }}</td>
                            <td class="border px-4 py-2">{{ $record->lab_results }}</td>
                            <td class="border px-4 py-2 flex space-x-2">
                              <a href="{{ route('medical-records.show', $record) }}" class="text-green-600 hover:underline">Show</a>
                              <a href="{{ route('medical-records.edit', $record) }}" class="text-blue-600 hover:underline">Edit</a>
                              <form action="{{ route('medical-records.destroy', $record) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
