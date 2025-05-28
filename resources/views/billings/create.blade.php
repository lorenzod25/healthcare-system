<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ __('➕ Create Billing') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
            @if ($errors->any())
                <div class="mb-6 text-red-600">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('billings.store') }}" class="space-y-6">
                @csrf

                <!-- Appointment -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Appointment</label>
                    <select name="appointment_id" required class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                        <option value="">-- Select Appointment --</option>
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}">
                                #{{ $appointment->id }} — {{ $appointment->patient->name ?? '' }} with {{ $appointment->provider->name ?? '' }} on {{ $appointment->scheduled_at }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Amount -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Amount ($)</label>
                    <input type="number" step="0.01" name="amount" class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm" required>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" required class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                        <option value="unpaid">Unpaid</option>
                        <option value="paid">Paid</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>

                <!-- Payment Method -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                    <select name="payment_method" required class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                        <option value="">-- Select Payment Method --</option>
                        <option value="cash">Cash</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                        <option value="insurance">Insurance</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>

                <!-- Billing Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Billing Date</label>
                    <input type="date" name="billing_date" class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm" required>
                </div>

                <!-- Submit + Cancel -->
                <div class="flex justify-start gap-4 pt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-6 py-2 rounded shadow">
                        💾 Submit Billing
                    </button>
                    <a href="{{ route('billings.index') }}" class="text-gray-600 hover:underline self-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
