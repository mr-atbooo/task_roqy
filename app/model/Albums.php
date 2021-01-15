<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $table = 'albums';
    protected $fillable = [
        'name',
        'content',
        'status',
        'user_id',
    ];

    public function images()
    {
        return $this->hasMany('App\model\AlbumImages','album_id');
    }
}

