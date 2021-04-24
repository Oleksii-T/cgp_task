<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // genarate user accounts
        User::factory()->count(11000)->create();

        // generate company records with ralationship to clients records
        Company::factory()
            ->hasAttached(
                Client::factory()->count( rand(3,10) )
            )
            ->count(11000)
            ->create();
    }
}
