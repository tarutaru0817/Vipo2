<?php  $referer = Request::server('HTTP_REFERER');
$url = 'edit';
if(!strstr($referer,$url)){
  header("Location: edit?user_id=".$_GET['user_id']."&beer_id=".$_GET['beer_id']);
  exit;}//ダイレクトアクセスの禁止
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <title>編集確認画面</title>
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
            <h1 class="index_text">編集確認</h1>
          </div>
        </div>
        <div class="col-sm-2">
        </div>
      </div>
    </div>

    <div class="index_box mt-5 mb-5 pt-3">
      こちらの内容でよろしいですか？
      <form method="post" action="edit_complete?user_id=<?= $_GET['user_id'] ?>&beer_id=<?= $_GET['beer_id'] ?>">
        @csrf
        <div class="index_cont">

          <div class="index_left">
            <p class="mini_cont">
              <div class="index_beer_name">{{ $_POST['name'] }}</div><br>
              醸造所名:{{ $_POST['brewery'] }}
            </p>
            <p class="mini_cont">
              ビアスタイル:{{ $_POST['style'] }}
            </p>
            <p class="mini_cont">
              値段:{{ $_POST['price'] }}
            </p>
            感想
            <div class="impre">
              <p>{{ $_POST['impressions'] }}</p>
            </div>
          </div>
          <div class="index_right">
            <div class="index_img_cont">
              @if($img)
              <img src="/" style="width:150px;">
              @else
              <p>写真がありません。</p>
              @endif
            </div>
            <div class="index_graph">
              <canvas id="mychart" style="height:222px;width:222px;"></canvas>
            </div>
          </div>
        </div>
        <div class="post_button">
          <input type="button" value="戻る" class="btn btn-primary" onclick="history.back()">
          <input type="submit" value="確定画面へ" class="btn btn-primary" name="check">
        </div>

        <input type="hidden" name="name" value="{{ $_POST['name']}}">
        <input type="hidden" name="brewery" value="{{ $_POST['brewery']}}">
        <input type="hidden" name="style" value="{{ $_POST['style']}}">
        <input type="hidden" name="price" value="{{ $_POST['price']}}">
        <input type="hidden" name="bitter" value="{{ $_POST['bitter']}}">
        <input type="hidden" name="sour" value="{{ $_POST['sour']}}">
        <input type="hidden" name="sweet" value="{{ $_POST['sweet']}}">
        <input type="hidden" name="aftertaste" value="{{ $_POST['aftertaste']}}">
        <input type="hidden" name="body" value="{{ $_POST['body']}}">
        <input type="hidden" name="foam" value="{{ $_POST['foam']}}">
        <input type="hidden" name="impressions" value="{{ $_POST['impressions'] }}">
        <input type="hidden" name="image" value="{{ $img }}">
      </form>
    </div>
    <script>
    var ctx = document.getElementById("mychart");
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
              {{ $_POST['bitter'] }},
              {{ $_POST['sour'] }},
              {{ $_POST['sweet'] }},
              {{ $_POST['aftertaste'] }},
              {{ $_POST['body'] }},
              {{ $_POST['foam'] }}
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
  @else
  <div class="pass_comp_box mt-5">
    <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
  </div>
  @endif
</body>
</html>
