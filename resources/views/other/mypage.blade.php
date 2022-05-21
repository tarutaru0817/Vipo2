
<?php /* if($_SESSION['abs_userid'] == $_GET['user_id']){ */ ?>

  <!DOCTYPE html>
  <html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <title>マイページ</title>
  </head>
  <body>
  @include('other/header')
    @if(session('checker') == $_GET['user_id'])
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
          <div class=" mt-5 mb-5">
            <h1 class="index_text">マイページ</h1>
            <button class="user_check" onclick="location.href='../user/user_check?user_id=<?= $_GET['user_id'] ?>'">
              アカウント情報
            </div>
            <div class="mypage_top">
              <a class="mt-2 mb-2 my_btn_a" style="color:black; cursor:pointer;">あなたが投稿したビール</a>
              <a class="mt-2 mb-2 my_btn_b" style="color:black; cursor:pointer;">お気に入り</a>
            </div>
          </div>
          <div class="col-sm-2">
          </div>
        </div>
      </div>
      <div class="my_a">
        <h1 class="mt-4" style="font-weight:bold; text-align:center;">投稿したビール</h1>
        <?php foreach($beer as $br): ?>
          <div class="index_box mt-2 mb-5 list{{ $br['id'] }}">
            <div class="index_cont">
              <div class="index_left">
                <div class="index_beer_name">{{ $br['name'] }}</div>
                <p class="mini_cont">
                  醸造所名:{{ $br['brewery'] }}
                </p>
                <p class="mini_cont">
                  ビアスタイル:{{ $br['style'] }}
                </p>
                <p class="mini_cont">
                  値段:{{ $br['price'] }}円
                </p>
                感想:
                <div class="impre">
                  {{ $br['impressions']}}
                </div>
              </div>
              <div class="index_right">
                <div class="index_img_cont">
                  @if(empty($br['image']))
                               <p>写真がありません。</p>
                  @else
                                <img src="/{{ $br['image'] }}" style="width:150px;">
                  @endif
                </div>
                <div class="index_graph">
                  <canvas id="mychart{{ $br['id'] }}" style="height:222px;width:222px;"></canvas>
                </div>
              </div>
            </div>
            <div class="mypage_link">
              <a href="../edit/edit?user_id=<?= $_GET['user_id'] ?>&beer_id=<?= $br['id'] ?>">編集</a>
              <input type="hidden" class="mb-2 beer_<?= $br['id'] ?>" value="<?= $br['id'] ?>">
              <input type="hidden" class="user_id" value="<?= $_GET['user_id'] ?>">
              <a class="mb-2 btn_del<?= $br['id'] ?>" style="cursor: pointer;">削除</a>

            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="my_b">
            <h2 class="mt-4" style="font-weight:bold; text-align:center;">お気に入り</h2>
        <?php foreach($favorite as $fav): ?>
          <div class="index_box mt-2 mb-5 fav_<?= $fav['b_id'] ?>">
            <div class="index_cont">
              <div class="index_left">
                <div class="index_beer_name">{{ $fav['b_name'] }}</div>
                <p class="mini_cont">
                  醸造所名:{{ $fav['brewery'] }}
                </p>
                <p class="mini_cont">
                  ビアスタイル:{{ $fav['style'] }}
                </p>
                <p class="mini_cont">
                  値段:{{ $fav['price'] }}円
                </p>
                感想:
                <div class="impre">
                  {{ $fav['impressions'] }}
                </div>
              </div>
              <div class="index_right">
                <div class="index_img_cont">
                  @if(empty($fav['image']))
                               <p>写真がありません。</p>
                  @else
                                <img src="/{{ $fav['image'] }}" style="width:150px;">
                  @endif
                </div>
                <div class="index_graph">
                  <canvas id="favchart{{ $fav['b_id'] }}" style="height:222px;width:222px;"></canvas>
                </div>
              </div>
            </div>
            <div class="mypage_link">
              <input type="hidden" class="beer2_<?= $fav['b_id'] ?>" value="<?= $fav['b_id'] ?>">
              <input type="hidden" class="user2_id" value="<?= $_GET['user_id'] ?>">
              <a class="nonfav_<?= $fav['b_id'] ?>" style="cursor: pointer;">お気に入り解除</a>
            </div>
          </div>
        <?php endforeach; ?>
              <input type="hidden" class="user2_id" value="<?= $_GET['user_id'] ?>">
      </div>
      @foreach($beer as $br )
<script>
var ctx = document.getElementById("mychart{{ $br['id'] }}");
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
@foreach($favorite as $fav )
<script>
var ctx = document.getElementById("favchart{{ $fav['b_id'] }}");
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
               {{ $fav['bitter'] }},
               {{ $fav['sour'] }},
               {{ $fav['sweet'] }},
               {{ $fav['aftertaste'] }},
               {{ $fav['body'] }},
               {{ $fav['foam'] }}
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
        $('.btn_del<?= $br['id'] ?>').click(function(){
          $.ajaxSetup({
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
        });
          $.ajax({
            type: "POST",
            url: "ajax_del",
            data:{ beer_id:$(".beer_<?= $br['id'] ?>").val()},
          }).done(function(){
            $('.list<?= $br['id'] ?>').remove();
          }).fail(function(XMLHttpRequest, status, e){
            alert(e);
          });
        });
        <?php endforeach; ?>
      });
    </script>
    <script>
    $(function(){
      <?php  foreach($favorite as $fav): ?>
      $('.nonfav_<?= $fav['b_id'] ?>').click(function(){
        $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
      });
        $.ajax({
          type: "POST",
          url: "ajax_nonfav",
          data: {  user_id:$(".user2_id").val(),
            beer_id:$(".beer2_<?= $fav['b_id'] ?>").val(),
          },
        }).done(function(){
          $('.fav_<?= $fav['b_id'] ?>').remove();
        }).fail(function(XMLHttpRequest, status, e){
          alert(e);
        });
      });
      <?php endforeach; ?>
    });
  </script>
  <script>
  $(function(){
    $('.my_btn_a').click(function(){
      $('.my_b').hide();
      $('.my_a').show();
    });
    $('.my_btn_b').click(function(){
      $('.my_a').hide();
      $('.my_b').show();
    });
  });
</script>
@else
<div class="pass_comp_box mt-5">
  <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
</div>
@endif
</body>
</html>
