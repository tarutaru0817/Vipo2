  <?php  $referer = Request::server('HTTP_REFERER');
  $url = 'edit_confirm';
  if(!strstr($referer,$url)){
  header("Location: edit?user_id=".$_GET['user_id']."&beer_id=".$_GET['beer_id']);
  exit;}//ダイレクトアクセスの禁止
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="UTF-8">
  <title>編集完了画面</title>
  </head>
  <body>
  @include('other/header')
  @if(session('checker') == $_GET['user_id'])
  <div class="container">
      <div class="row">
      <div class="col-sm-2">
      </div>
      <h1 class="index_text col-sm-8 mt-5 mb-5">編集完了</h1>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
  <div class="pass_comp_box mt-5 mb-5">
    <h1 class="mt-5">編集が完了しました！</h1>
    <buttun type="button"  class="btn btn-primary post_to_mypage mt-5 mb-3" onclick="location.href='../other/index?user_id=<?php echo $_GET['user_id'] ?>'">ホームへ戻る
    </div>
    @else
    <div class="pass_comp_box mt-5">
      <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
    </div>
    @endif
  </body>
  </html>
