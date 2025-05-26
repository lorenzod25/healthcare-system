<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    // Display a list of all providers
    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }

    // Show the form to create a new provider
    public function create()
    {
        return view('providers.create');
    }

    // Store a newly created provider in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        Provider::create($request->all());
        return redirect()->route('providers.index')->with('success', 'Provider added successfully.');
    }

    // Show the form for editing the specified provider
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        return view('providers.edit', compact('provider'));
    }

    // Update the specified provider in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        $provider = Provider::findOrFail($id);
        $provider->update($request->all());

        return redirect()->route('providers.index')->with('success', 'Provider updated successfully.');
    }

    // Remove the specified provider from the database
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('providers.index')->with('success', 'Provider deleted successfully.');
    }
}
