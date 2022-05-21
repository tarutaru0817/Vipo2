<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Beer;
use Illuminate\Support\Facades\DB;


session_start();

class PostController extends Controller
{
    public function PostView(){
      return view('post/post');
    }
    public function PostPost(Request $request){

    }
    public function PostconView(Request $request){

     return view('post/post_confirm');
    }
    public function PostconPost(Request $request){
      $request ->validate([
        'name' => 'required',
      ],
      [
        'name.required' => 'ビール名は必須です。',
      ]);
      if($request->image){
      $imgname = $request->image->getClientOriginalName();
      $img = $request->image->storeAs('', $imgname, 'public');
      return view('post/post_confirm',compact('img', 'imgname'));
    }else{
      return view('post/post_confirm');
    }
    }

    public function PostcompPost(Request $request){
      if($_POST['check']){
        $name = $_POST['name'];
        $brewery = $_POST['brewery'];
        $style = $_POST['style'];
        if($_POST['price']){
        $price = $_POST['price'];
        }else{
         $price = 0;
        };
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
        $user_id = $request->input('user_id');
        $beers = new Beer;
        $beers->create([
          'user_id' => "$user_id",
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
        ]);
      }
      return view('post/post_complete');
    }

}
