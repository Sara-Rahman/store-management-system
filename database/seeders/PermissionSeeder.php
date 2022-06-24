<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $adminModule = Module::updateOrCreate([
            'name' => 'Admin',
            'description' => 'admin'
        ]);
        Permission::updateOrCreate([
            'module_id' => $adminModule->id,
            'name' => 'Add Item',
            'slug' => 'item.create'
        ]);
        Permission::updateOrCreate([
         'module_id' => $adminModule->id,
         'name' => 'Remove Item',
         'slug' => 'item.destroy'
     ]);
     Permission::updateOrCreate([
         'module_id' => $adminModule->id,
         'name' => 'Update Item',
         'slug' => 'item.edit'
     ]);
     Permission::updateOrCreate([
         'module_id' => $adminModule->id,
         'name' => 'Add Supplier',
         'slug' => 'supplier.create'
     ]);
     Permission::updateOrCreate([
        'module_id' => $adminModule->id,
        'name' => 'Remove Supplier',
        'slug' => 'supplier.destroy'
    ]);
    Permission::updateOrCreate([
        'module_id' => $adminModule->id,
        'name' => 'Update Supplier',
        'slug' => 'supplier.edit'
    ]);
    Permission::updateOrCreate([
        'module_id' => $adminModule->id,
        'name' => 'View Requisition',
        'slug' => 'requisition.show'
    ]);
        
    }
}
