<?php

use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	['name' => 'Domestic Consumers','type' => '']
            );
        DB::table('categories')->insert(
        	$data
        );
    }
}
