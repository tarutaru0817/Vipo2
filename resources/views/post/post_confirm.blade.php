<?php   $referer = Request::server('HTTP_REFERER');
$url = 'post';
if(!strstr($referer,$url)){
  header("Location: post?user_id=".$_GET['user_id']);
  exit;}//ダイレクトアクセスの禁止
  ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8">
      <title>投稿確認画面</title>
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
              <h1 class="index_text">投稿確認</h1>
            </div>
          </div>
          <div class="col-sm-2">
          </div>
        </div>
      </div>

      <div class="index_box mt-5 mb-5 pt-3">

        <?php
        $errors = [];
        if(empty($errors)):
          ?>
          こちらの内容でよろしいですか？
          <form method="post" action="post_complete?user_id=<?php echo $_GET['user_id'] ?>">
            @csrf
            <div class="index_cont">

              <div class="index_left">
                <div class="index_beer_name">{{ $_POST['name'] }}
                <input type="hidden" value="{{ $_POST['name'] }}" name="name">
               </div>
                <p class="mini_cont">
                  醸造所名:
                  {{ $_POST['brewery'] }}
                  <input type="hidden" value="{{ $_POST['brewery'] }}" name="brewery">
                  </p>
                <p class="mini_cont">
                  ビアスタイル:
                  {{ $_POST['style'] }}
                  <input type="hidden" value="{{ $_POST['style'] }}" name="style">
                </p>
                <p class="mini_cont">
                  値段:
                  {{ $_POST['price'] }}
                  <input type="hidden" value="{{ $_POST['price'] }}" name="price">
                </p>
                <input type="hidden" value="{{ $_POST['bitter'] }}" name="bitter">
                <input type="hidden" value="{{ $_POST['sour'] }}" name="sour">
                <input type="hidden" value="{{ $_POST['sweet'] }}" name="sweet">
                <input type="hidden" value="{{ $_POST['aftertaste'] }}" name="aftertaste">
                <input type="hidden" value="{{ $_POST['body'] }}" name="body">
                <input type="hidden" value="{{ $_POST['foam'] }}" name="foam">
                感想:
                <div class="impre">
                  <p>{{ $_POST['impressions'] }}
                  <input type="hidden" value="{{ $_POST['impressions'] }}" name="impressions">
                  </p>
                </div>
              </div>
              <div class="index_right">
                <div class="index_img_cont">
                  <?php if(!empty($img)):?>
                    <img src="{{ asset('storage/'.$imgname) }}" style="width:150px;">
                      <input type="hidden" value="{{ $img }}" name="image">
                  <?php else:?>
                    <p>写真がありません。</p>
                  <?php endif;?>

                </div>
                <div class="index_graph">
                  <canvas id="mychart" style="height:222px;width:222px;"></canvas>
                </div>
              </div>
            </div>
            <div class="post_button mt-3">
              <input type="button" value="戻る" class="btn btn-primary" onclick="history.back()">
              <input type="submit" value="確定画面へ" class="btn btn-primary" name='check'>

            </div>
          </form>
        <?php else:?>
          <?php  foreach($errors as $error): ?>
            <p style="text-align:center;"><?=  $error; ?></p>
          <?php endforeach;?>
          <input type="button" value="戻る" class="btn btn-primary" onclick="history.back()" style="display: block;margin-left: auto; margin-right: auto;">
        <?php endif;?>
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
