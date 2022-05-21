<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Beer;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function EditGet(Request $request){
       $beer_id = $request->input('beer_id');
       $user_id = $request->input('user_id');
       $beer = Beer::where('id', '=', "$beer_id")
                   ->where('user_id', '=', "$user_id")
                   ->first();
      return view('edit/edit', compact('beer'));
    }

    public function EditPost(){
      return view('edit/edit');
    }

    public function EditconGet(){

      return view('edit/edit_confirm');
    }

    public function EditconPost(Request $request){
      $request ->validate([
        'name' => 'required'
      ],
      [
        'name.required' => 'ビール名は必須です。'
      ]);
      if($request->image){
      $imgname = $request->image->getClientOriginalName();
      $img = $request->image->storeAs('', $imgname, 'public');
      return view('post/post_confirm',compact('img', 'imgname'));
    }else{
      $img = null;
      return view('edit/edit_confirm', compact('img'));
    }
    }
    public function EditcompGet(){
      return view('edit/edit_complete');
    }

    public function EditcompPost(Request $request){
      if($_POST['check']){
        $name = $_POST['name'];
        $brewery = $_POST['brewery'];
        $style = $_POST['style'];
        $price = $_POST['price'];
        $impressions = $_POST['impressions'];
        $bitter = $_POST['bitter'];
        $sour = $_POST['sour'];
        $sweet = $_POST['sweet'];
        $aftertaste = $_POST['aftertaste'];
        $body = $_POST['body'];
        $foam = $_POST['foam'];
        if(isset($_POST['image']) && $_POST['image'] !== '')
        {
         $image = 'storage/'.$_POST['image'];
       }else{
         $image = null;
       }
        $beer_id = $request->input('beer_id');
        $beers = new Beer;
        $check = $beers->where('id', '=', "$beer_id")->first();
        if(!empty($check)){
          $update = [
            'name' => "$name",
            'brewery' => "$brewery",
            'style' => "$style",
            'price' => "$price",
            'bitter' => "$bitter",
            'sour' => "$sour",
            'sweet' => "$sweet",
            'aftertaste' => "$aftertaste",
            'body' => "$body",
            'foam' => "$foam",
            'impressions' => "$impressions",
            'image' => "$image",
          ];
          Beer::where('id', '=', "$beer_id")
              ->update($update);
        }
      }
      return view('edit/edit_complete');
    }
}
