<?php

use App\Models\Company;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\refreshDatabase;

beforeEach(function () {
    refreshDatabase();
});

it('can create a company', function () {
    $company = Company::factory()->create();
    assertDatabaseHas('companies', ['id' => $company->id]);
});

it('can have multiple contacts', function () {
    $company = Company::factory()->hasContacts(2)->create();
    expect($company->contacts)->toHaveCount(2);
});

it('can have multiple invoices', function () {
    $company = Company::factory()->hasInvoices(3)->create();
    expect($company->invoices)->toHaveCount(3);
});
