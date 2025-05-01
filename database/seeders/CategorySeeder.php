<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Highest',
                'description' => 'Planting roadside trees with regular watering',
                'points' => '2500',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Upper High',
                'description' => 'Planting roadside trees',
                'points' => '2000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lower high',
                'description' => 'Planting small roadside plants',
                'points' => '1000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Low',
                'description' => 'Planting trees/plants at home with regular watering',
                'points' => '500',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Medium',
                'description' => 'Watering plants regularly',
                'points' => '700',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bonus Point',
                'description' => 'Caring for plants in bad condition',
                'points' => '3000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
