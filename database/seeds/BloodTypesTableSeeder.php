<?php

use Illuminate\Database\Seeder;

class BloodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            'A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-',
        ];

        foreach ($groups as $type) {
            \App\Models\BloodType::create(['name' => $type]);
        }
    }
}
