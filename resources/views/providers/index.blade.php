<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Providers') }}
        </h2>
        <a href="{{ route('providers.create') }}" class="text-blue-600">Add New Provider</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4">
            <h1 class="text-2xl font-bold mb-4">Healthcare Providers</h1>
            <ul>
                @foreach ($providers as $provider)
                    <li>{{ $provider->name }} ({{ $provider->specialization }})</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
