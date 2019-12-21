<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function create(Request $req)
    {

    	$userid = Auth::user()->id;
    	$z = new \App\Komen;
    	$z->id = mt_rand(1000,9999);
    	$z->user_id = $userid;
    	$z->artikel_id = $req->artikel_id;
    	$z->commenttext = $req->commenttext;
    	$z->save();

    	return redirect()->back();
    }
    public function update(Request $req)
    {
        \App\Komen::where('id','=',$req->thisComment_id)
            ->update([
                'commenttext' => $req->edited,
                'created_at' => $req->time_comment,
                'updated_at' => $req->time_comment,
            ]);
        return redirect()->back();    
    }
    public function destroy(Request $req )
    {
        \App\Komen::where('id','=',$req->thisComment_id)
            ->delete();
        return redirect()->back();       
    }
}
