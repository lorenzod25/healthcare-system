<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Prescription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded p-6">
                <form action="{{ route('prescriptions.update', $prescription->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="appointment_id" class="block font-medium">Appointment ID</label>
                        <input type="text" name="appointment_id" value="{{ $prescription->appointment_id }}" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="medication" class="block font-medium">Medication</label>
                        <input type="text" name="medication" value="{{ $prescription->medication }}" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="dosage" class="block font-medium">Dosage</label>
                        <input type="text" name="dosage" value="{{ $prescription->dosage }}" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="frequency" class="block font-medium">Frequency</label>
                        <input type="text" name="frequency" value="{{ $prescription->frequency }}" class="w-full border-gray-300 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label for="duration" class="block font-medium">Duration</label>
                        <input type="text" name="duration" value="{{ $prescription->duration }}" class="w-full border-gray-300 rounded" required>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Update Prescription
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
