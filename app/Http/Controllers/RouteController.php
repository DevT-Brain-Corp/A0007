<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	return view('x.index');
    }
    public function hasil(Request $req)
    {
        $loc['longitude'] = $req->longitude;
        $loc['latitude'] = $req->latitude;
    	return view('x.hasil',compact('loc'));
    }
}
