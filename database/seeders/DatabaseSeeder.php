<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        if (User::count() === 0) {
            $this->call(GeneralSettingsSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(DivisionSeeder::class);
            $this->call(DistrictSeeder::class);
            $this->call(UpazilaSeeder::class);
            $this->call(UnionSeeder::class);
            $this->call(UtilsSeeder::class);
            $this->call(ShippingChargeSeeder::class);
        }
    }
}
