<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Validator;

class UsersCont extends Controller
{
    use GeneralTrait;
    public $mypath="cpanel.users";
    public function index()
    {
        $items = User::all();
        return view($this->mypath.'.all',compact('items'));
    }
    public function create()
    {
        $roles = Role::all();
        return view($this->mypath.'.add',compact('roles'));
    }
    public function store(Request $request)
    {

//        dd($request->all());
        $rules = [
            'name'   => 'required',
            'email'    => 'required|email|unique:users',
            //'phone'   => 'required',
            //'departement'   => 'required',
            //'role' => 'required',
            //'password' => 'required',
            //'activation' => 'required',
            'img'     => 'image',
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        if($request->activation == "on") { $activation = 1; } else { $activation = 0; }

        /*********************** st upload img **************************/
        if (!is_null($request->file('img')))
        {
            $path  = 'resources/assets/cpanel/images/users';
            $img =  $this->saveImage($request->img,$path);
        } else {$img = null;}
        /*********************** nd img **************************/

        $item  = new User;
        $item->name       = $request->name;
        $item->email      = $request->email;
        $item->password   = bcrypt($request->password);;
        $item->avatar     = $img;
        $item->save();

        $item->assignRole($request->role);

        session()->flash('done',trans('home.createdone'));
        return redirect()->route('users');
    }
    public function edit($id)
    {
        $item   = User::findorfail($id);
        $roles = Role::all();

//        $myrole = $item->roles->first();
        $myrole = Role::first();
        return view($this->mypath.'.edit',compact('item','roles','myrole'));
    }
    public function update(Request $request)
    {
        $item  =  User::findorfail($request->id);

//        dd($request->all());
        $rules = [
            'id'     => 'required',
            'name'   => 'required',
            'email'  =>  'required|email|unique:users,email,'.$item->id,
            'img'     => 'image',
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }


        if($request->activation == "on") { $activation = 1; } else { $activation = 0; }
        if($request->password) { $password = bcrypt($request->password); }
        else { $password = $item->password; }

        /*********************** st upload img **************************/
        if (!is_null($request->file('img')))
        {
            $path  = 'resources/assets/cpanel/images/users';
            $img =  $this->saveImage($request->img,$path);
        }  else {$img = $item->avatar;}
        /*********************** nd img **************************/


        $item->name       = $request->name;
        $item->email      = $request->email;
        $item->password   = $password;
        $item->avatar     = $img;
        $item->save();


        $item->roles()->sync($request->role);


        session()->flash('done',trans('home.createdone'));
        return redirect()->route('users');
      }
    public function deleteall(Request $request)
    {

        $id =$request->id;
        if($id == null)
        {
            session()->flash('fail',trans('home.nodel'));
            return redirect()->route('users');
        }
        else
        {
            $del= User::whereIn('id',$id)->delete();
            session()->flash('done',trans('home.deledone'));
            return redirect()->route('users');
        }

    }


}
