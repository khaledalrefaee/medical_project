<?php

namespace Database\Seeders;

use App\Models\Pharmise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PharmacyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pharmises')->truncate();

        $pharmises = [
            [
                'name' => 'Cetamol',
                'prise' => '2000',
                'description' => 'All-pain reliever',

            ],
            [
                'name' => 'Panadol',
                'prise' => '5000',
                'description' => 'Antipyretic',

            ],
            [
                'name' => 'B 12',
                'prise' => '12000',
                'description' => 'vitamin',

            ],
        ];

        foreach ($pharmises as $pharmise) {
            Pharmise::create($pharmise);
        }
    }
}
