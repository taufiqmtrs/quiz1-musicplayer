<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class albums extends Model
{
	protected $fillable =['nama_album','artis_id'];
    public function artis(){
    	return $this->belongsTo('App\artis');
    }
}
