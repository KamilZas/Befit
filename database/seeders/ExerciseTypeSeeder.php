<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('exercise_types')->insert([
            [
                'name' => 'Przysiad ze sztangą',
                'description' => 'Ćwiczenie na nogi',
            ],
            [
                'name' => 'Martwy ciąg',
                'description' => 'Ćwiczenie na plecy',
            ],
            [
                'name' => 'Wyciskanie sztangi',
                'description' => 'Ćwiczenie na klatkę',
            ],
        ]);
    }
}
