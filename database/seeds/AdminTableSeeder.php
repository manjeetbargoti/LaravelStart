<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('admins')->delete();
        DB::table('admins')->insert([[
            'id'=>1,
            'name'=>'Manjeet Bargoti',
            'type'=>'Super Admin',
            'mobile'=>'9411447236',
            'email'=>'manjeet@admin.com',
            'password'=>Hash::make('Admin@123'),
            'image'=>'',
            'status'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ],[
            'id'=>2,
            'name'=>'Ankur Singh',
            'type'=>'admin',
            'mobile'=>'7985135128',
            'email'=>'ankur@admin.com',
            'password'=>Hash::make('Admin@123'),
            'image'=>'',
            'status'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]]);
    }
}
