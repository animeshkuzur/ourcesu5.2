<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'=>'Animesh',
        	'email'=>'animesh.kuzur@outlook.com',
        	'password'=>bcrypt('animesh@1234'),
        	'cont_acc'=>'20426224',
        ]);
    }
}
