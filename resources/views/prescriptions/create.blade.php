<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Add Prescription') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('prescriptions.store') }}">
                @csrf

                <!-- Appointment Selection -->
                <div class="mb-4">
                    <label for="appointment_id" class="block font-medium text-sm text-gray-700">Appointment</label>
                    <select name="appointment_id" id="appointment_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select Appointment --</option>
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}">
                                {{ $appointment->patient->name }} with {{ $appointment->provider->name }} on {{ $appointment->scheduled_at }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Medication Name -->
                <div class="mb-4">
                    <label for="medication_name" class="block font-medium text-sm text-gray-700">Medication Name</label>
                    <input type="text" name="medication_name" class="form-input w-full" required>
                </div>

                <!-- Dosage -->
                <div class="mb-4">
                    <label for="dosage" class="block font-medium text-sm text-gray-700">Dosage</label>
                    <input type="text" name="dosage" class="form-input w-full" required>
                </div>

                <!-- Frequency -->
                <div class="mb-4">
                    <label for="frequency" class="block font-medium text-sm text-gray-700">Frequency</label>
                    <input type="text" name="frequency" class="form-input w-full" required>
                </div>

                <!-- Duration -->
                <div class="mb-4">
                    <label for="duration" class="block font-medium text-sm text-gray-700">Duration</label>
                    <input type="text" name="duration" class="form-input w-full" required>
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">Submit Prescription</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
