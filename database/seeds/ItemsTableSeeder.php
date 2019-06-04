<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'barcode'=>'123',
                'item_name'=>'oppo',
                'custom_input'=>'a',
                'id_user'=>1
            ]
        ]);
    }
}
