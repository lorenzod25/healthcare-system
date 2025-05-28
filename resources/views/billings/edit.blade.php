<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ __('✏️ Edit Billing Record') }}
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

            <form method="POST" action="{{ route('billings.update', $billing->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Appointment -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Appointment</label>
                    <select name="appointment_id" required class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                        @foreach ($appointments as $appointment)
                            <option value="{{ $appointment->id }}" {{ $billing->appointment_id == $appointment->id ? 'selected' : '' }}>
                                #{{ $appointment->id }} — {{ $appointment->patient->name ?? 'N/A' }} with {{ $appointment->provider->name ?? 'N/A' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Amount -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                    <input type="number" name="amount" step="0.01" value="{{ $billing->amount }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm" required>
                </div>

                <!-- Billing Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Billing Date</label>
                    <input type="date" name="billing_date" value="{{ $billing->billing_date }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm" required>
                </div>

                <!-- Payment Method -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                    <select name="payment_method" class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                        <option value="">Select method</option>
                        <option value="cash" {{ $billing->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                        <option value="credit_card" {{ $billing->payment_method == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                        <option value="debit_card" {{ $billing->payment_method == 'debit_card' ? 'selected' : '' }}>Debit Card</option>
                        <option value="insurance" {{ $billing->payment_method == 'insurance' ? 'selected' : '' }}>Insurance</option>
                        <option value="other" {{ $billing->payment_method == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded px-4 py-2 shadow-sm">
                        <option value="unpaid" {{ $billing->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        <option value="paid" {{ $billing->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="pending" {{ $billing->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                </div>

                <!-- Actions -->
                <div class="flex justify-start gap-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-black font-semibold px-6 py-2 rounded shadow">
                        💾 Update Billing
                    </button>
                    <a href="{{ route('billings.index') }}" class="text-gray-600 hover:underline self-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
