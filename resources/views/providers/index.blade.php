<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Providers') }}
            </h2>
            <a href="{{ route('providers.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-5 py-2 rounded shadow transition">
                ➕ Add New Provider
            </a>
        </div>
    </x-slot>

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-md shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Search Bar -->
            <div class="mb-6">
                <form method="GET" action="{{ route('providers.index') }}" class="flex flex-col sm:flex-row gap-4 sm:items-center">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search providers by name or specialization..."
                        class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-4 py-2 rounded shadow">
                        Search
                    </button>
                </form>
            </div>

            <!-- Providers Table -->
            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <h3 class="text-xl font-semibold text-gray-700 px-6 py-4 border-b">Healthcare Providers</h3>
                <table class="min-w-full text-left text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-800 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Name</th>
                            <th class="px-6 py-3">Specialization</th>
                            <th class="px-6 py-3">Contact</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($providers as $provider)
                            <tr>
                                <td class="px-6 py-4">{{ $provider->name }}</td>
                                <td class="px-6 py-4">{{ $provider->specialization }}</td>
                                <td class="px-6 py-4">{{ $provider->phone }}</td>
                                <td class="px-6 py-4 text-center whitespace-nowrap space-x-4">
                                    <a href="{{ route('providers.edit', $provider) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('providers.destroy', $provider) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this provider?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                    No providers found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
