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
        \App\Models\User::factory(10)->create();
        //employee working 6 months
        \App\Models\Employee::factory(2)->create([
            'start_work' => now()->subMonths(array_rand([1,2,3]))
                ]);
        //employee working between 6 months and 2 years
        \App\Models\Employee::factory(2)->create([
            'start_work' => now()->subMonths(random_int(6,24))
                ]);
        //employee working more than 2 years
        \App\Models\Employee::factory(2)->create([
            'start_work' => now()->subMonths(random_int(24,40))
                ]);

    }
}
