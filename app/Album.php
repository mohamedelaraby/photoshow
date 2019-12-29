<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // [ ]  Setup a fillable
    protected $fillable = array('name', 'description','cover_image');

    // [ photos] :- Create a relationship between albums and photos

    /**
     * Create relationship to photos
     *
     * @return photos;
     */
    public function photos(){
      return   $this->hasMany('App\Photo');
    }
}
