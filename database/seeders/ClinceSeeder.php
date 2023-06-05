<?php

namespace Database\Seeders;

use App\Models\Clinics;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clinics')->delete();

        $clinics = [
            'Cardiac',
            'Teeth',
            'Digestive',

        ];
        foreach ($clinics as $CL) {
            Clinics::create(['name' => $CL]);
        }
    }
}
