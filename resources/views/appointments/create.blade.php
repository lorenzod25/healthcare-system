<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ __('➕ Create Appointment') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
            @if ($errors->any())
                <div class="mb-6 text-red-600">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('appointments.store') }}" class="space-y-6">
                @csrf

                <!-- Patient -->
                <div>
                    <label for="patient_id" class="block text-sm font-medium text-gray-700 mb-1">Patient</label>
                    <select name="patient_id" id="patient_id" required class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                        <option value="">-- Select Patient --</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Provider -->
                <div>
                    <label for="provider_id" class="block text-sm font-medium text-gray-700 mb-1">Provider</label>
                    <select name="provider_id" id="provider_id" required class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                        <option value="">-- Select Provider --</option>
                        @foreach ($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Scheduled At -->
                <div>
                    <label for="scheduled_at" class="block text-sm font-medium text-gray-700 mb-1">Scheduled At</label>
                    <input type="datetime-local" name="scheduled_at" id="scheduled_at" required class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                </div>

                <!-- Reason -->
                <div>
                    <label for="reason" class="block text-sm font-medium text-gray-700 mb-1">Reason for Visit</label>
                    <textarea name="reason" id="reason" rows="3" class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-start gap-4 pt-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-6 py-2 rounded shadow">
                        📅 Submit Appointment
                    </button>
                    <a href="{{ route('appointments.index') }}" class="text-gray-600 hover:underline self-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
