<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Medical Records') }}
        </h2>
        <a href="{{ route('medical-records.create') }}" class="text-blue-600 underline">Add New Record</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($records as $record)
                <div class="bg-white shadow rounded p-4 mb-4">
                    <h3 class="text-lg font-bold">Patient: {{ $record->appointment->patient->name }}</h3>
                    <p><strong>Provider:</strong> {{ $record->appointment->provider->name }}</p>
                    <p><strong>Diagnosis:</strong> {{ $record->diagnosis }}</p>
                    <p><strong>Treatment Plan:</strong> {{ $record->treatment_plan }}</p>
                    <a href="{{ route('medical-records.edit', $record->id) }}" class="text-indigo-600">Edit</a> |
                    <form action="{{ route('medical-records.destroy', $record->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
