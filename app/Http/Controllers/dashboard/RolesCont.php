<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Validator;
use Response;

class RolesCont extends Controller
{
    public $mypath="cpanel.roles";
    public function index()
    {
        $items = Role::all();
        return view($this->mypath.'.all',compact('items'));
    }
    public function create()
    {
        $permissions = Permission::where('parent_id',null)->get();
        return view($this->mypath.'.add',compact('permissions'));
    }
    public function store(Request $request)
    {

//        dd($request->all());

        $rules = [
            'title'      => 'required|unique:roles,name',
//            'permission' => 'required|array|min:1',
            //'views'   => 'required',


        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        if($request->order == "")  { $order = 0; } else { $order = $request->order; }
        if($request->Publish == "on") { $publish = 1; } else { $publish = 0; }


        $permissions = $request->permission;

        $item  = new Role;
        $item->name       = $request->title;
        $item->order_by    = $order;
        $item->guard_name     = 'web';
        $item->publish     = $publish;
        $item->save();
//dd('done');
//        $item->givePermissionTo($permission);
//        $item->syncPermissions($permissions);
        if ($permissions){

            $item->givePermissionTo($permissions);
        }
        session()->flash('done',trans('home.createdone'));
        return redirect()->route('roles');
    }
    public function edit($id)
    {
        $item = Role::findById($id);
        if (!$item){abort(404);}
        $mypermissions = $item->permissions()->pluck('id')->toArray();
        $permissions = Permission::where('parent_id',null)->get();

        return view($this->mypath.'.edit',compact('item','permissions','mypermissions'));
    }
    public function update(Request $request)
    {

//        dd($request->all());
        $item  =  Role::findById($request->id);
        if (!$item){abort(404);}

        $rules = [
            'id'         => 'required',
            'title'      => 'required|unique:roles,name,'.$item->id,
            'permission' => 'required|array|min:1',
            //'views'   => 'required',


        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }

        if($request->order == "")  { $order = 0; } else { $order = $request->order; }
        if($request->Publish == "on") { $publish = 1; } else { $publish = 0; }


        $permissions = $request->permission;


        $item->name       = $request->title;
        $item->order_by    = $order;
        $item->guard_name     = 'web';
        $item->publish     = $publish;
        $item->save();

        $item->permissions()->sync($permissions);

        session()->flash('done',trans('home.createdone'));
        return redirect()->route('roles');
    }
    public function deleteall(Request $request)
    {

        $id =$request->id;
        if($id == null)
        {
            session()->flash('fail',trans('home.nodel'));
            return redirect()->route('roles');
        }
        else
        {
            $del= Role::whereIn('id',$id)->delete();
            session()->flash('done',trans('home.deledone'));
            return redirect()->route('roles');
        }

    }

}
