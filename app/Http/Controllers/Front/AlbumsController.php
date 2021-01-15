<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Albums,App\model\AlbumImages;
use App\Http\Requests\Front\AlbumRequest;
use App\Traits\GeneralTrait;
use Session;
use Auth;
class AlbumsController extends Controller
{
    use GeneralTrait;
	public $view = 'web.albums.';

    public function index()
    {
    	$data['albums'] = Albums::where('user_id',Auth::id())->get();
    	return view($this->view.'index',$data);
    }
    public function create()
    {
    	return view($this->view.'create');
    }
    public function store(AlbumRequest $request)
    {
    	$album = Albums::create([
    		'name'   =>$request->name,
    		'content'=>$request->input('content'),
    		'status' =>$request->status,
    		'user_id'=>Auth::id(),
    	]);

        /*********************** st upload img **************************/
        foreach ($request->images as $image)
        {

            $path  = 'uploads/albums';
            $img =  $this->saveImage($image,$path);
            $images = AlbumImages::create([
                'img'=>$img,
                'album_id'=>$album->id
            ]);
        }
        /*********************** nd img **************************/

        Session::flash('success',"operation accomplished successfully");
    	return redirect()->back();
    }

    public function edit($id)
    {
        $this->data['album'] =
            Albums::where('id',$id)
            ->where('user_id',Auth::id())
                ->first();
        if ($this->data['album'] == null) {
            return abort(403);
        }
        return view($this->view.'edit',$this->data);
    }

    public function update($id,AlbumRequest $request)
    {
        $album = Albums::where('id',$id)->where('user_id',Auth::id())->update([
            'name'=>$request->name,
            'content'=>$request->input('content'),
            'status'=>$request->status,
            'user_id'=>Auth::id(),
        ]);

        /*********************** st upload img **************************/
        if ($request->images){
            foreach ($request->images as $image)
            {

                $path  = 'uploads/albums';
                $img =  $this->saveImage($image,$path);
                $images = AlbumImages::create([
                    'img'=>$img,
                    'album_id'=>$id
                ]);
            }
        }
        /*********************** nd img **************************/
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }


    public function destroy($id)
    {

    	$images = AlbumImages::where('album_id',$id)->get();
    	if($images->count() > 0){
	    	foreach ($images as $key => $image) {
	    	unlink(public_path($path = '/uploads/albums/').$image->img);
	    	}
    	}
    	Albums::find($id)->delete();
    	 Session::flash('success',trans('home.message_success'));
    	return redirect()->back();
    }
    public function deleteImg(Request $request){
        $image = AlbumImages::find($request->id);
//        dd($image->img);
        unlink(public_path($path = '/uploads/albums/').$image->img);
        $image->delete();
        return response()->json(['data'=>"done"]);
    }
}
