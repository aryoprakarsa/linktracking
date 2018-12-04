<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Visitor;

class ShortLink extends Controller
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
				return response()->json($newLink);
			}else{
				return response()->json('error');
			}
		}
	}
}
