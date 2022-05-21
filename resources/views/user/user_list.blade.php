  <?php //if(isset($params['role']['role']) && $params['role']['role'] == '1'){ ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>ユーザ一覧画面</title>
    </head>
    <body>
@include('other/header')
  @if(session('checker') == $_GET['user_id'])
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
          </div>
          <h1 class="index_text col-sm-8 mt-5 mb-5">ユーザ一覧</h1>
          <div class="col-sm-">
          </div>
        </div>
      </div>
      <?php foreach ($user_lists as $user_list):?>
        <div class="list_box col-sm-6 mt-5 mb-5 ajax_list<?= $user_list['id'] ?>">
          <div class="list_mini">
            <p class="mt-3">ユーザーネーム : {{ $user_list['name'] }}</p>
            <p class="mt-3">メールアドレス : {{ $user_list['email'] }}</p>
            <div class="check_btn">
              <input type="hidden" class="user_id<?= $user_list['id']; ?>" value="<?= $user_list['id']; ?>">
              <button type="button" class="btn btn-warning mt-1 mb-3 ml-1 dlt_btn<?= $user_list['id']; ?>">削除する
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    <script>
        $(function(){
          <?php  foreach($user_lists as $user_list): ?>
          $('.dlt_btn<?= $user_list['id'] ?>').click(function(){
            $.ajaxSetup({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
          });
            $.ajax({
              type: "POST",
              url: "ajax_deluser",
              data: {unsub_id : $(".user_id<?= $user_list['id']; ?>").val()},
            }).done(function(){
              $(".ajax_list<?= $user_list['id'] ?>").remove();
            }).fail(function(XMLHttpRequest, status, e){
              alert(e);
            });
          });
          <?php endforeach;  ?>
        });
      </script>
      @else
      <div class="pass_comp_box mt-5">
        <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
      </div>
      @endif
    </body>
    </html>
  <?php //}else{
    //'管理者ユーザではありません。';
  //}; ?>
