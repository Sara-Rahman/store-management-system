<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=Permission::all();
        $role=Role::where('name','admin')->first();
        foreach($permissions as $permission)
        {
        
        RolePermission::create([    
           'role_id'=>$role->id,
           'permission_id'=>$permission->id,
        ]);
    }
        
    }
}
