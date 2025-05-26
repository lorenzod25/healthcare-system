<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Medical Record Details') }}
        </h2>
        <a href="{{ route('medical-records.index') }}" class="text-blue-600 hover:underline">← Back to Records</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded p-6">
            <h3 class="text-2xl font-bold mb-4">Medical Record for {{ $medicalRecord->appointment->patient->name ?? 'N/A' }}</h3>

            <div class="mb-4">
                <strong>Appointment Date:</strong>
                <p>{{ $medicalRecord->appointment->scheduled_at ?? 'N/A' }}</p>
            </div>

            <div class="mb-4">
                <strong>Diagnosis:</strong>
                <p>{{ $medicalRecord->diagnosis }}</p>
            </div>

            <div class="mb-4">
                <strong>Treatment:</strong>
                <p>{{ $medicalRecord->treatment }}</p>
            </div>

            <div class="mb-4">
                <strong>Notes:</strong>
                <p>{{ $medicalRecord->notes }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
