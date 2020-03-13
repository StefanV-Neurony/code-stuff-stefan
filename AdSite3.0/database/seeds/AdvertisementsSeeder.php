<?php

use Illuminate\Database\Seeder;

class AdvertisementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertisements')->insert([
            'user_id'=>'1',
            'title'=>Str::random(10),
            'body'=>Str::random(10),
            'valid'=>'1',

        ]);
    }
}
