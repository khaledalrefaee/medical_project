<?php

namespace Database\Seeders;

use App\Models\Nurses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nurses')->truncate();

        $nurses = [
            [
                'name' => 'Ahmed',
                'phone' => '962812838',
                'description' => 'Nurse Ahmed specializes in elderly care',

            ],
            [
                'name' => 'fadi',
                'phone' => '981161119',
                'description' => 'Nurse Fadi is a specialist in acupuncture and serum change',

            ],
            [
                'name' => 'Anas',
                'phone' => '981191111',
                'description' => 'Nurse Anas is specialized in all first aid',

            ],
        ];

        foreach ($nurses as $nurse) {
            Nurses::create($nurse);
        }
    }
}
