<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Appointment') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf

                    <!-- Patient Dropdown -->
                    <div class="mb-4">
                        <label for="patient_id" class="block font-medium text-sm text-gray-700">Patient</label>
                        <select name="patient_id" id="patient_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                            <option value="">-- Select Patient --</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Provider Dropdown -->
                    <div class="mb-4">
                        <label for="provider_id" class="block font-medium text-sm text-gray-700">Provider</label>
                        <select name="provider_id" id="provider_id" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                            <option value="">-- Select Provider --</option>
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Scheduled At -->
                    <div class="mb-4">
                        <label for="scheduled_at" class="block font-medium text-sm text-gray-700">Scheduled At</label>
                        <input type="datetime-local" name="scheduled_at" id="scheduled_at" class="mt-1 block w-full rounded border-gray-300 shadow-sm">
                    </div>

                    <!-- Reason -->
                    <div class="mb-4">
                        <label for="reason" class="block font-medium text-sm text-gray-700">Reason for Visit</label>
                        <textarea name="reason" id="reason" rows="3" class="mt-1 block w-full rounded border-gray-300 shadow-sm"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                            Submit Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
