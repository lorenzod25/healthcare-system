<?php


namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Appointment;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Billing::with('appointment.patient')->get();
        return view('billings.index', compact('billings'));
    }

    public function create()
    {
        $appointments = Appointment::with('patient')->get();
        return view('billings.create', compact('appointments'));
    }

    public function store(Request $request)
{
    $request->validate([
        'appointment_id' => 'required|exists:appointments,id',
        'amount' => 'required|numeric',
        'status' => 'required|string',
        'payment_method' => 'required|string',
        'billing_date' => 'required|date',
    ]);

    \App\Models\Billing::create($request->all());

    return redirect()->route('billings.index')->with('success', 'Billing created successfully.');
}


    public function show(Billing $billing)
    {
        return view('billings.show', compact('billing'));
    }

    public function edit(Billing $billing)
    {
        $appointments = Appointment::with('patient')->get();
        return view('billings.edit', compact('billing', 'appointments'));
    }

    public function update(Request $request, Billing $billing)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'payment_method' => 'required|string',
            'billing_date' => 'required|date',
        ]);

        $billing->update($request->all());
        return redirect()->route('billings.index')->with('success', 'Billing record updated.');
    }

    public function destroy(Billing $billing)
    {
        $billing->delete();
        return redirect()->route('billings.index')->with('success', 'Billing record deleted.');
    }
}
