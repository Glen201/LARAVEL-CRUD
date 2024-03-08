<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Provider;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        $simNames = Provider::pluck('sim_name')->unique();
        return view('subscribers.index', compact('subscribers', 'simNames'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'sim_name' => 'required|string|max:255',
            'number' => 'required|numeric', // Add validation for number field
        ]);

        // Create a new subscriber record
        Subscriber::create([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'sim_name' => $validatedData['sim_name'],
            'number' => $validatedData['number'],
        ]);

        // Redirect back or wherever you want after storing the subscriber
        return redirect()->back()->with('success', 'Subscriber added successfully!');
    }
    
    public function edit($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $simNames = Provider::pluck('sim_name')->unique();
        return view('subscribers.edit', compact('subscriber', 'simNames'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'sim_name' => 'required|string|max:255',
            'number' => 'required|numeric', // Add validation for number field
        ]);

        // Find the subscriber and update its data
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->update([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'sim_name' => $validatedData['sim_name'],
            'number' => $validatedData['number'],
        ]);

        // Redirect to the subscriber index page after updating
        return redirect()->route('subscribers.index')->with('success', 'Subscriber updated successfully!');
    }
    
    public function destroy($id)
    {
        // Find the subscriber and delete it
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        // Redirect back or wherever you want after deleting the subscriber
        return redirect()->back()->with('success', 'Subscriber deleted successfully!');
    }
}



