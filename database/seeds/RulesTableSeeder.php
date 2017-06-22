<?php

use Illuminate\Database\Seeder;

class RulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rules')->insert([
			'group_id' => 1,
			'type_id' => 1,
			'description' => 'Gets a for 3 for 2 deal on Classic Ads',
			'meta' => json_encode([
					'deal' => [
							[3, 2]
						]
				])
		]);
		
		DB::table('rules')->insert([
			'group_id' => 2,
			'type_id' => 2,
			'description' => 'Gets a discount on Standout Ads where the price drops to $299.99 per ad',
			'meta' => json_encode([
					'discount' => [
							[1, 299.99]
						]
				])
		]);
		
		DB::table('rules')->insert([
			'group_id' => 3,
			'type_id' => 3,
			'description' => 'Gets a discount on Premium Ads where 4 or more are purchased. The price drops to $379.99 per ad',
			'meta' => json_encode([
					'discount' => [
							[4, 379.99]
						]
				])
		]);
		
		DB::table('rules')->insert([
			'group_id' => 4,
			'type_id' => 1,
			'description' => 'Gets a 5 for 4 deal on Classic Ads',
			'meta' => json_encode([
					'deal' => [
							[5, 4]
						]
				])
		]);
		
		DB::table('rules')->insert([
			'group_id' => 4,
			'type_id' => 2,
			'description' => 'Gets a discount on Standout Ads where the price drops to $309.99 per ad',
			'meta' => json_encode([
					'discount' => [
							[1, 309.99]
						]
				])
		]);
		
		DB::table('rules')->insert([
			'group_id' => 4,
			'type_id' => 3,
			'description' => 'Gets a discount on Premium Ads when 3 or more are purchased.  The price drops to $389.99 per ad',
			'meta' => json_encode([
					'discount' => [
							[3, 389.99]
						]
				])
		]);
    }
}
