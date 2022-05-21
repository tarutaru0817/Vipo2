  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>退会確認画面</title>
  </head>
  <body>
@include('other/header')
  @if(session('checker') == $_GET['user_id'])
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
        </div>
        <h1 class="index_text col-sm-8 mt-5 mb-5">退会確認</h1>
        <div class="col-sm-2">
        </div>
      </div>
    </div>
    <div class="pass_comp_box col-sm-6 mt-5 mb-5">
      <div class="login_mini">
        <form action="" method="post">
          @csrf
          <h1 class="mt-4">本当に退会しますか？</h1>
          <p class="mt-4">ユーザーネーム :<br> {{ $user['name'] }}</p>
          <p class="mt-4">メールアドレス :<br> {{ $user['email'] }}</p>
          <div class="check_button">
            <input type="hidden" name="unsub_id" value="<?=  $_GET['user_id'] ?>">
            <button type="button" class="btn btn-primary mt-3 mb-2" onclick="history.back()">戻る</button>
            <input type="submit" class="btn btn-danger mt-3 mb-2" value="退会する">
          </div>
        </form>
      </div>
    </div>
    @else
    <div class="pass_comp_box mt-5">
      <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
    </div>
    @endif
  </body>
  </html>
