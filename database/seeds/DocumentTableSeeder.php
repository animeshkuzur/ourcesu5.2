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
        	['name' => 'Demand Note','type'=>2],
        	['name' => 'Disconnect Notice','type'=>7],
        	['name' => 'E-Mobile Receipt','type'=>5],
        	['name' => 'Final Assessment','type'=>8],
        	['name' => 'FOC Slip','type'=>1],
        	['name' => 'Inspection Report','type'=>8],
        	['name' => 'Meter Change','type'=>3],
        	['name' => 'Meter Protocol','type'=>3],
        	['name' => 'Money Receipt','type'=>5],
        	['name' => 'Provisional Assessment Form','type'=>8],
        	['name' => 'SAP Bill','type'=>5],
        	['name' => 'Spot Bill','type'=>5],
        	['name' => 'Acknowledgement Receipt of Service Request','type'=>1]
            );
        
        DB::table('documents')->insert(
        	$data
        );
    }
}
