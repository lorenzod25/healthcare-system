<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ __('➕ Add Medical Record') }}
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

            <form method="POST" action="{{ route('medical-records.store') }}" class="space-y-6">
                @csrf

                <!-- Appointment -->
                <div>
                    <label for="appointment_id" class="block text-sm font-medium text-gray-700 mb-1">Appointment</label>
                    <select name="appointment_id" required class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                        <option value="">-- Select Appointment --</option>
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}">
                                {{ $appointment->patient->name }} with {{ $appointment->provider->name }} on {{ $appointment->scheduled_at }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Diagnosis -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Diagnosis</label>
                    <input type="text" name="diagnosis" class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm" required>
                </div>

                <!-- Treatment Plan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Treatment Plan</label>
                    <textarea name="treatment_plan" rows="3" class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm"></textarea>
                </div>

                <!-- Lab Results -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lab Results</label>
                    <textarea name="lab_results" rows="3" class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm"></textarea>
                </div>

                <!-- Buttons -->
                <div class="flex justify-start gap-4 pt-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-6 py-2 rounded shadow">
                        💾 Save Record
                    </button>
                    <a href="{{ route('medical-records.index') }}" class="text-gray-600 hover:underline self-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
