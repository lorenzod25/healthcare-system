<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Edit Medical Record') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('medical-records.update', $medicalRecord->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium">Diagnosis</label>
                    <input type="text" name="diagnosis" value="{{ $medicalRecord->diagnosis }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Treatment Plan</label>
                    <textarea name="treatment_plan" class="w-full border rounded px-3 py-2">{{ $medicalRecord->treatment_plan }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Lab Results</label>
                    <textarea name="lab_results" class="w-full border rounded px-3 py-2">{{ $medicalRecord->lab_results }}</textarea>
                </div>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Record</button>
            </form>
        </div>
    </div>
</x-app-layout>
