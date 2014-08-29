<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		//$this->call('OrderTableSeeder');
		$this->call('UserTableSeeder');
 		$this->call('TableTableSeeder');
 		$this->call('ItemTableSeeder');
 		$this->call('CategoryTableSeeder');

	}

}
