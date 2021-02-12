<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create()->each(function ($user) {

            // Seed the relation with 5 addresses
            $addresses = \App\Models\Address::factory( 5)->make();
            $user->addresses()->saveMany($addresses);
        });
    }
}
