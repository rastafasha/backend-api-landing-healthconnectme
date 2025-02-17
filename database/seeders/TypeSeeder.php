<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate(); // Clear existing data
        
        $types = [
            [
                'name' => 'Clínica',
                'state' => '1',
                'created_at' => '2025-02-13 07:50:21',
                'updated_at' => '2025-02-14 00:30:38'
            ],
            [
                'name' => 'Consultorio',
                'state' => '1',
                'created_at' => '2025-02-13 07:50:21',
                'updated_at' => '2025-02-14 00:30:38'
            ],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
