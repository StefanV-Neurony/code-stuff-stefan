<?php

use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'advertisements_id'=>'1',
            'name' => Str::random(10),
            'details' => Str::random(10),
            'item_image' => Str::random(5),
            'price'=>'5',
    ]);
    }
}
