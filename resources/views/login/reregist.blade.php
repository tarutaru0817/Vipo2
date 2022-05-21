<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>メールアドレス入力画面</title>
</head>
<body>
  @include('other/header')
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
      </div>
      <h1 class="index_text col-sm-8 mt-5 mb-5">メールアドレス入力</h1>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
  <div class="pass_comp_box mt-5 mb-5">
    <p class="mt-3" style="text-align:center;">メールアドレスを入力してください.</p>
    <?php if(isset($params['reregist'])){foreach($params['reregist'] as $em): ?><p class="mt-3" style="text-align:center;"> <?= $em;?></p> <?php endforeach; }?>
      <div class="login_mini">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        <form action="" method="post">
          @CSRF
          <div class="mt-4 mb-2">
            <label for="email">メールアドレス</label><br>
            <input  name="email" maxlength="50">
          </div>
          <div>
            <input type="submit" name="check" value="送信" class="btn btn-primary mt-4 mb-3 login_button">
          </div>
        </form>
      </div>
    </div>
  </body>
  </html>
