<?php

namespace App\Http\Controllers\Front;

use App\model\Albums;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $albums= Albums::orderBy('created_at','DESC')
            ->where('status','public')->get();

        return view('web.index',compact('albums'));

    }
}
