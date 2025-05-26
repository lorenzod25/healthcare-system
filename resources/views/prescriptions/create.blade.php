<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Prescription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('prescriptions.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="appointment_id" class="block font-medium text-sm text-gray-700">Appointment ID</label>
                        <input type="number" name="appointment_id" id="appointment_id" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="medication" class="block font-medium text-sm text-gray-700">Medication</label>
                        <input type="text" name="medication" id="medication" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="dosage" class="block font-medium text-sm text-gray-700">Dosage</label>
                        <input type="text" name="dosage" id="dosage" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="frequency" class="block font-medium text-sm text-gray-700">Frequency</label>
                        <input type="text" name="frequency" id="frequency" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label for="duration" class="block font-medium text-sm text-gray-700">Duration</label>
                        <input type="text" name="duration" id="duration" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                            Submit Prescription
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
