<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';
	protected $fillable = ['link_id', 'visit_ip', 'visit_geo'];
	
	public function mylink(){
		return $this->hasOne('App\Link', 'id', 'link_id');
	}
}
