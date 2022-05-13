<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

use Spatie\Permission\Models\Role;
class CreateSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([

            'name_admin' => 'wissal sakhri', 

            'email_admin' => 'admin@gmail.com',

            'password_admin' => bcrypt('123456'),
            'phone_admin'=>'123456',
            'address_admin'=>'gabes'

        ]);


    //$role = Role::create(['name' => 'regularadmin']);
    $role = Role::firstOrCreate(['guard_name' => 'admin-api','name'=>'SuperAdmin']);

    $admin->assignRole($role);
    

    }
}
