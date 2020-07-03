<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class palyeds extends Model
{
    protected $fillable =['tracks_id'];
    public function tracks(){
    	return $this->belongsTo('App\tracks');
}
}
