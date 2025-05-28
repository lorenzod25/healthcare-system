<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            ✏️ Edit Appointment
        </h2>
    </x-slot>

    <section class="min-h-screen py-16 bg-white">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-white p-10 rounded-lg shadow">

                <form method="POST" action="{{ route('appointments.update', $appointment) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Patient Dropdown -->
                    <div>
                        <label for="patient_id" class="block text-sm font-bold text-black mb-1">Patient</label>
                        <select name="patient_id" id="patient_id" required
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Provider Dropdown -->
                    <div>
                        <label for="provider_id" class="block text-sm font-bold text-black mb-1">Provider</label>
                        <select name="provider_id" id="provider_id" required
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}" {{ $appointment->provider_id == $provider->id ? 'selected' : '' }}>
                                    {{ $provider->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Scheduled At -->
                    <div>
                        <label for="scheduled_at" class="block text-sm font-bold text-black mb-1">Scheduled At</label>
                        <input type="datetime-local" name="scheduled_at" id="scheduled_at"
                            value="{{ \Carbon\Carbon::parse($appointment->scheduled_at)->format('Y-m-d\TH:i') }}"
                            required
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- Reason -->
                    <div>
                        <label for="reason" class="block text-sm font-bold text-black mb-1">Reason</label>
                        <textarea name="reason" id="reason" rows="3"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">{{ $appointment->reason }}</textarea>
                    </div>

                    <!-- Actions -->
                    <div class="pt-4 text-center">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-black font-bold px-8 py-3 rounded-md shadow transition">
                            ✅ Update Appointment
                        </button>
                        <a href="{{ route('appointments.index') }}"
                            class="ml-4 text-gray-600 hover:underline">
                            Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </section>
</x-app-layout>
