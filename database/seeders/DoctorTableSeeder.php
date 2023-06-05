<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('doctors')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $doctors = [
            [
                'name' => 'Mohammed',
                'email' => 'mohammed@gmail.com',
                'password' => '123',
                'clinic_id' => 1,
            ],
            [
                'name' => 'Khaled',
                'email' => 'khaled@gmail.com',
                'password' => '123456',
                'clinic_id' => 2,
            ],
            [
                'name' => 'Louy',
                'email' => 'louy@gmail.com',
                'password' => '1234',
                'clinic_id' => 3,
            ],
        ];

        foreach ($doctors as $doctor) {
            $doctor['password'] = Hash::make($doctor['password']);
            Doctor::create($doctor);
        }
    }
}
