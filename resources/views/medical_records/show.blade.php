<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="text-3xl font-bold text-gray-800">
                {{ __('🩺 Medical Record for Patient: ') }} 
                <span class="text-black">{{ $medicalRecord->appointment->patient->name ?? 'N/A' }}</span>
            </h2>
            <a href="{{ route('medical-records.index') }}" class="text-base text-blue-600 hover:underline">
                ← Back to Records
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white shadow-lg p-10 rounded-2xl">
            <div class="space-y-6 text-lg text-gray-900 leading-relaxed">
                <div>
                    <label class="block text-gray-600 font-semibold mb-1">📅 Appointment Date:</label>
                    <div class="bg-gray-100 px-4 py-3 rounded-md">{{ $medicalRecord->appointment->scheduled_at ?? 'N/A' }}</div>
                </div>

                <div>
                    <label class="block text-gray-600 font-semibold mb-1">🩻 Diagnosis:</label>
                    <div class="bg-gray-100 px-4 py-3 rounded-md">{{ $medicalRecord->diagnosis }}</div>
                </div>

                <div>
                    <label class="block text-gray-600 font-semibold mb-1">💊 Treatment Plan:</label>
                    <div class="bg-gray-100 px-4 py-3 rounded-md">{{ $medicalRecord->treatment_plan }}</div>
                </div>

                <div>
                    <label class="block text-gray-600 font-semibold mb-1">🧪 Lab Results:</label>
                    <div class="bg-gray-100 px-4 py-3 rounded-md">{{ $medicalRecord->lab_results }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
