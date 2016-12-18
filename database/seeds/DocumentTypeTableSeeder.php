<?php

use Illuminate\Database\Seeder;

class DocumentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	['name' => 'Consumer Care'],
        	['name' => 'Connection'],
        	['name' => 'Meter'],
        	['name' => 'Reading'],
        	['name' => 'Billing'],
        	['name' => 'Collection'],
        	['name' => 'Recovery'],
        	['name' => 'Enforcement'],
        	['name' => 'Grievances']
            );
        
        DB::table('document_types')->insert(
        	$data
        );
    }
}
