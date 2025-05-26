<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Medical Record Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
            <p><strong>Patient:</strong> {{ $medicalRecord->appointment->patient->name }}</p>
            <p><strong>Provider:</strong> {{ $medicalRecord->appointment->provider->name }}</p>
            <p><strong>Diagnosis:</strong> {{ $medicalRecord->diagnosis }}</p>
            <p><strong>Treatment Plan:</strong> {{ $medicalRecord->treatment_plan }}</p>
            <p><strong>Lab Results:</strong> {{ $medicalRecord->lab_results }}</p>

            <a href="{{ route('medical-records.index') }}" class="text-blue-600 underline mt-4 inline-block">← Back to Records</a>
        </div>
    </div>
</x-app-layout>
