<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = array([
        		'name' => 'Domestic Consumers'
        	],
        	[
        		'name' => 'Business Consumers'
        	],
        	[
        		'name' => 'Main Menu'
        	],
        	[
        		'name' => 'Top Menu'
        	],
        	[
        		'name' => 'Bottom Menu'
        	]);
        DB::table('categories')->insert(
        	$data
        );
    }
}
