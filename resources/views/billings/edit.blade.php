<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Edit Billing Record') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('billings.update', $billing->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Appointment ID</label>
                    <select name="appointment_id" class="w-full border rounded px-3 py-2">
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}" {{ $billing->appointment_id == $appointment->id ? 'selected' : '' }}>
                                #{{ $appointment->id }} — {{ $appointment->patient->name ?? 'N/A' }} with {{ $appointment->provider->name ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Amount</label>
                    <input type="number" step="0.01" name="amount" value="{{ $billing->amount }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Billing Date</label>
                    <input type="date" name="billing_date" value="{{ $billing->billing_date }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Payment Method</label>
                    <select name="payment_method" class="w-full border rounded px-3 py-2">
                        <option value="">Select method</option>
                        <option value="cash" {{ $billing->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                        <option value="credit_card" {{ $billing->payment_method == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                        <option value="debit_card" {{ $billing->payment_method == 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                        <option value="insurance" {{ $billing->payment_method == 'insurance' ? 'selected' : '' }}>Insurance</option>
                        <option value="other" {{ $billing->payment_method == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Status</label>
                    <select name="status" class="w-full border rounded px-3 py-2">
                        <option value="unpaid" {{ $billing->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        <option value="paid" {{ $billing->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="pending" {{ $billing->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                    Update Billing
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
