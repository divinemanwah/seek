<?php

use Illuminate\Database\Seeder;

class AdTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ad_types')->insert([
			'name' => 'Classic Ad',
			'description' => 'Offers the most basic level of advertisement',
			'price' => 269.99
		]);
		
		DB::table('ad_types')->insert([
			'name' => 'Standout Ad',
			'description' => 'Allows advertisers to use a company logo and use a longer presentation text',
			'price' => 322.99
		]);
		
		DB::table('ad_types')->insert([
			'name' => 'Premium Ad',
			'description' => 'Same benefits as Standout Ad, but also puts the advertisement at the top of the results, allowing higher visibility',
			'price' => 394.99
		]);
    }
}
