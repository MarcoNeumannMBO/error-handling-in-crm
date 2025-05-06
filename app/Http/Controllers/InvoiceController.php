<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('company')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            
        'company_id' => 'required|exists:companies,id',
        'description' => 'nullable|string|max:255',
        'total_amount' => 'required|numeric|min:0',

        ]);




        // Create the invoice
        Invoice::create($validatedData);

        // Redirect back to the company page with a success message
        return redirect()->route('companies.show', $validatedData['company_id'])
                         ->with('success', 'Invoice created successfully.');
    }
}
