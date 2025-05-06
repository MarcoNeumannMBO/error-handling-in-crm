<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'invoicesCardData'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('companies', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('companies/{company}', [CompanyController::class, 'show'])->name('companies.show');

    Route::get('companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::get('companies/{company}/contacts', [CompanyController::class, 'contacts'])->name('companies.contacts');
    Route::get('companies/{company}/interactions', [CompanyController::class, 'interactions'])->name('companies.interactions');
    Route::get('companies/{company}/invoices', [CompanyController::class, 'invoices'])->name('companies.invoices');
    Route::get('companies/{company}/contacts/create', [CompanyController::class, 'createContact'])->name('companies.contacts.create');

    // all contacts routes
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
   
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::patch('contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

// all invoices routes
    Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::post('invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::get('invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
    Route::patch('invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
    Route::delete('invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');   

// all interactions routes
    Route::get('interactions', [InteractionController::class, 'index'])->name('interactions.index');
    Route::post('interactions', [InteractionController::class, 'store'])->name('interactions.store');
    Route::get('interactions/create', [InteractionController::class, 'create'])->name('interactions.create');
    Route::get('interactions/{interaction}', [InteractionController::class, 'show'])->name('interactions.show');
    Route::get('interactions/{interaction}/edit', [InteractionController::class, 'edit'])->name('interactions.edit');
    Route::patch('interactions/{interaction}', [InteractionController::class, 'update'])->name('interactions.update');
    Route::delete('interactions/{interaction}', [InteractionController::class, 'destroy'])->name('interactions.destroy');

});




