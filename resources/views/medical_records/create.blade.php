<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Add Medical Record') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('medical-records.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Appointment</label>
                    <select name="appointment_id" class="w-full border rounded px-3 py-2">
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}">
                                {{ $appointment->patient->name }} with {{ $appointment->provider->name }} ({{ $appointment->scheduled_at }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Diagnosis</label>
                    <input type="text" name="diagnosis" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Treatment Plan</label>
                    <textarea name="treatment_plan" class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Lab Results</label>
                    <textarea name="lab_results" class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Record</button>
            </form>
        </div>
    </div>
</x-app-layout>
