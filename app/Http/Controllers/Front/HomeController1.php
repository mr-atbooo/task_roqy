<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Albums;
use Auth;

class HomeController extends Controller
{
    public $view = 'front.';
    public $data;

    public function index()
    {

	   $this->data['albums']= Albums::orderBy('created_at','DESC')->where('status','public')->get();
	   
	   
       return view($this->view.'index',$this->data);
    }
	

}
