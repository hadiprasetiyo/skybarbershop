<?php

namespace Database\Seeders;

use App\Models\Capster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CapsterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Capster::create(['name' => 'Asep', 'expertise' => 'Haircut']);
      Capster::create(['name' => 'Budi', 'expertise' => 'Shaving']);
      Capster::create(['name' => 'Cindy', 'expertise' => 'Hair Coloring']);
    }
}
