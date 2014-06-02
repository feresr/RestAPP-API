<?php

Class TableTableSeeder extends Seeder{

	public function run()
	{

		DB::table('tables')->delete();

		Table::create(array(
				'number' => 1,
				'seats' => 2,
				'description' => 'Vereda',
				'taken' => false
			));

		Table::create(array(
				'number' => 2,
				'seats' => 4,
				'description' => 'Mesa grande',
				'taken' => false
			));
		Table::create(array(
				'number' => 3,
				'seats' => 4,
				'taken' => false
			));
		Table::create(array(
				'number' => 4,
				'seats' => 2,
				'taken' => false
			));
		Table::create(array(
				'number' => 5,
				'seats' => 2,
				'taken' => false
			));
		Table::create(array(
				'number' => 6,
				'seats' => 2,
				'taken' => false
			));
		Table::create(array(
				'number' => 7,
				'seats' => 2,
				'taken' => false
			));


	}

}