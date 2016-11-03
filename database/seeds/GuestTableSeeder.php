<?php

use Illuminate\Database\Seeder;

class GuestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guests')->insert([
        	'email'=>'20426224',
        	'password'=>bcrypt('password'),  	
        ]);
    }
}
