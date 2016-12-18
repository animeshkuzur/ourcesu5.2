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
        /*DB::table('guests')->insert([
        	'email'=>'20426224',
        	'password'=>bcrypt('password'),  	
        ]);*/
        DB::table('guests')->select('insert into guests (email,cont_acc) select distinct CONTRACT_ACC as email, CONTRACT_ACC as cont_acc from STL.dbo.BILLING_OUTPUT_2016;');

    }
}
