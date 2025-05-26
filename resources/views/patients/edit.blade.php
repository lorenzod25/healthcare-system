<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Patient') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        <form action="{{ route('patients.update', $patient->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name', $patient->name) }}"
                       class="w-full border-gray-300 rounded shadow-sm">
            </div>

            <div>
                <label class="block font-medium">Date of Birth</label>
                <input type="date" name="dob" value="{{ old('dob', $patient->dob) }}"
                       class="w-full border-gray-300 rounded shadow-sm">
            </div>

            <div>
                <label class="block font-medium">Gender</label>
                <input type="text" name="gender" value="{{ old('gender', $patient->gender) }}"
                       class="w-full border-gray-300 rounded shadow-sm">
            </div>

            <div>
                <label class="block font-medium">Contact Info</label>
                <input type="text" name="contact_info" value="{{ old('contact_info', $patient->contact_info) }}"
                       class="w-full border-gray-300 rounded shadow-sm">
            </div>

            <div>
                <label class="block font-medium">Insurance Info</label>
                <input type="text" name="insurance_info" value="{{ old('insurance_info', $patient->insurance_info) }}"
                       class="w-full border-gray-300 rounded shadow-sm">
            </div>

            <div>
                <label class="block font-medium">Medical History</label>
                <textarea name="medical_history" rows="4"
                          class="w-full border-gray-300 rounded shadow-sm">{{ old('medical_history', $patient->medical_history) }}</textarea>
            </div>

            <div>
                <button type="submit"
                        class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700 transition">
                    Update Patient
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
