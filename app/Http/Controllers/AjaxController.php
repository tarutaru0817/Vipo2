<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\User;
use App\Models\Models\Favorite;
use App\Models\Models\Beer;

class AjaxController extends Controller
{
    public function AjaxFav(Request $request){
      $user_id = $request->user_id;
      $beer_id = $request->beer_id;
      $favorite = new Favorite;
      $favorite->create(['beer_id' => "$beer_id",
                        'user_id' => "$user_id"]);
    }

    public function AjaxNonFav(Request $request){
      $user_id = $request->user_id;
      $beer_id = $request->beer_id;
      $favorite = new Favorite;
      $favorite->where('beer_id', '=', "$beer_id")
               ->where('user_id', '=', "$user_id")
               ->delete();
    }
    public function AjaxDel(Request $request){
      $beer_id = $request->beer_id;
      Beer::where('id', '=', "$beer_id")
          ->delete();
      Favorite::where('beer_id', '=', "$beer_id")
              ->delete();
    }
    public function AjaxDelUser(Request $request){
      $id = $request->unsub_id;
      User::where('id', '=', "$id")
          ->delete();
    }
}
