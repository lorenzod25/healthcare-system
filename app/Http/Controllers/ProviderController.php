<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:providers,email',
            'phone' => 'nullable|string',
            'specialization' => 'nullable|string',
        ]);

        Provider::create($request->all());

        return redirect()->route('providers.index')->with('success', 'Provider added successfully.');
    }
}
