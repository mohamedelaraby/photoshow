<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // Create a fillable array
    protected $fillable = array('album_id', 'description', 'photo', 'title', 'size');

    /**
     * Create relationship to albums
     *
     * @return album;
     */
    public function album(){
        return $this->belongsTo('App\Album');
    }
}
