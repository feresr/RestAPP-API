<?php
class Coord extends Eloquent {

    public function table()
    {
        return $this->belongsTo('Table');
    }

}