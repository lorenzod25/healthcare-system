<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('➕ Add Prescription') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
            <form method="POST" action="{{ route('prescriptions.store') }}" class="space-y-6">
                @csrf

                <!-- Appointment Selection -->
                <div>
                    <label for="appointment_id" class="block text-sm font-semibold text-gray-700 mb-1">Appointment <span class="text-red-500">*</span></label>
                    <select name="appointment_id" id="appointment_id" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Select Appointment --</option>
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}">
                                {{ $appointment->patient->name }} with {{ $appointment->provider->name }} on {{ $appointment->scheduled_at }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Medication Name -->
                <div>
                    <label for="medication_name" class="block text-sm font-semibold text-gray-700 mb-1">Medication Name <span class="text-red-500">*</span></label>
                    <input type="text" name="medication_name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Dosage -->
                <div>
                    <label for="dosage" class="block text-sm font-semibold text-gray-700 mb-1">Dosage <span class="text-red-500">*</span></label>
                    <input type="text" name="dosage" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Frequency -->
                <div>
                    <label for="frequency" class="block text-sm font-semibold text-gray-700 mb-1">Frequency <span class="text-red-500">*</span></label>
                    <input type="text" name="frequency" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Duration -->
                <div>
                    <label for="duration" class="block text-sm font-semibold text-gray-700 mb-1">Duration <span class="text-red-500">*</span></label>
                    <input type="text" name="duration" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Buttons -->
                <div class="flex justify-start gap-4 pt-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-bold px-6 py-2 rounded shadow transition">
                        Submit Prescription
                    </button>
                    <a href="{{ route('prescriptions.index') }}" class="text-gray-600 hover:underline self-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
