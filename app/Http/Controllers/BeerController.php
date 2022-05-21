<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\User;
use App\Models\Models\Favorite;
use App\Models\Models\Beer;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

class BeerController extends Controller
{
  public $casts = [
    'favorites' => 'array'
  ];
    public function index(Request $request){
     //$beer_id = $_GET['beer_id'];
     $user_id = $_GET['user_id'];
     $value = $request->input('user_id');
     $beer = Beer::orderBy('bitter', 'desc')->limit(10)->get()->toArray();
      return view('index', compact('value','beer'));
    }

    public function home(Request $request){
     $users = new User;
     $value = $request->input('user_id');
     $role = $users->find($value);

     $beers = new Beer;
     $beer = $beers->join('users', 'beers.user_id','=','users.id')->select('beers.id AS b_id', 'users.name AS u_name','user_id' ,'beers.name AS b_name', 'brewery', 'style', 'price','bitter','sour','sweet','aftertaste','body', 'foam', 'impressions','image')->get();

     $favorites = new Favorite;
     $favo = $favorites->whereUser_id($value)->get();
     $favorite = $favo->toArray();
     
      return view('other/index', compact('beer','role','favorite'));
    }

  public function graph(){
    if(isset($_GET['beer_id']) && isset($_GET['user_id'])){
    $beer_id = $_GET['beer_id'];
    $user_id = $_GET['user_id'];
    $beers = new Beer;
    $beer = $beers->where('id', '=' ,"$beer_id")->where('user_id', '=',"$user_id")->first()->toArray();
     return view('other/index_graph', compact('beer'));
   }
 }
  public function AddFav(Request $request){
     $user_id = $request->input('user_id');
     $beer_id = $request->input('beer_id');
     $favorites = new Favorite;
     $favorite = $favorites->where('beer_id', '=' ,"$beer_id")->where('user_id', '=',"$user_id")->first()->toArray();
     if(empty($favorite)){
     $favorites->create([
       'beer_id' => $beer_id,
       'user_id' => $user_id,
     ]);
    }
   return view('other/index');
 }
  public function mypage(Request $request){
    $value = $request->input('user_id');
    $beers = new Beer;
    $beer = $beers->where('user_id', '=', "$value")->get()->toArray();

    $favorites = new Favorite;
    $favorite = $favorites->join('beers', 'favorites.beer_id', '=', 'beers.id')
    ->select('beers.id AS b_id','beers.name AS b_name', 'brewery', 'style', 'price','bitter','sour','sweet','aftertaste','body', 'foam', 'impressions','image')
    ->where('favorites.user_id', '=', "$value")->get()->toArray();
    return view('other/mypage', compact('beer', 'favorite'));
  }

  public function Ranking(){
    $bitter = Beer::orderBy('bitter', 'desc')->limit(10)->get()->toArray();
    $sour = Beer::orderBy('sour', 'desc')->limit(10)->get()->toArray();
    $sweet = Beer::orderBy('sweet', 'desc')->limit(10)->get()->toArray();
    $aftertaste = Beer::orderBy('aftertaste', 'desc')->limit(10)->get()->toArray();
    $body = Beer::orderBy('body', 'desc')->limit(10)->get()->toArray();
    $foam = Beer::orderBy('foam', 'desc')->limit(10)->get()->toArray();
     return view('other/ranking', compact('bitter', 'sour', 'sweet', 'aftertaste', 'body', 'foam'));
  }

  public function LoginView(){
    return view('login/login');
  }

  public function LoginPost(Request $request){
      if(isset($_POST['login'])){
      $email = $_POST['email'];
      $password = $_POST['password'];
      $hash = password_verify($password, PASSWORD_DEFAULT);
      $users = new User;
      $user = $users->where('email', '=', "$email")->first()->toArray();
      if(isset($user['password'])){
      if(password_verify($password, $user['password'])){
         $user_id = $user['id'];
         session(['checker' => "$user_id"]);
         return redirect("other/index?user_id=$user_id");
    }else{$em = "メールアドレスもしくはパスワードが誤りです。";
      return view('login/login',compact('em'));
    }
      }}
  }

  public function SigninView(){
    return view('login/signin');
  }

  public function SigninPost(Request $request){

    $request->validate([
      'email' => 'required|email',
      'name' => 'required',
      'password' => 'required'
    ],
    [
      'email.required' => 'メールアドレスは必須です。',
      'email.email' => 'アドレスの形式が正しくありません。',
      'name.required' => '名前は必須です。',
      'password.required' => 'パスワードは必須です。'
    ]);
    $name ='';
    $password ='';
    $email ='';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $users = new User;
    $user = $users->where('email', '=', "$email")->first();
    if(empty($user)){
    $users->create([
      'name' => "$name",
      'email' => "$email",
      'password' => "$hash",
      'passReset' => '0',
    ]);
    return view('login/login');
  }else{ $em[] = 'すでに登録されているメールアドレスです。';
        return view('login/signin', compact('em')); }
     }

  public function ReregistView(){
    return view('login/reregist');
  }
  public function ReregistPost(Request $request){
    $request->validate([
      'email' => 'required|email',
    ],
    [
      'email.required' => 'メールアドレスは必須です。',
      'email.email' => 'アドレスの形式が正しくありません。',
    ]);
        $passReset = md5(uniqid(rand(), true));
        $post_email = $_POST['email'];
        $users = new User;
        $user = $users->where('email', '=', "$post_email")->first()->toArray();
        if(!empty($user)){
        $update = ['passReset' => $passReset];
        User::where('email', '=', "$post_email")
            ->update($update);
        ini_set( 'display_errors', 1 );

        // 文字エンコードを指定
        mb_language('Japanese');
        mb_internal_encoding('UTF-8');

        // インスタンスを生成（true指定で例外を有効化）
        $mail = new PHPMailer(true);

        try {
            //Gmail 認証情報
            $host = 'smtp.gmail.com';
            $username = 'vipo.sendmail@gmail.com';
            $password = 'qpqyvhrxliffdxse';


            //差出人
            $from = $username;
            $fromname = $username;

            //宛先
            $to = $post_email;
            $toname = $to;

            //件名・本文
            $subject = 'パスワードリセット';
            $body =
            "こちらのリンクをクリックし、再度ページに戻ってください。http://127.0.0.1:8000/login/newpass?passReset=$passReset";

            //メール設定
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = $host;
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = "utf-8";
            $mail->Encoding = "base64";
            $mail->setFrom($from, $fromname);
            $mail->addAddress($to, $toname);
            $mail->Subject = $subject;
            $mail->Body        = $body;
            //メール送信
            $mail->send();

            return view('login/reregist');

        } catch (Exception $e) {
            echo '失敗: ', $mail->ErrorInfo;
        }}
    }
   public function NewpassView(){
     return view('login/newpass');
   }
   public function NewpassPost(){
     if(isset($_GET['passReset'])){
       $passReset = $_GET['passReset'];
       $user = User::where('passReset', '=', "$passReset")->first()->toArray();
       if(isset($user) &&isset($_POST['password'])){
         $password = $_POST['password'];
         $hash = password_hash($password, PASSWORD_DEFAULT);
         $update = [ 'password' => "$hash"];
         User::where('passReset', '=', "$passReset")->update($update);
        return  redirect('login/login');
     }
   }
   }
}
