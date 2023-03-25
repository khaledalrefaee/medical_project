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

            'user all',
            'user create',
            'user edit',
            'user delete',
            'user show',

            'user employee all',
            'user employee create',
            'user employee edit',
            'user employee delete',


            'Show chart',

            'Map',

            'nurse all',
            'nurse create',
            'nurse edit',
            'nurse delete',
            'nurse show',

            'clinic all',
            'clinic create',
            'clinic edit',
            'clinic delete',
            'clinic show',
            'clinic show Delete',


            'doctor all',
            'doctor create',
            'doctor edit',
            'doctor delete',
            'doctor show',
            'doctor show Delete',


            'pharmacy all',
            'pharmacy create',
            'pharmacy edit',
            'pharmacy delete',

            'Add a request',

            'Reservations all',
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

            'Show Deleted Reservations'

            ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
