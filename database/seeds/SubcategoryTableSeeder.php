<?php

use Illuminate\Database\Seeder;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$data = array(
    			[
        		'name' => 'Products and Services',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Manage your Connection',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Care Your Meter',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Track Your Reading',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Know your Bill',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Making Payments',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Be Compliant',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Be Safe',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Save Energy',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Consumer Service',
        		'category_id' => 1
        	],
        	[
        		'name' => 'My Account',
        		'category_id' => 1
        	],
        	[
        		'name' => 'Products and Services',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Manage your Connection',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Care Your Meter',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Track Your Reading',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Know your Bill',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Making Payments',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Be Compliant',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Be Safe',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Save Energy',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Consumer Service',
        		'category_id' => 2
        	],
        	[
        		'name' => 'My Account',
        		'category_id' => 2
        	],
        	[
        		'name' => 'Network',
        		'category_id' => 3
        	],
        	[
        		'name' => 'EHS',
        		'category_id' => 3
        	],
        	[
        		'name' => 'Community',
        		'category_id' => 3
        	],
        	[
        		'name' => 'Associates',
        		'category_id' => 3
        	],
        	[
        		'name' => 'Careers',
        		'category_id' => 3
        	],
        	[
        		'name' => 'About Us',
        		'category_id' => 4
        	],
        	[
        		'name' => 'Media Room',
        		'category_id' => 4
        	],
        	[
        		'name' => 'Knowledge Centre',
        		'category_id' => 4
        	],
        	[
        		'name' => 'Ethics',
        		'category_id' => 4
        	],
        	[
        		'name' => 'Contact Us',
        		'category_id' => 4
        	],
        	[
        		'name' => 'Disclaimer',
        		'category_id' => 5
        	],
        	[
        		'name' => 'Privacy Statement',
        		'category_id' => 5
        	],
        	[
        		'name' => 'Cookies Policy',
        		'category_id' => 5
        	],
        	[
        		'name' => 'Site Map',
        		'category_id' => 5
        	],
        	[
        		'name' => 'Getting best of the website',
        		'category_id' => 5
        	]
    		);
        DB::table('subcategories')->insert(
        	$data
        );
    }
}
