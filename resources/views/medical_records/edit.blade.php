<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Edit Medical Record') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('medical-records.update', $medicalRecord->id) }}">
                @csrf
                @method('PUT')

                <!-- Appointment Dropdown -->
                <div class="mb-4">
                    <label for="appointment_id" class="block font-medium text-sm text-gray-700">Appointment</label>
                    <select name="appointment_id" id="appointment_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select Appointment --</option>
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}" {{ $medicalRecord->appointment_id == $appointment->id ? 'selected' : '' }}>
                                {{ $appointment->patient->name }} with {{ $appointment->provider->name }} on {{ $appointment->scheduled_at }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Diagnosis -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Diagnosis</label>
                    <input type="text" name="diagnosis" value="{{ $medicalRecord->diagnosis }}" class="w-full border-gray-300 rounded shadow-sm px-4 py-2" required>
                </div>

                <!-- Treatment Plan -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Treatment Plan</label>
                    <textarea name="treatment_plan" rows="3" class="w-full border-gray-300 rounded shadow-sm px-4 py-2">{{ $medicalRecord->treatment_plan }}</textarea>
                </div>

                <!-- Lab Results -->
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Lab Results</label>
                    <textarea name="lab_results" rows="3" class="w-full border-gray-300 rounded shadow-sm px-4 py-2">{{ $medicalRecord->lab_results }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-start gap-4">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-black font-bold px-6 py-2 rounded shadow">
                        ✅ Update Record
                    </button>
                    <a href="{{ route('medical-records.index') }}" class="text-gray-600 hover:underline self-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
