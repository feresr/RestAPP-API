<?php

Class UserTableSeeder extends Seeder{

	public function run()
	{

		DB::table('users')->delete();

		User::create(array(
				'username' => 'feresr',
				'password' => Hash::make('123456'),
				'firstname' => 'Fernando', 
				'lastname' => 'Raviola'
			));

		User::create(array(
				'username' => 'lucas',
				'password' => Hash::make('123456'),
				'firstname' => 'Lucas', 
				'lastname' => 'Ferrero'
			));

		User::create(array(
				'username' => 'oscar',
				'password' => Hash::make('123456'),
				'firstname' => 'Oscar', 
				'lastname' => 'Salomon'
			));

	}

}