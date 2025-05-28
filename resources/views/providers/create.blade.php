<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('➕ Add Provider') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
            <form method="POST" action="{{ route('providers.store') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Specialization -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Specialization</label>
                    <input type="text" name="specialization"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Buttons -->
                <div class="flex justify-start gap-4 pt-2">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-black font-bold px-6 py-2 rounded shadow transition">
                        Save Provider
                    </button>
                    <a href="{{ route('providers.index') }}" class="text-gray-600 hover:underline self-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
