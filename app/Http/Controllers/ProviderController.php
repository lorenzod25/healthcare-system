<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    // Display a list of all providers with search
    public function index(Request $request)
    {
        $search = $request->input('search');

        $providers = Provider::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('specialization', 'like', "%{$search}%");
            })
            ->get();

        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        Provider::create($request->all());

        return redirect()->route('providers.index')->with('success', 'Provider added successfully.');
    }

    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        return view('providers.edit', compact('provider'));
    }

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

    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('providers.index')->with('success', 'Provider deleted successfully.');
    }
}
