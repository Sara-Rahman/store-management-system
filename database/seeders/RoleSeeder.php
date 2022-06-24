<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin','Employee','Store Executive'];
        foreach($roles as $data)
        {
            Role::insert([
                'name'=>$data,
                'slug' => strtolower("$data")
            ]);
        }
    }
}
