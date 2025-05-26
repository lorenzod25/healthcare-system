<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Display a list of all patients
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Show the form to create a new patient
    public function create()
    {
        return view('patients.create');
    }

    //  Store a new patient in the database (merged correctly)
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'dob' => 'required|date',
        'gender' => 'required|string',
        'contact_info' => 'nullable|string|max:255',
        'insurance_info' => 'nullable|string|max:255',
        'medical_history' => 'nullable|string',
    ]);

    Patient::create($request->all());

    return redirect()->route('patients.index')->with('success', 'Patient added successfully.');
}


    // Show details for a single patient
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    // Show the form to edit a patient
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // Update patient details in the database
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'contact_info' => 'nullable|string|max:255',
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
    }

    // Delete a patient record
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully.');
    }
}
