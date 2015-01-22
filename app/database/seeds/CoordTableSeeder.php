<?php

Class CoordTableSeeder extends Seeder{

	public function run()
	{

		DB::table('coords')->delete();

		Coord::create(array(
				'table_id' => 1,
				'x_pos' => 285,
				'y_pos' => 451
			));
		Coord::create(array(
				'table_id' => 3,
				'x_pos' => 0,
				'y_pos' => 0
			));
		Coord::create(array(
				'table_id' => 9,
				'x_pos' => 680,
				'y_pos' => 123
			));
		
		Coord::create(array(
				'table_id' => 8,
				'x_pos' => 397,
				'y_pos' => 128
			));
		Coord::create(array(
				'table_id' => 17,
				'x_pos' => 681,
				'y_pos' => 259
			));
		Coord::create(array(
				'table_id' => 18,
				'x_pos' => 190,
				'y_pos' => 132
			));
		Coord::create(array(
				'table_id' => 19,
				'x_pos' => 0,
				'y_pos' => 135
			));
		Coord::create(array(
				'table_id' => 20,
				'x_pos' => 394,
				'y_pos' => 254
			));
		Coord::create(array(
				'table_id' => 21,
				'x_pos' => 692,
				'y_pos' => 460
			));
		Coord::create(array(
				'table_id' => 22,
				'x_pos' => 0,
				'y_pos' => 266
			));
		Coord::create(array(
				'table_id' => 23,
				'x_pos' => 495,
				'y_pos' => 452
			));
	}


}