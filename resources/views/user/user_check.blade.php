  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>アカウント確認画面</title>
  </head>
  <body>
@include('other/header')
  @if(session('checker') == $_GET['user_id'])
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
        </div>
        <h1 class="index_text col-sm-8 mt-5 mb-5">アカウント情報確認</h1>
        <div class="col-sm-2">
        </div>
      </div>
    </div>

    <div class="pass_comp_box mt-5 mb-5">
      <div class="login_mini">
        <h1 class="mt-3">アカウント情報</h1>
        <p class="mt-3">ユーザーネーム : <br> {{ $user['name'] }}</p>
        <p class="mt-3">メールアドレス : <br> {{ $user['email'] }}</p>
        <div class="check_button">
          <button type="button" class="btn btn-primary mt-4 mb-3 mr-1" onclick="location.href='user_edit?user_id=<?=  $_GET['user_id'] ?>'">編集する
            <button type="button" class="btn btn-warning mt-4 mb-3 ml-1" onclick="location.href='unsubscribe?user_id=<?=  $_GET['user_id'] ?>'">退会する
            </div>
          </div>
        </div>
        @else
        <div class="pass_comp_box mt-5">
          <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
        </div>
        @endif
      </body>
      </html>
