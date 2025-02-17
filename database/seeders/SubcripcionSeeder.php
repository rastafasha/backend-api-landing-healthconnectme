<?php

namespace Database\Seeders;

use App\Models\Subcripcion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SubcripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcripcions = [

            [
                "email" => "test1@test1.com",
                "created_at" => now(),

            ],

            [
                "email" => "admin@admin.com",
                "created_at" => now(),

            ],
        ];

        foreach ($subcripcions as $subcripcion) {

            $subcripcion = Subcripcion::create($subcripcion);
        }
    }
}
