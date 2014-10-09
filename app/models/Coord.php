<?php
class Coord extends Eloquent {

public function table(){
		return $this->hasOne('Table', 'table_id');
	}

}