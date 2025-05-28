<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Provider;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
{
    $query = Appointment::with(['patient', 'provider']);

    if ($request->has('search')) {
        $search = $request->input('search');

        $query->where(function ($q) use ($search) {
            $q->whereHas('patient', function ($sub) use ($search) {
                $sub->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('provider', function ($sub) use ($search) {
                $sub->where('name', 'like', '%' . $search . '%');
            });
        });
    }

    $appointments = $query->get();

    return view('appointments.index', compact('appointments'));
}


    public function create()
    {
        $patients = Patient::all();
        $providers = Provider::all();
        return view('appointments.create', compact('patients', 'providers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'provider_id' => 'required|exists:providers,id',
            'scheduled_at' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created.');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $patients = Patient::all();
        $providers = Provider::all();
        return view('appointments.edit', compact('appointment', 'patients', 'providers'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'provider_id' => 'required|exists:providers,id',
            'scheduled_at' => 'required|date',
            'reason' => 'nullable|string',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Appointment deleted.');
    }
}

