<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tentruong extends Model
{
    //
    protected $table = 'tentruongs';

//    public function hasOneManyTentruongs()
//    {
//        return $this->hasMany(Diemchuan::class);
//    }
    public function hasOneManyTentruongs()
    {
        return $this->belongsToMany('App\Diemchuan', 'diemchuans');
    }
}
