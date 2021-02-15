<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diemchuan extends Model
{
    //
    protected $table = 'diemchuans';

    public function wishlists()
    {
        return $this->belongsToMany('App\Tentruongs', 'tentruongs');
    }
}
