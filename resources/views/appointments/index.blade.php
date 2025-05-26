<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments') }}
        </h2>
        <a href="{{ route('appointments.create') }}" class="text-sm text-blue-600 hover:underline">Add New Appointment</a>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto bg-white p-6 shadow rounded">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2">Patient</th>
                        <th class="p-2">Provider</th>
                        <th class="p-2">Scheduled At</th>
                        <th class="p-2">Reason</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr class="border-b">
                            <td class="p-2">{{ $appointment->patient->name }}</td>
                            <td class="p-2">{{ $appointment->provider->name }}</td>
                            <td class="p-2">{{ $appointment->scheduled_at }}</td>
                            <td class="p-2">{{ $appointment->reason }}</td>
                            <td class="p-2 space-x-2">
                                <a href="{{ route('appointments.edit', $appointment->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
