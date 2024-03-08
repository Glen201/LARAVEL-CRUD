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
        $validatedData = $request->validate([
            'sim_name' => 'required|string|max:255',
            // Add validation rules for other fields if needed
        ]);

        Provider::create($validatedData);

        return redirect()->route('providers.index')->with('success', 'Provider added successfully!');
    }

    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        return view('providers.edit', compact('provider'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sim_name' => 'required|string|max:255',
            // Add validation rules for other fields if needed
        ]);

        $provider = Provider::findOrFail($id);
        $provider->update($validatedData);

        return redirect()->route('providers.index')->with('success', 'Provider updated successfully!');
    }

    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('providers.index')->with('success', 'Provider deleted successfully!');
    }
}
