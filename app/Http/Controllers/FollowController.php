<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function check_following($id){
        $check = Follow::where('following', Auth::id() )->where('followed', $id);

        if($check->count() == 0):
            return response()->json(['status' => false]);
        elseif($check->count() != 0):
            return response()->json(['status' => true]); 
        endif;
            

    }

    public function following(Request $request){
        $check = Follow::where('following', Auth::id())->where('followed', $request->user_id);
        
        if($check->count() == 0):
            $follow = new Follow;
            $follow->following = Auth::id();
            $follow->followed = $request->user_id;
            $follow->save();
        endif;

    }

    public function unfollowing(Request $request){

        $unfollowing = Follow::where('following', Auth::id())->where('followed', $request->user_id)->delete();

    }
}