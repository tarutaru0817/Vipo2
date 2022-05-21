<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>アカウント編集画面</title>
</head>
<body>
@include('other/header')
  @if(session('checker') == $_GET['user_id'])
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
      </div>
      <h1 class="index_text col-sm-8 mt-5 mb-5">アカウント編集</h1>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
<form action="user_confirm?user_id=<?php echo $_GET['user_id'] ?>" method="post">
  @csrf
  <div class="pass_comp_box col-sm-6 mt-5 mb-5">
    <div class="user_edit_mini">
      <h1 class="mt-3">アカウント情報</h1>
      @foreach($errors->all() as $error)
      <li style="text-align: center;">{{ $error }}</li>
      @endforeach
      <label class="mt-3" for="user_name">ユーザーネーム:<input name='name' required type='text' style='width:180px;' maxlength="30" value="{{ $user['name'] }}"></input></label>
      <label class="mt-3" for="email">メールアドレス:<input name='email' type="email" required style='width:180px;' maxlength="50" value="{{ $user['email'] }}"></input></label>
      <div class="check_button">
        <input type="button" class="btn btn-primary mt-4 mb-3 mr-1" onclick="history.back()" value="戻る">
        <input type="submit" class="btn btn-primary mt-4 mb-3 ml-1" value="編集する" name="check">
      </div>
    </div>
  </div>
</form>
@else
<div class="pass_comp_box mt-5">
  <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
</div>
@endif
</body>
</html>
