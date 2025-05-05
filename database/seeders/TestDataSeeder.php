<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Company::factory(5)->hasContacts(3)->hasInvoices(2)->create();

    // Optional: interactions per contact
    \App\Models\Contact::all()->each(function ($contact) {
        \App\Models\Interaction::factory(2)->create(['contact_id' => $contact->id]);
    });
    }
}
