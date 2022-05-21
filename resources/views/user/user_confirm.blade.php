<?php  $referer = Request::server('HTTP_REFERER');
$url = 'user_edit';
if(!strstr($referer,$url)){
  header("Location: user_edit?user_id=".$_GET['user_id']);
  exit;}//ダイレクトアクセスの禁止
  ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <title>アカウント編集確認画面</title>
    </head>
    <body>
@include('other/header')
  @if(session('checker') == $_GET['user_id'])
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
          </div>
          <h1 class="index_text col-sm-8 mt-5 mb-5">アカウント編集確認</h1>
          <div class="col-sm-2">
          </div>
        </div>
      </div>
      <div class="pass_comp_box col-sm-6 mt-5 mb-5">
        <form action="user_complete?user_id=<?php echo $_GET['user_id'] ?>" method="post">
          <?php //if(!isset($params['em'])): ?>
        @csrf
            <div class="login_mini">
              <h1 class="mt-3">こちらの内容で<br>よろしいですか？</h1>
              <p class="mt-3 user_text">ユーザーネーム : {{ $_POST['name'] }}</p>
              <p class="mt-3 user_text">メールアドレス : {{ $_POST['email'] }}</p>
              <div class="check_button">
                <input type="button" class="btn btn-primary mt-4 mb-3 mr-1" onclick="history.back()" value="戻る">
                <input type="submit" class="btn btn-warning mt-4 mb-3 ml-1" value="編集する">
              </div>
            </div>
         <input type="hidden" name="name" value="{{ $_POST['name'] }}">
         <input type="hidden" name="email" value="{{ $_POST['email'] }}">
          <?php /*else:?>
            <?php // if(isset($params['em'])){foreach($params['em'] as $em): ?> <!-- <p class="mt-3" style="text-align:center;"> <?= $em;?></p> <?php endforeach; }?>
              <input type="button" value="戻る" class="btn btn-primary mb-3" onclick="history.back()" style="display: block;margin-left: auto; margin-right: auto;"> -->
            <?php endif; */?>
          </form>
        </div>
        @else
        <div class="pass_comp_box mt-5">
          <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
        </div>
        @endif
      </body>
      </html>
