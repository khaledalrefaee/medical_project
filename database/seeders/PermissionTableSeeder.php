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

            'user-index',
            'user-create',
            'user-edit',
            'user-delete',

            'user-employee-all',
            'user-employee-create',
            'user-employee-edit',
            'user-employee-delete',
            'user-employee-show',

            'Show-chart',

            'nuers-index',
            'nuers-create',
            'nuers-edit',
            'nuers-delete',
            'nuers-show',

            'Clincs-index',
            'Clincs-create',
            'Clincs-edit',
            'Clincs-delete',
            'Clincs-show',


            'doctor-index',
            'doctor-create',
            'doctor-edit',
            'doctor-delete',
            'doctor-show',


            'pharmese-index',
            'pharmese-create',
            'pharmese-edit',
            'pharmese-delete',

            'Add a request',

            'Reservations-index',
            'Reservations-create',
            'Reservations-edit',
            'Reservations-delete',
            'Reservations-show',
            'Reservations-completed',
            'Reservations-Cancelling',
            'Reservations-Download',

            'waiting-create',
            'waiting-edit',
            'waiting-show',
            'waiting-delete',

            ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission])->delete();
        }
    }
}
