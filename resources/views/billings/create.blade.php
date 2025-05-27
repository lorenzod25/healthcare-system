<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Create Billing') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            <form method="POST" action="{{ route('billings.store') }}">
                @csrf

                <!-- Appointment -->
                <div class="mb-4">
                    <label for="appointment_id" class="block font-medium text-sm text-gray-700">Appointment</label>
                    <select name="appointment_id" required class="mt-1 block w-full border border-gray-300 rounded p-2">
                        <option value="">-- Select Appointment --</option>
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}">
                                #{{ $appointment->id }} - {{ $appointment->patient->name ?? '' }} with {{ $appointment->provider->name ?? '' }} on {{ $appointment->scheduled_at }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Amount -->
                <div class="mb-4">
                    <label for="amount" class="block font-medium text-sm text-gray-700">Amount ($)</label>
                    <input type="number" step="0.01" name="amount" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                    <select name="status" required class="mt-1 block w-full border border-gray-300 rounded p-2">
                        <option value="unpaid">Unpaid</option>
                        <option value="paid">Paid</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>

                <!-- Payment Method -->
                <div class="mb-4">
                    <label for="payment_method" class="block font-medium text-sm text-gray-700">Payment Method</label>
                    <select name="payment_method" required class="mt-1 block w-full border border-gray-300 rounded p-2">
                        <option value="">-- Select Payment Method --</option>
                        <option value="cash">Cash</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="insurance">Insurance</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>

                <!-- Billing Date -->
                <div class="mb-4">
                    <label for="billing_date" class="block font-medium text-sm text-gray-700">Billing Date</label>
                    <input type="date" name="billing_date" class="mt-1 block w-full border border-gray-300 rounded p-2" required>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">Submit Billing</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
