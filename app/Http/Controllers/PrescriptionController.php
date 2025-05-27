<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    // Show all prescriptions
    public function index()
{
    $prescriptions = Prescription::with(['appointment.patient', 'appointment.provider'])->get();
    return view('prescriptions.index', compact('prescriptions'));
}


    // Show the form to create a new prescription
    public function create()
    {
        $appointments = Appointment::all(); // Needed to assign the prescription to an appointment
        return view('prescriptions.create', compact('appointments'));
    }

    // Store the new prescription in the database
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:100',
            'frequency' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
        ]);

        Prescription::create($request->all());
        return redirect()->route('prescriptions.index')->with('success', 'Prescription created successfully.');
    }

    // Show a single prescription
    public function show(Prescription $prescription)
    {
        return view('prescriptions.show', compact('prescription'));
    }

    // Show the form to edit an existing prescription
    public function edit(Prescription $prescription)
    {
        $appointments = Appointment::all(); // In case the appointment needs to be changed
        return view('prescriptions.edit', compact('prescription', 'appointments'));
    }

    // Update a prescription
    public function update(Request $request, Prescription $prescription)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'medication_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:100',
            'frequency' => 'required|string|max:100',
            'duration' => 'required|string|max:100',
        ]);

        $prescription->update($request->all());
        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully.');
    }

    // Delete a prescription
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index')->with('success', 'Prescription deleted successfully.');
    }
}
