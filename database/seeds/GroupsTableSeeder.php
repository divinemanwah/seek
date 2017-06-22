<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
			'name' => 'Unilever'
		]);
		
		DB::table('groups')->insert([
			'name' => 'Apple'
		]);
		
		DB::table('groups')->insert([
			'name' => 'Nike'
		]);
		
		DB::table('groups')->insert([
			'name' => 'Ford'
		]);
    }
}
