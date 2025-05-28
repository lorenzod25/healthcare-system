<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">
                ✏️ Edit Provider
            </h2>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow">

                <form method="POST" action="{{ route('providers.update', $provider) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" value="{{ old('name', $provider->name) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-200 focus:outline-none" required>
                    </div>

                    <!-- Specialization -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Specialization</label>
                        <input type="text" name="specialization" value="{{ old('specialization', $provider->specialization) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-200 focus:outline-none" required>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Contact Info</label>
                        <input type="text" name="phone" value="{{ old('phone', $provider->phone) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-200 focus:outline-none">
                    </div>

                    <!-- Actions -->
                    <div class="pt-4 text-center">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-6 py-3 rounded shadow transition">
                            ✅ Update Provider
                        </button>
                        <a href="{{ route('providers.index') }}"
                            class="inline-block ml-4 text-gray-600 hover:underline">
                            Cancel
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
