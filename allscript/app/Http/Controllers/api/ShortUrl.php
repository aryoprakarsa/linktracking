<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Link;
use App\Visitor;

class ShortUrl extends Controller
{
    public function convert(Request $req){
		$user = null;
		if(\Auth::check()){
			$user = \Auth::user()->id;
		}
		
		$inputLink = $req->get('link');
		$link = Link::where('url', $inputLink)->first();
		if($link){
			return response()->json($link);
		}else{
			do {
				$newHash = str_random(6);
			} while(Link::where('hashed','=',$newHash)->count() > 0);
			
			$newLink = new Link();
			$newLink->user_id = $user;
			$newLink->hashed = $newHash;
			$newLink->url = $inputLink;
			if($newLink->save()){
				return response()->json(['shorten' => url($newHash)], 200);
			}else{
				return response()->json('error');
			}
		}
	}
}
