<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    // Show all prescriptions (with search functionality)
    public function index(Request $request)
{
    $search = $request->input('search');

    $prescriptions = Prescription::with(['appointment.patient', 'appointment.provider'])
        ->when($search, function ($query, $search) {
            $query->where('medication_name', 'like', "%{$search}%")
                ->orWhereHas('appointment.patient', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        })
        ->get();

    return view('prescriptions.index', compact('prescriptions'));
}


    // Show the form to create a new prescription
    public function create()
    {
        $appointments = Appointment::all();
        return view('prescriptions.create', compact('appointments'));
    }

    // Store a new prescription
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

    // Show a single prescription (optional view)
    public function show(Prescription $prescription)
    {
        return view('prescriptions.show', compact('prescription'));
    }

    // Show the form to edit a prescription
    public function edit(Prescription $prescription)
    {
        $appointments = Appointment::all();
        return view('prescriptions.edit', compact('prescription', 'appointments'));
    }

    // Update an existing prescription
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
