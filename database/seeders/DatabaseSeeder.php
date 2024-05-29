<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Election;
use App\Models\ElectionParticipation;
use App\Models\Party;
use App\Models\Prestation;
use App\Models\Program;
use Illuminate\Validation\Rules\Can;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Category::factory(4)->create();
        Party::factory(8)->create();
        Program::factory(40)->create();
        Candidate::factory(20)->create();
        Prestation::factory(60)->create();
    }
}
