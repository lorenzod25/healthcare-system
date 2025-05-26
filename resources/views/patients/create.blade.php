<x-app-layout>
    <x-slot name="header">
        <h2>Add New Patient</h2>
    </x-slot>

    <div>
       <form method="POST" action="{{ route('patients.store') }}">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Date of Birth:</label>
    <input type="date" name="dob" required>

    <label>Gender:</label>
    <select name="gender" required>
        <option value="">Select gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>

    <label>Contact Info:</label>
    <input type="text" name="contact_info">

    <label>Insurance Info:</label>
    <input type="text" name="insurance_info">

    <label>Medical History:</label>
    <textarea name="medical_history"></textarea>

    <button type="submit">Add Patient</button>
</form>


    </div>
</x-app-layout>
