<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>新規登録</title>
</head>
<body>
  @include('other/header')
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
      </div>
      <h1 class="index_text col-sm-8 mt-5 mb-5">新規登録</h1>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
  
  <div class="pass_comp_box mt-5 mb-5">
    <div class="login_mini">
      <form action="" method="post">
        @CSRF
        <?php if(isset($em)):?>
          <?php foreach($em as $e): ?><p class="mt-3"> <?= $e;?></p> <?php endforeach;?>
        <?php endif;?>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        <div class="mt-3 mb-2">
          <label for="name">ユーザーネーム<br>
            <input required type="text" name="name" maxlength="30" placeholder="vipo太郎" ></label>
          </div>
          <div class="mt-4 mb-2">
            <label for="email">メールアドレス<br>
              <input required type="email" name="email" max="50" ></label>
            </div>
            <div>
              <label for="password" class="mt-4 mb-2">パスワード<br>
                <input required type="password" name="password" maxlength="30" ></label>
              </div>
              <div>
                <input type="submit" value="新規登録" class="btn btn-primary mt-4 mb-3 login_button" name="signin">
              </div>
            </form>
          </div>
        </div>
      </body>
      </html>
