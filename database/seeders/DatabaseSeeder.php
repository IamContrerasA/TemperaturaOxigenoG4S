<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use \App\Models\Patient;
use \App\Models\Result;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();  
        $num_patients = 6;
        $mul_results = 6;
        /*
        for ($i=0; $i < $num_patients; $i++) {
            Patient::create([
                    'name' => "Persona" . $i,
                    'age' => $i + 31,
                    'sex' => "hombre/mujer",
                    'DNI' => 54872170 + $i
                ]);
        }
        */
        
        for ($i=0; $i < $num_patients * $mul_results; $i++) {
            Result::create([
                    'patient_id' => mt_rand(1,$num_patients),
                    'temperature' => 36.5 + mt_rand(1,$num_patients),
                    'oxygen_saturation' => 89.5 +mt_rand(1,$num_patients),
                    'created_at' => now()
                ]);
        }
    }
}
