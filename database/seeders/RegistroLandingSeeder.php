<?php

namespace Database\Seeders;

use App\Models\RegistroL;
use Illuminate\Database\Seeder;

class RegistroLandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RegistroL::truncate(); // Clear existing data
        
        $rlandings = [
            [
                'nombre' => 'Malcolm',
                'apellido' => 'Cordova',
                'email' => 'mercadocreativo@gmail.com',
                'ciudad' => 'caracas',
                'phone' => '04241874370',
                'speciality' => 'Odontologia',
                'address' => "caracas\ncaracas",
                'facebook' => null,
                'instagram' => null,
                'dondeSeEntero' => 'un amigo',
                'image' => null,
                'status' => 'PENDING',
                'terminos' => '1',
                'created_at' => '2025-02-13 07:50:21',
                'updated_at' => '2025-02-14 00:30:38'
            ],
            [
                'nombre' => 'test',
                'apellido' => 'Cordova',
                'email' => 'test@test.com',
                'ciudad' => 'caracas',
                'phone' => '234432432',
                'speciality' => 'Dermatologia',
                'address' => "caracas\ncaracas",
                'facebook' => null,
                'instagram' => null,
                'dondeSeEntero' => 'amigo',
                'image' => null,
                'status' => 'PENDING',
                'terminos' => '1',
                'created_at' => '2025-02-13 08:02:11',
                'updated_at' => '2025-02-13 08:02:11'
            ]
        ];

        foreach ($rlandings as $rlanding) {
            RegistroL::create($rlanding);
        }
    }
}
