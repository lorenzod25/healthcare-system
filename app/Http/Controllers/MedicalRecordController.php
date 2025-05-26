<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Appointment;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    // Show all medical records
    public function index()
    {
        $records = MedicalRecord::with('appointment.patient', 'appointment.provider')->get();
        return view('medical_records.index', compact('records'));
    }

    // Show form to create a new record
    public function create()
    {
        $appointments = Appointment::with('patient', 'provider')->get();
        return view('medical_records.create', compact('appointments'));
    }

    // Store the record
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'diagnosis' => 'required|string',
            'treatment_plan' => 'nullable|string',
            'lab_results' => 'nullable|string',
        ]);

        MedicalRecord::create($request->all());
        return redirect()->route('medical-records.index')->with('success', 'Medical record created successfully.');
    }

    // Show a single record
    public function show(MedicalRecord $medicalRecord)
    {
        return view('medical_records.show', compact('medicalRecord'));
    }

    // Show form to edit
    public function edit(MedicalRecord $medicalRecord)
    {
        $appointments = Appointment::all();
        return view('medical_records.edit', compact('medicalRecord', 'appointments'));
    }

    // Update the record
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'diagnosis' => 'required|string',
            'treatment_plan' => 'nullable|string',
            'lab_results' => 'nullable|string',
        ]);

        $medicalRecord->update($request->all());
        return redirect()->route('medical-records.index')->with('success', 'Medical record updated.');
    }

    // Delete the record
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();
        return redirect()->route('medical-records.index')->with('success', 'Medical record deleted.');
    }
}
