<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>ビール投稿サイトpivo</title>
  <link rel="icon" href="/img/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/boot.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
</head>
<body>
  @include('other/header')
  @if(session('checker') == $_GET['user_id'])
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
      </div>

      @if($role['role'] == '1')
      <a class="btn btn-danger index_user_list" href="../user/user_list?user_id=<?= $_GET['user_id'] ?>" role="button">ユーザ一覧</a>
      @endif
      <h1 class="index_text col-sm-8 mt-5 mb-5">投稿一覧</h1>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
  @foreach ($beer as $br)
  <div class="index_box mt-2 mb-5">
    <div class="index_user">
      {{ $br['u_name'] }}
    </div>
    <div class="index_cont">
      <div class="index_left">
        <div class="index_beer_name">{{ $br['b_name'] }}</div>
        <p class="mini_cont">
          醸造所名:{{ $br['brewery'] }}
        </p>
        <p class="mini_cont">
          ビアスタイル:{{ $br['style'] }}
        </p>
        <p class="mini_cont">
          値段:{{ $br['price'] }}円
        </p>
        感想
        <div class="impre">
          {{ $br['impressions'] }}
        </div>
      </div>
      <div class="index_right">
        <div class="index_img_cont">
          @if(empty($br['image']))
          <p>写真がありません。</p>
          @else
          <img src="{{ asset($br['image']) }}" style="width:150px;">
          @endif
        </div>
        <div class="index_graph">
          <canvas id="mychart{{ $br['b_id'] }}" style="height:222px;width:222px;"></canvas>
        </div>
      </div>
    </div>
    <div class="post_button">
      <input type="hidden" class="home_beer_{{ $br['b_id'] }}" value="{{ $br['b_id'] }}">

      <?php  $key = in_array($br['b_id'],array_column($favorite, 'beer_id'));
      if($key): ?>
      <button class="btn btn-warning mt-2 home_nonfav_<?= $br['b_id'] ?>" type="button" >お気に入り解除</button>
      <button class="btn btn-warning mt-2 home_fav_<?= $br['b_id'] ?>" type="button" style="display:none;">お気に入り</button>
    <?php else: ?>
      <button class="btn btn-warning mt-2 home_nonfav_<?= $br['b_id'] ?>" type="button" style="display:none;">お気に入り解除</button>
      <button class="btn btn-warning mt-2 mb-2 home_fav_<?= $br['b_id'] ?>" type="button">お気に入り</button>
    <?php endif; ?>
  </div>
</div>
@endforeach
<input type="hidden" class="home_id" value="{{ $_GET['user_id'] }}">
@foreach($beer as $br )
<script>
var ctx = document.getElementById("mychart{{ $br['b_id'] }}");
var myRadarChart = new Chart(ctx, {
  //グラフの種類
  type: 'radar',
  //データの設定
  data: {
    //データ項目のラベル
    labels: ["苦み", "酸味", "甘味", "後味", "ボディ", "泡"],
    //データセット
    datasets: [
      {
        label: "評価グラフ",
        //背景色
        backgroundColor: "rgba(200,112,126,0.5)",
        //枠線の色
        borderColor: "rgba(200,112,126,1)",
        //結合点の背景色
        pointBackgroundColor: "rgba(200,112,126,1)",
        //結合点の枠線の色
        pointBorderColor: "#fff",
        //結合点の背景色（ホバ時）
        pointHoverBackgroundColor: "#fff",
        //結合点の枠線の色（ホバー時）
        pointHoverBorderColor: "rgba(200,112,126,1)",
        //結合点より外でマウスホバーを認識する範囲（ピクセル単位）
        hitRadius: 5,
        //グラフのデータ
        data: [
          {{ $br['bitter'] }},
          {{ $br['sour'] }},
          {{ $br['sweet'] }},
          {{ $br['aftertaste'] }},
          {{ $br['body'] }},
          {{ $br['foam'] }}
        ]
      }
    ]
  },
  options: {
    // レスポンシブ指定
    responsive: true,
    scale: {
      ticks: {
        // 最小値の値を0指定
        beginAtZero:true,
        min: 0,
        // 最大値を指定
        max: 5,
      }
    }
  }
});
</script>
@endforeach

<script>
$(function(){
  <?php  foreach($beer as $br): ?>
  $('.home_nonfav_<?= $br['b_id'] ?>').click(function(){
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });
    $.ajax({
      var data = {user_id:$(".home_id").val(), beer_id:$(".home_beer_<?= $br['b_id'] ?>").val()};
      type: "post",
      url: "ajax_nonfav",
      data: data,
    }).then((res) => {
      console.log(res);
    }).fail(function(XMLHttpRequest, status, e){
      alert(e);
    });
  });
  <?php endforeach; ?>
});
</script>
<?php  foreach($beer as $br): ?>
  <script>
  $(".home_fav_<?= $br['b_id'] ?>").click(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });
    $.ajax({
      //POST通信
      type: "post",
      //ここでデータの送信先URLを指定します。
      url: "ajax_fav",
      data: {
        user_id:$(".home_id").val(),
        beer_id:$(".home_beer_<?= $br['b_id'] ?>").val(),
      },

    })
    //通信が成功したとき
    .then((res) => {
      console.log(res);
    })
    //通信が失敗したとき
    .fail((error) => {
      console.log(error.statusText);
    });
    $('.home_nonfav_<?= $br['b_id']?>').show();
    $('.home_fav_<?= $br['b_id'] ?>').hide();
  });

  $(".home_nonfav_<?= $br['b_id'] ?>").click(function () {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });
    $.ajax({
      //POST通信
      type: "post",
      //ここでデータの送信先URLを指定します。
      url: "ajax_nonfav",
      data: {
        user_id:$(".home_id").val(),
        beer_id:$(".home_beer_<?= $br['b_id'] ?>").val(),
      },

    })
    //通信が成功したとき
    .then((res) => {
      console.log(res);
    })
    //通信が失敗したとき
    .fail((error) => {
      console.log(error.statusText);
    });
    $('.home_fav_<?= $br['b_id']?>').show();
    $('.home_nonfav_<?= $br['b_id'] ?>').hide();
  });
</script>
<?php endforeach;?>
@else
<div class="pass_comp_box mt-5">
  <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
</div>
@endif
</body>
</html>
