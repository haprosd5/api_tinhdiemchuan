<?php

namespace App\Http\Controllers;

use App\Tentruong;
use Illuminate\Http\Request;

class TentruongController extends Controller
{
    //
    public function index()
    {
        # code...
        return Tentruong::paginate(20);
    }

    public function getTruongWithName($name)
    {
        # code...
        $temp = '%' . $name . '%';
        return Tentruong::where('tr_name', 'LIKE', $temp)->paginate(10);
    }


}
