<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-black leading-tight">
            {{ __('✏️ Edit Patient') }}
        </h2>
    </x-slot>

    <section class="min-h-screen py-16 bg-white">
        <div class="max-w-3xl mx-auto px-6">
            <div class="bg-white p-10 rounded-lg shadow-none">

                <form method="POST" action="{{ route('patients.update', $patient->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Name</label>
                        <input type="text" name="name" value="{{ old('name', $patient->name) }}"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- DOB -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Date of Birth</label>
                        <input type="date" name="dob" value="{{ old('dob', $patient->dob) }}"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Gender</label>
                        <input type="text" name="gender" value="{{ old('gender', $patient->gender) }}"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Contact Info</label>
                        <input type="text" name="contact_info" value="{{ old('contact_info', $patient->contact_info) }}"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- Insurance Info -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Insurance Info</label>
                        <input type="text" name="insurance_info" value="{{ old('insurance_info', $patient->insurance_info) }}"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- Medical History -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Medical History</label>
                        <textarea name="medical_history" rows="4"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">{{ old('medical_history', $patient->medical_history) }}</textarea>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4 text-center">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-black font-bold px-8 py-3 rounded-md shadow transition">
                            ✅ Update Patient
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</x-app-layout>
