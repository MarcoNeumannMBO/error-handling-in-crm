<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function index()
    {
        $interactions = Interaction::with('contact')->get();
        return view('interactions.index', compact('interactions'));
    }

    public function show(Interaction $interaction)
    {
        return view('interactions.show', compact('interaction'));
    }

    public function store(Request $request)
    {

   

        // Validate the request
        $validatedData = $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'interaction_type' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:255',
        ]);

        // Create the interaction
        Interaction::create($validatedData);

        // Redirect back to the contact page with a success message
        return redirect()->route('contacts.show', $validatedData['contact_id'])
                         ->with('success', 'Interaction created successfully.');
    }

}
