<?php

Class OrderTableSeeder extends Seeder{

	public function run()
	{

		DB::table('orders')->delete();

		Order::create(array(
				'table_id' => 1,
				'user_id' => 2
			));

		Order::create(array(
				'table_id' => 1,
				'user_id' => 3
			));

		Order::create(array(
				'table_id' => 1,
				'user_id' => 1
			));

		Order::create(array(
				'table_id' => 2,
				'user_id' => 3
			));

	}

}