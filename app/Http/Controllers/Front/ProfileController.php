<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class ProfileController extends Controller
{


	public $view = 'web.';

    public function getProfile()
    {
    	$this->data['user'] = User::find(Auth::id());
    	return view($this->view.'profile',$this->data);
    }

    public function postProfile(Request $request)
    {
    	User::find(Auth::id())->update([
    		 'name'=>$request->name,
            'email'=>$request->email,
    	]);
    	 if($request->has('password')){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password),
            ]);
        }

        session()->flash('success',"operation accomplished successfully");
        return redirect()->back();
    }
}
