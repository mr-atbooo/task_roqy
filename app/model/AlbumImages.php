<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class AlbumImages extends Model
{
    protected $table = "album_imgs";
    protected $fillable = [
    	'img',
		'album_id',
    ];
}
