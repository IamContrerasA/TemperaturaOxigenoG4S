<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

//importar modelos necesarios
use \App\Models\Worker;
use \App\Models\Result;
use \App\Models\Role;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //POBLAR LA BASE DE DATOS

        // Crear trabajadores y asignarles un random de resultados
        $num_workers = 6;
        $mul_results = 6;
        
        for ($i=0; $i < $num_workers; $i++) {
            Worker::create([
                    'name' => "Persona" . $i,
                    'age' => $i + 31,
                    'sex' => "hombre/mujer",
                    'DNI' => 54872170 + $i
                ]);
        }
        
        
        for ($i=0; $i < $num_workers * $mul_results; $i++) {
            Result::create([
                    'worker_id' => mt_rand(1,$num_workers),
                    'temperature' => 36.5 + mt_rand(1,$num_workers),
                    'oxygen_saturation' => 89.5 +mt_rand(1,$num_workers),
                    'created_at' => now()
                ]);
        }

        //crear roles                
        Role::create(['name' => "administrador"]);
        Role::create(['name' => "operador"]);
        Role::create(['name' => "supervisor"]);
        Role::create(['name' => "otro"]);
        
        //crear usuarios
        User::create(['role_id' => 1, 'name' => "Administrador",  'email' => "administrador@gamt.com.pe", 'password' => Hash::make("administrador")]);
        User::create(['role_id' => 2, 'name' => "Operador",  'email' => "operador@gamt.com.pe", 'password' => Hash::make("operador")]);
        User::create(['role_id' => 3, 'name' => "Supervisor",  'email' => "supervisor@gamt.com.pe", 'password' => Hash::make("supervisor")]);

    }
}
