<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PaisSeeder::class,
            UserSeeder::class,
            DoctorSeeder::class,
            RegistroLandingSeeder::class,
            TypeSeeder::class,
            SubcripcionSeeder::class,
            
        ]);
    }
        
    
}
