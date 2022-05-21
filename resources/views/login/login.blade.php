<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ログイン画面</title>
</head>
<body>
  @include('/other/header')
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
      </div>
      <h1 class="index_text col-sm-8 mt-5 mb-5">ログイン</h1>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
  <div class="pass_comp_box mt-5 mb-5">
    <p class="mt-3" style="text-align:center;">  <?php if(isset($em)){ echo $em;}?> </p>
    <div class="login_mini">
      <form action="" method="post">
        @CSRF
        <div class="mt-4 mb-2">
          <label for="email">メールアドレス<br>
            <input type="email" name="email" maxlength="50" required></label>
          </div>
          <div>
            <label for="password" class="mt-4 mb-2">パスワード<br>
              <input type="password" name="password" maxlength="30" required></label>
            </div>
            <div>
              <input type="submit" value="ログイン" class="btn btn-primary mt-4 mb-3 login_button" name="login">
            </div>
          </form>
        </div>
        <div class="login_link mb-3">
          <a href="signin<?php if(isset($_GET['user_id'])): ?>?user_id=<?php echo $_GET['user_id']; endif;?>">新規登録</a>
          <a href="reregist<?php if(isset($_GET['user_id'])): ?>?user_id=<?php echo $_GET['user_id']; endif;?>">パスワードを忘れた方</a>
        </div>
      </div>
    </body>
    </html>
