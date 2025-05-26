<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Add Provider') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded">
            <form action="{{ route('providers.store') }}" method="POST">
                @csrf
                <div>
                    <label>Name:</label>
                    <input type="text" name="name" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" class="w-full border rounded p-2" required>
                </div>
                <div>
                    <label>Phone:</label>
                    <input type="text" name="phone" class="w-full border rounded p-2">
                </div>
                <div>
                    <label>Specialization:</label>
                    <input type="text" name="specialization" class="w-full border rounded p-2">
                </div>
                <button type="submit" class="mt-4 bg-blue-500 text-class px-4 py-2 rounded">
                    Save Provider
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
