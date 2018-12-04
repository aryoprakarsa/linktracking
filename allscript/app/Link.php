<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
	protected $fillable = ['user_id', 'hashed', 'url'];
	
	public function myvisitors(){
		return $this->hasOne('App\Visitor', 'link_id', 'id');
	}
	
	public function user(){
		return $this->hasOne('App\User', 'id', 'user_id');
	}
}
