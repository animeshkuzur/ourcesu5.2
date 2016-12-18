<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserTableSeeder::class);
        $this->call(GuestTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubcategoryTableSeeder::class);
        $this->call(PageTableSeeder::class);
        $this->call(ContentTableSeeder::class);
        $this->call(DocumentTypeTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
    }
}
