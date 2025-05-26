<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Edit Provider') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('providers.update', $provider) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name', $provider->name) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Specialization</label>
                    <input type="text" name="specialization" value="{{ old('specialization', $provider->specialization) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Contact Info</label>
                    <input type="text" name="contact_info" value="{{ old('contact_info', $provider->contact_info) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('providers.index') }}" class="mr-4 text-gray-600 hover:underline">Cancel</a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Provider</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
