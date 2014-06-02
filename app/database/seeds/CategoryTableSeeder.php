<?php

Class CategoryTableSeeder extends Seeder{

	public function run()
	{

		DB::table('categories')->delete();

		Category::create(array(
				'name' => 'Cafetería'
			));
		Category::create(array(
				'name' => 'Principales'
			));
		Category::create(array(
				'name' => 'Sandwichs'
			));
		
		Category::create(array(
				'name' => 'Cervezas'
			));
		Category::create(array(
				'name' => 'Vinos'
			));
		Category::create(array(
				'name' => 'Gaseosas'
			));
		Category::create(array(
				'name' => 'Postres'
			));
	}


}