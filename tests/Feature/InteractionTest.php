<?php

use App\Models\Interaction;
use function Pest\Laravel\refreshDatabase;

beforeEach(function () {
    refreshDatabase();
});

it('can create an interaction', function () {
    $interaction = Interaction::factory()->create();
    expect($interaction)->not->toBeNull();
});

it('interaction belongs to a contact', function () {
    $interaction = Interaction::factory()->create();
    expect($interaction->contact)->not->toBeNull();
});
