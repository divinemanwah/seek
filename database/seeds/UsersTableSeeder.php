<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			'name' => 'Unilever',
			'email' => 'user@unilever.com',
			'password' => bcrypt('secret'),
			'group_id' => 1
		]);
		
		DB::table('users')->insert([
			'name' => 'Apple',
			'email' => 'user@apple.com',
			'password' => bcrypt('secret'),
			'group_id' => 2
		]);
		
		DB::table('users')->insert([
			'name' => 'Nike',
			'email' => 'user@nike.com',
			'password' => bcrypt('secret'),
			'group_id' => 3
		]);
		
		DB::table('users')->insert([
			'name' => 'Ford',
			'email' => 'user@ford.com',
			'password' => bcrypt('secret'),
			'group_id' => 4
		]);
    }
}
