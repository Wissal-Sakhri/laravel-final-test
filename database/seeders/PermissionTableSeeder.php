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

            'listRole',
 
            'createRole',
 
            'editRole',
 
            'deleteRole',
 
            'listProduct',
 
            'createProduct',
 
            'editProduct',
 
            'deleteProduct'
 
        ];
        foreach ($permissions as $permission) {

            Permission::create(['guard_name'=>'admin-api','name' => $permission]);

       }
    }
}
