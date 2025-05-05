<?php

use App\Models\Contact;
use function Pest\Laravel\refreshDatabase;

beforeEach(function () {
    refreshDatabase();
});

it('can create a contact', function () {
    $contact = Contact::factory()->create();
    expect($contact)->not->toBeNull();
});

it('contact belongs to a company', function () {
    $contact = Contact::factory()->create();
    expect($contact->company)->not->toBeNull();
});

it('contact can have interactions', function () {
    $contact = Contact::factory()->hasInteractions(2)->create();
    expect($contact->interactions)->toHaveCount(2);
});
