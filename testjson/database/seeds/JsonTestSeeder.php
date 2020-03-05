<?php

use Illuminate\Database\Seeder;

class JsonTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('json_tests')->insert(array(
            array(
                'name' => 'Printer',
                'price' => '5000',
            ),
            array(
                'name' => 'Pendrive',
                'price' => '300',
            ),
        ));
    }
}
