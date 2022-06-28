<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data=[
        ['id'=>1,'role_id'=>1,'name'=>'admin','email'=>'admin@gmail.com','password'=>bcrypt('admin123')],
        ['id'=>2,'role_id'=>2,'name'=>'employee','email'=>'employee@gmail.com','password'=>bcrypt('12345')],
        ['id'=>3,'role_id'=>3,'name'=>'store executive','email'=>'executive@gmail.com','password'=>bcrypt('12345')],

       ];
        DB::table('users')->insert($data);
    }
}
