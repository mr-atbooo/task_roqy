<?php

namespace App\Http\Controllers;

use App\model\Albums;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
//        dd('all');
        $albums = Albums::all();
        $users  = User::all();
        return view('cpanel.home',compact('albums','users'));
//        return view('home');
    }
}
