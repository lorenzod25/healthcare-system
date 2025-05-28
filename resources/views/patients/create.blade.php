<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('➕ Add New Patient') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
            <form method="POST" action="{{ route('patients.store') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                    <input type="date" name="dob" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Gender <span class="text-red-500">*</span></label>
                    <select name="gender" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <!-- Contact Info -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Contact Info</label>
                    <input type="text" name="contact_info"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Insurance Info -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Insurance Info</label>
                    <input type="text" name="insurance_info"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Medical History -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Medical History</label>
                    <textarea name="medical_history" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-start gap-4 pt-2">
                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold px-6 py-2 rounded-md shadow transition">
                        ➕ Add Patient
                    </button>
                    <a href="{{ route('patients.index') }}" class="text-gray-600 hover:underline self-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
