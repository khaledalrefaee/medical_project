<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->truncate();

        $details = [
            [
                'doctor_id' => 1,
                'specialization' => 'ECG',
                'phone' => '925488362',
                'email' => 'mohamed@example.com',
            ],
            [
                'doctor_id' => 2,
                'specialization' => 'Orthodontics',
                'phone' => '962812838',
                'email' => 'khaeld@example.com',
            ],
            [
                'doctor_id' => 3,
                'specialization' => 'surgery',
                'phone' => '963154826',
                'email' => 'louy@example.com',
            ],
        ];

        foreach ($details as $detail) {

            Detail::create($detail);
        }
    }
}
