<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tracks extends Model
{
	protected $fillable =['nama_tracks','albums_id','tracks_time','tracks_file'];
    public function albums(){
    	return $this->belongsTo('App\albums');
    }
}
