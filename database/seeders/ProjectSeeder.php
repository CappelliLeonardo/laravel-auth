<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Models
use App\Models\Project;
//Helpers
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();
        
            for ($i = 0; $i < 10; $i++) {
                $titleForMassAssignment = fake()->sentence();
                $slugForMassAssignment = Str::slug($titleForMassAssignment);
                $postWithMassAssignment = Project::create([
                'title' => $titleForMassAssignment,
                'slug' => $slugForMassAssignment,
                'content' => fake()->paragraph(),
            ]);
        }
            
    }
}
