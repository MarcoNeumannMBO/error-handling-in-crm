<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all()->sortDesc();
        return view('companies.index', compact('companies'));
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));

    }

    public function create()
    {
        // Show the form to create a new company

        return view('companies.create');
    }

    public function store(Request $request)
    {

 
        // Validate the request
        $validatedData = $request->validate([
        'company_name' => 'required|string|max:255',
        'email' => 'nullable|email',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'vat_number' => 'nullable|string|max:50',
        'phone' => 'nullable|string|max:20',
        ]);
    
        // Check if the company already exists
        $existingCompany = Company::where('company_name', $validatedData['company_name'])->first();
        if ($existingCompany) {
            // If the company already exists, redirect to its show page
            return redirect()->route('companies.show', $existingCompany);
        }
    
        // Create the company
        $company = Company::create($validatedData);
    
        // Redirect to the show page
        return redirect()->route('companies.show', $company);
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $company->update($request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'nullable|email',
        ]));

        return redirect()->route('companies.show', $company);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index');
    }
}
