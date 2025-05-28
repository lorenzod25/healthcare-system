<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Appointments') }}
            </h2>
            <a href="{{ route('appointments.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-5 py-2 rounded shadow transition">
                ➕ Add New Appointment
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
                <form method="GET" action="{{ route('appointments.index') }}" class="flex flex-col sm:flex-row gap-4 sm:items-center">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by patient or provider name..."
                        class="w-full sm:w-1/3 px-4 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-4 py-2 rounded shadow">
                        Search
                    </button>
                </form>
            </div>

            <!-- Appointments Table -->
            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <h3 class="text-xl font-semibold text-gray-700 px-6 py-4 border-b">Appointments List</h3>

                <table class="min-w-full text-left text-sm text-gray-700">
                    <thead class="bg-gray-100 text-gray-800 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">Patient</th>
                            <th class="px-6 py-3">Provider</th>
                            <th class="px-6 py-3">Scheduled At</th>
                            <th class="px-6 py-3">Reason</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($appointments as $appointment)
                            <tr>
                                <td class="px-6 py-4">{{ $appointment->patient->name }}</td>
                                <td class="px-6 py-4">{{ $appointment->provider->name }}</td>
                                <td class="px-6 py-4">{{ $appointment->scheduled_at }}</td>
                                <td class="px-6 py-4">{{ $appointment->reason }}</td>
                                <td class="px-6 py-4 text-center whitespace-nowrap space-x-4">
                                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                                    No appointments found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
