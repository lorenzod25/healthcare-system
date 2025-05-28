<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            ✏️ Edit Prescription
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow">

                <form method="POST" action="{{ route('prescriptions.update', $prescription->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Appointment Dropdown -->
                    <div>
                        <label for="appointment_id" class="block text-sm font-semibold text-gray-700 mb-1">Appointment</label>
                        <select name="appointment_id" id="appointment_id" required
                            class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm focus:ring-blue-200 focus:outline-none">
                            <option value="">-- Select Appointment --</option>
                            @foreach ($appointments as $appointment)
                                <option value="{{ $appointment->id }}"
                                    {{ $prescription->appointment_id == $appointment->id ? 'selected' : '' }}>
                                    {{ $appointment->patient->name }} with {{ $appointment->provider->name }} on {{ $appointment->scheduled_at }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Medication Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Medication Name</label>
                        <input type="text" name="medication_name" value="{{ old('medication_name', $prescription->medication_name) }}"
                            class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm focus:ring-blue-200 focus:outline-none" required>
                    </div>

                    <!-- Dosage -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Dosage</label>
                        <input type="text" name="dosage" value="{{ old('dosage', $prescription->dosage) }}"
                            class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm focus:ring-blue-200 focus:outline-none" required>
                    </div>

                    <!-- Frequency -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Frequency</label>
                        <input type="text" name="frequency" value="{{ old('frequency', $prescription->frequency) }}"
                            class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm focus:ring-blue-200 focus:outline-none" required>
                    </div>

                    <!-- Duration -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Duration</label>
                        <input type="text" name="duration" value="{{ old('duration', $prescription->duration) }}"
                            class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm focus:ring-blue-200 focus:outline-none" required>
                    </div>

                    <!-- Actions -->
                    <div class="pt-4 text-center">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-6 py-3 rounded shadow transition">
                            ✅ Update Prescription
                        </button>
                        <a href="{{ route('prescriptions.index') }}"
                            class="inline-block ml-4 text-gray-600 hover:underline">
                            Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
