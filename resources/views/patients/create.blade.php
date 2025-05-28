<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-black leading-tight">
            {{ __('➕ Add New Patient') }}
        </h2>
    </x-slot>

    <section class="min-h-screen py-16 bg-white">
        <div class="max-w-3xl mx-auto px-6">
            <div class="p-10 bg-white rounded-lg shadow-none">

                <form method="POST" action="{{ route('patients.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Name *</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- DOB -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Date of Birth *</label>
                        <input type="date" name="dob" required
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Gender *</label>
                        <select name="gender" required
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                            <option value="">Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Contact Info</label>
                        <input type="text" name="contact_info"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- Insurance Info -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Insurance Info</label>
                        <input type="text" name="insurance_info"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none">
                    </div>

                    <!-- Medical History -->
                    <div>
                        <label class="block text-sm font-bold text-black mb-1">Medical History</label>
                        <textarea name="medical_history" rows="4"
                            class="w-full px-4 py-2 border border-black rounded-md focus:outline-none"></textarea>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4 text-center">
                        <button type="submit"
                            class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold px-8 py-3 rounded-md shadow transition">
                            ➕ Add Patient
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</x-app-layout>
