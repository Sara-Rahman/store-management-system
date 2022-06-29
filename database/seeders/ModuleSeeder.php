<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for employee    
        $check_employee=Module::where('name','Employee')->first();
        if(!$check_employee)
        {
            
            $check_employee = Module::firstOrCreate([
                'name' => 'Employee',
               
            ]);
            //employee - permission
            $permissions=['employee.create','employee.index','employee.destroy','employee.update','employee.edit','employee.show','employee.status','employee.store'];
            foreach ($permissions as $permission)
            {
               
                Permission::firstOrCreate([
                    'module_id'=>$check_employee->id,
                    'slug'=>$permission,
                    'name'=>ucfirst(str_replace('.',' ',($permission)))
                ]);
            }
        }
        // for store executive    
        $check_executive=Module::where('name','Store Executive')->first();
        if(!$check_executive)
        {
            
            $check_executive = Module::firstOrCreate([
                'name' => 'Store Executive',
               
            ]);
            //store executive - permission
            $permissions=['executive.create','executive.index','executive.destroy','executive.update','executive.edit','executive.show','executive.status','executive.store','received.items'];
            foreach ($permissions as $permission)
            {
               
                Permission::firstOrCreate([
                    'module_id'=>$check_executive->id,
                    'slug'=>$permission,
                    'name'=>ucfirst(str_replace('.',' ',($permission)))
                ]);
            }
        }
        // for requisition    
        $check_requisition=Module::where('name','Requisition')->first();
        if(!$check_requisition)
        {
            
            $check_requisition = Module::firstOrCreate([
                'name' => 'Requisition',
               
            ]);
            //requisition - permission
            $permissions=['requisition.create','requisition.index','requisition.destroy','requisition.update','requisition.edit','requisition.show','requisition.status','requisition.store'];
            foreach ($permissions as $permission)
            {
               
                Permission::firstOrCreate([
                    'module_id'=>$check_requisition->id,
                    'slug'=>$permission,
                    'name'=>ucfirst(str_replace('.',' ',($permission)))
                ]);
            }
        }
        // for item    
        $check_item=Module::where('name','Items')->first();
        if(!$check_item)
        {
            
            $check_item = Module::firstOrCreate([
                'name' => 'Items',
                
            ]);
            //item - permission
            $permissions=['item.edit','item.create','item.index','item.show','item.update','item.store'];
            foreach ($permissions as $permission)
            {
               
                Permission::firstOrCreate([
                    'module_id'=>$check_item->id,
                    'slug'=>$permission,
                    'name'=>ucfirst(str_replace('.',' ',($permission)))
                ]);
            }
        }
        // for stock    
        $check_stock=Module::where('name','Stock')->first();
        if(!$check_stock)
        {
            
            $check_stock = Module::firstOrCreate([
                'name' => 'Stock',
                
            ]);
            //store stock - permission
            $permissions=['stock.edit','stock.create','stock.index','stock.show','stock.update','stock.store'];
            foreach ($permissions as $permission)
            {
               
                Permission::firstOrCreate([
                    'module_id'=>$check_stock->id,
                    'slug'=>$permission,
                    'name'=>ucfirst(str_replace('.',' ',($permission)))
                ]);
            }
        }
        // for role
        $check_role=Module::where('name','Role')->first();
        if(!$check_role)
        {
            
            $check_role = Module::firstOrCreate([
                'name' => 'Role',
                
            ]);
            //store stock - permission
            $permissions=['role.edit','role.create','role.index','role.show','role.update','role.store'];
            foreach ($permissions as $permission)
            {
               
                Permission::firstOrCreate([
                    'module_id'=>$check_role->id,
                    'slug'=>$permission,
                    'name'=>ucfirst(str_replace('.',' ',($permission)))
                ]);
            }
        }
        // for supplier
        $check_supplier=Module::where('name','Supplier')->first();
        if(!$check_supplier)
        {
            
            $check_supplier = Module::firstOrCreate([
                'name' => 'Supplier',
                
            ]);
            //store supplier - permission
            $permissions=['supplier.edit','supplier.create','supplier.index','supplier.show','supplier.update','supplier.store'];
            foreach ($permissions as $permission)
            {
               
                Permission::firstOrCreate([
                    'module_id'=>$check_supplier->id,
                    'slug'=>$permission,
                    'name'=>ucfirst(str_replace('.',' ',($permission)))
                ]);
            }
        }
    }
}
