<?php
class Book extends Eloquent
{
    public $timestamps = false;
    public function author()
    {
        return $this->belongsTo('Author');
    }
}