<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Providers') }}
        </h2>
        <a href="{{ route('providers.create') }}" class="ml-4 text-blue-600 hover:underline">Add New Provider</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow rounded">
            <h1 class="text-2xl font-bold mb-4">Healthcare Providers</h1>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Specialization</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($providers as $provider)
                        <tr>
                            <td class="px-6 py-4">{{ $provider->name }}</td>
                            <td class="px-6 py-4">{{ $provider->specialization }}</td>
                            <td class="px-6 py-4">{{ $provider->phone }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('providers.edit', $provider) }}" class="text-indigo-600 hover:underline">Edit</a>
                                <form action="{{ route('providers.destroy', $provider) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this provider?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($providers->isEmpty())
                <p class="text-gray-600 mt-4">No providers found.</p>
            @endif
        </div>
    </div>
</x-app-layout>
