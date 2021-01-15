<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\model\AlbumImages;
use App\model\Albums;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Validator;
use Response;

class AlbumsCont extends Controller
{
    use GeneralTrait;
    public $mypath="cpanel.albums";
    public function index()
    {
        $items = Albums::all();
        return view($this->mypath.'.all',compact('items'));
    }
    public function show($id)
    {
        $item = Albums::findorfail($id);
        return view($this->mypath.'.edit',compact('item'));
    }
    public function deleteall(Request $request)
    {

        $id =$request->id;
        if($id == null)
        {
            session()->flash('fail',trans('home.nodel'));
            return redirect()->route('magazines');
        }
        else
        {


            $images = AlbumImages::whereIn('album_id',$id)->get();
            if($images->count() > 0){
                foreach ($images as $key => $image) {
                    unlink(public_path($path = '/uploads/albums/').$image->img);
                }
            }
            Albums::whereIn('id',$id)->delete();
            session()->flash('done',trans('home.deledone'));
            return redirect()->route('albums');
        }

    }

    /********** start get writers ****************/
    public function getWriters($id)
    {
        $items = Posts::where('type','writer')
            ->orderBy('order_by', 'asc')
            ->where('parent_id', $id)
            ->get();

        return view('cpanel.writers.all',compact('items'));
    }

    /********** End get writers ****************/

}
