<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Edit Appointment') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('appointments.update', $appointment) }}">
                @csrf
                @method('PUT')

                <!-- Patient Dropdown -->
                <div class="mb-4">
                    <label for="patient_id" class="block font-medium text-sm text-gray-700">Patient</label>
                    <select name="patient_id" id="patient_id" required class="form-select w-full mt-1">
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Provider Dropdown -->
                <div class="mb-4">
                    <label for="provider_id" class="block font-medium text-sm text-gray-700">Provider</label>
                    <select name="provider_id" id="provider_id" required class="form-select w-full mt-1">
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}" {{ $appointment->provider_id == $provider->id ? 'selected' : '' }}>
                                {{ $provider->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Scheduled At -->
                <div class="mb-4">
                    <label for="scheduled_at" class="block font-medium text-sm text-gray-700">Scheduled At</label>
                    <input type="datetime-local" name="scheduled_at" id="scheduled_at" value="{{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('Y-m-d\TH:i') }}" required class="form-input w-full mt-1">
                </div>

                <!-- Reason -->
                <div class="mb-4">
                    <label for="reason" class="block font-medium text-sm text-gray-700">Reason</label>
                    <textarea name="reason" id="reason" rows="3" class="form-textarea w-full mt-1">{{ $appointment->reason }}</textarea>
                </div>

                <!-- Submit -->
                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">Update Appointment</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
