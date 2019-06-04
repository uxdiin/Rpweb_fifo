<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [   
                'email'=>"ilhamdotcom81@gmail.com",
                'name'=>"Bima",'nik'=>"081234567890",
                'address'=>"Bimasakti",
                'phone'=>"085840991252",
                'password'=>Hash::make("123456")
            ]
        ]);
    }
}
