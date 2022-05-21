<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>パスワード再設定画面</title>
</head>
<body>
  @include('other/header')
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
      </div>
      <h1 class="index_text col-sm-8 mt-5 mb-5">パスワード再設定</h1>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
  <div class="pass_comp_box mt-5 mb-5">
    <p class="mt-3">新しいパスワードを入力してください.</p>
    <div class="login_mini">

      <form action="" method="post">
        @CSRF
        <div class="mt-4 mb-2">
          <label for="password">新しいパスワード(30字以内)</label><br>
          <input type="password" name="password" maxlength="30">
        </div>
        <div>
          <input type="submit" value="送信" class="btn btn-primary mt-4 mb-3 login_button">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
