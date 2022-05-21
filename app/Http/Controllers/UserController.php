<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\User;
use App\Models\Models\Favorite;
use App\Models\Models\Beer;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function UserlistGet(){
      $user_lists = User::get()->toArray();
      return view('user/user_list', compact('user_lists'));
    }

    public function UsercheckGet(Request $request){
      $user_id = $request->input('user_id');
      $user = User::where('id', '=', "$user_id")
                  ->first()
                  ->toArray();
      return view('user/user_check', compact('user'));
    }

    public function UnsubGet(Request $request){
      $user_id = $request->input('user_id');
      $user = User::where('id', '=', "$user_id")
                  ->first()
                  ->toArray();
      return view('user/unsubscribe', compact('user'));
    }

    public function UnsubPost(Request $request){
      $unsub_id = $request->unsub_id;
      $check = User::where('id', '=', "$unsub_id");
      if(!empty($check)){
       $check->delete();
     };
      return redirect('login/login');
    }

    public function UserEditGet(Request $request){
      $user_id = $request->input('user_id');
      $user = User::where('id', '=', "$user_id")
                  ->first();
      return view('user/user_edit', compact('user'));
    }

    public function UserConfGet(){
      return view('user/user_confirm');
    }
    public function UserConfPost(Request $request){
      $request->validate(
        [
          'name' => 'required',
          'email' => 'required|email'
        ],
        [
          'name.required' => 'ユーザーネームは必須です。',
          'email.required' => 'メールアドレスは必須です。',
          'email.email' => 'アドレスの形式が正しくありません。'
      ]);

      return view('user/user_confirm');
    }

    public function UserCompPost(Request $request){
      $user_id = $request->input('user_id');
      $name = $_POST['name'];
      $email = $_POST['email'];
      $check = User::where('id', '=', "$user_id");
      if(!empty($check)){
        $update = [
          'name' => $name,
          'email' => $email,
        ];
        $check->update($update);
      }
          return view('user/user_complete');
    }

}
