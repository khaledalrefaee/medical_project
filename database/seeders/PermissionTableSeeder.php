<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-index',
            'role-create',
            'role-edit',
            'role-delete',

            'user index',
            'user create',
            'user edit',
            'user delete',
            'user show',

            'user employee all',
            'user employee create',
            'user employee edit',
            'user employee delete',
            'user employee show',

            'Show chart',

            'Map',

            'nurse index',
            'nurse create',
            'nurse edit',
            'nurse delete',
            'nurse show',

            'clinic index',
            'clinic create',
            'clinic edit',
            'clinic delete',
            'clinic show',


            'doctor index',
            'doctor create',
            'doctor edit',
            'doctor delete',
            'doctor show',


            'pharmacy index',
            'pharmacy create',
            'pharmacy edit',
            'pharmacy delete',

            'Add a request',

            'Reservations index',
            'Reservations create',
            'Reservations edit',
            'Reservations delete',
            'Reservations show',
            'Reservations completed',
            'Reservations Cancelling',
            'Reservations Download',

            'waiting create',
            'waiting edit',
            'waiting show',
            'waiting delete',

            ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission])->delete();
        }
    }
}
