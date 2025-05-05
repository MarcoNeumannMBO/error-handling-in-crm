<?php

use App\Models\Invoice;
use function Pest\Laravel\refreshDatabase;
use function Pest\Laravel\assertDatabaseHas;

beforeEach(function () {
    refreshDatabase();
});

it('can create an invoice', function () {
    $invoice = Invoice::factory()->create();
    assertDatabaseHas('invoices', ['id' => $invoice->id]);
});

it('invoice belongs to a company', function () {
    $invoice = Invoice::factory()->create();
    expect($invoice->company)->not->toBeNull();
});

it('invoice has default status draft', function () {
    $invoice = Invoice::factory()->create();
    expect($invoice->status)->toBe('draft');
});
