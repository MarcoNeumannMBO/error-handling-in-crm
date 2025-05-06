<?php

namespace Database\Seeders;

use App\Models\User;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Interaction;
use App\Models\Invoice;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Company::factory(10)->create();
        Contact::factory(10)->create();
        Interaction::factory(10)->create();
        Invoice::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // password
        ]);

    }
}
