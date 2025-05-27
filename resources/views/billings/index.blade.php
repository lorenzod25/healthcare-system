<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Billing Records') }}
        </h2>
        <a href="{{ route('billings.create') }}" class="text-blue-600 hover:underline ml-4">Add New Billing</a>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4">
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Patient</th>
                        <th class="border px-4 py-2">Amount</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Payment Method</th>
                        <th class="border px-4 py-2">Billing Date</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billings as $billing)
                        <tr>
                            <td class="border px-4 py-2">{{ $billing->appointment->patient->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $billing->amount }}</td>
                            <td class="border px-4 py-2">{{ $billing->status }}</td>
                            <td class="border px-4 py-2">{{ $billing->payment_method }}</td>
                            <td class="border px-4 py-2">{{ $billing->billing_date }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <a href="{{ route('billings.edit', $billing) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('billings.destroy', $billing) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
