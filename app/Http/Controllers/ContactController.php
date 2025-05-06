<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with(['company'])->paginate(10); // 10 items per page

        return view('contacts.index', compact('contacts'));
 
    }

    public function show(Contact $contact)
    {   

        $contact = Contact::with('company', 'interactions')->findOrFail($contact->id);

        // Check if the contact exists
        if (!$contact) {
            return redirect()->route('contacts.index')->with('error', 'Contact not found.');
        }

        return view('contacts.show', compact('contact'));
    }
    

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);
    
        // Create the contact
        Contact::create($validatedData);
    
        // Redirect back to the company page with a success message
        return redirect()->route('companies.show', $validatedData['company_id'])
                         ->with('success', 'Contact created successfully.');
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
        ]));

        return redirect()->route('contacts.show', $contact);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
