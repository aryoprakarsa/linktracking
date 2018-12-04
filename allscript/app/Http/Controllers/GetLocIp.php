<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Visitor;
use App\Country;
use Location;

class GetLocIp extends Controller
{
    public function storeData(Request $req, $hash){
		$link = Link::where('hashed', $hash)->first();
		$clientIP = $_SERVER["HTTP_X_FORWARDED_FOR"];
		$location = Location::get($clientIP);
		$country = Country::where('countryCode', $location->countryCode)->first();
		
		$visitor = new Visitor;
		$visitor->link_id = $link->id;
		$visitor->visit_ip = $clientIP;
		$visitor->visit_geo = $country->id;
		$visitor->save();
		
		$myUrl = $link->url;
		
		return view('landing', compact('myUrl'));
	}
}
