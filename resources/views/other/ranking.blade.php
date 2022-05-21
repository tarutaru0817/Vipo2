<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>ランキング</title>
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
          <h1 class="index_text">ランキング</h1>
        </div>
        <div class="mypage_top">
          <a class="mt-2 mb-2 push_a" style="color:black; cursor:pointer;">苦み</a>
          <a class="mt-2 mb-2 push_b" style="color:black; cursor:pointer;">酸味</a>
          <a class="mt-2 mb-2 push_c" style="color:black; cursor:pointer;">甘味</a>
          <a class="mt-2 mb-2 push_d" style="color:black; cursor:pointer;">後味</a>
          <a class="mt-2 mb-2 push_e" style="color:black; cursor:pointer;">ボディ</a>
          <a class="mt-2 mb-2 push_f" style="color:black; cursor:pointer;">泡</a>
        </div>
      </div>
      <div class="col-sm-2">
      </div>
    </div>
  </div>

  <div class="rank_a">
    <br>
    <h2 style="text-align:center;">苦みランキング</h2>
    <?php foreach($bitter as $key=>$bit): ?>
      <h1 class="mt-5 ranking_text">{{ $key+1 }}位<?php if($key+1 ==1){ echo '👑';} ?></h1>
      <div class="ranking_box mb-5">
        <div class="ranking_cont">
          <div class="index_left">
            <div class="index_beer_name">{{ $bit['name'] }}</div><br>
            <p class="mini_cont">
              醸造所名 : {{ $bit['brewery'] }}
            </p>
          </div>
          <div class="index_right">
            <div class="index_graph">
              <canvas id="bitter{{ $bit['id'] }}" style="height:222px;width:222px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

    <div class="rank_b">
      <br>
      <h2 style="text-align:center;">酸味ランキング</h2>
      <?php foreach($sour as $key=>$sou): ?>
        <h1 class="mt-5 ranking_text">{{ $key+1 }}位<?php if($key+1 ==1){ echo '👑';} ?></h1>
        <div class="ranking_box mb-5">
          <div class="ranking_cont">
            <div class="index_left">
              <div class="index_beer_name">{{ $sou['name'] }}</div><br>
              <p class="mini_cont">
                醸造所名 : {{ $sou['brewery'] }}
              </p>
            </div>
            <div class="index_right">
              <div class="index_graph">
                <canvas id="sour{{ $sou['id'] }}" style="height:222px;width:222px;"></canvas>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <div class="rank_c">
        <br>
        <h2 style="text-align:center;">甘味ランキング</h2>
        <?php foreach($sweet as $key=>$swe): ?>
          <h1 class="mt-5 ranking_text">{{ $key+1 }}位<?php if($key+1 ==1){ echo '👑';} ?></h1>
          <div class="ranking_box mb-5">
            <div class="ranking_cont">
              <div class="index_left">
                <div class="index_beer_name">{{ $swe['name'] }}</div><br>
                <p class="mini_cont">
                  醸造所名 : {{ $swe['brewery'] }}
                </p>
              </div>
              <div class="index_right">
                <div class="index_graph">
                <canvas id="sweet{{ $swe['id'] }}" style="height:222px;width:222px;"></canvas>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>


        </div>

        <div class="rank_d">
          <br>
          <h2 style="text-align:center;">後味ランキング</h2>
          <?php foreach($aftertaste as $key=>$aft): ?>
            <h1 class="mt-5 ranking_text">{{ $key+1 }}位<?php if($key+1 ==1){ echo '👑';} ?></h1>
            <div class="ranking_box mb-5">
              <div class="ranking_cont">
                <div class="index_left">
                  <div class="index_beer_name">{{ $aft['name'] }}</div><br>
                  <p class="mini_cont">
                    醸造所名 : {{ $aft['brewery'] }}
                  </p>
                </div>
                <div class="index_right">
                  <div class="index_graph">
                    <canvas id="aftertaste{{ $aft['id'] }}" style="height:222px;width:222px;"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>


          </div>

          <div class="rank_e">
            <br>
            <h2 style="text-align:center;">ボディランキング</h2>
            <?php foreach($body as $key=>$bod): ?>
              <h1 class="mt-5 ranking_text">{{ $key+1 }}位<?php if($key+1 ==1){ echo '👑';} ?></h1>
              <div class="ranking_box mb-5">
                <div class="ranking_cont">
                  <div class="index_left">
                    <div class="index_beer_name">{{ $bod['name'] }}</div><br>
                    <p class="mini_cont">
                      醸造所名 : {{ $bod['brewery'] }}
                    </p>
                  </div>
                  <div class="index_right">
                    <div class="index_graph">
                      <canvas id="body{{ $bod['id'] }}" style="height:222px;width:222px;"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>


            </div>

            <div class="rank_f">
              <br>
              <h2 style="text-align:center;">泡ランキング</h2>
              <?php foreach($foam as $key=>$foa): ?>
                <h1 class="mt-5 ranking_text">{{ $key+1 }}位<?php if($key+1 ==1){ echo '👑';} ?></h1>
                <div class="ranking_box mb-5">
                  <div class="ranking_cont">
                    <div class="index_left">
                      <div class="index_beer_name">{{ $foa['name'] }}</div><br>
                      <p class="mini_cont">
                        醸造所名 : {{ $foa['brewery'] }}
                      </p>
                    </div>
                    <div class="index_right">
                      <div class="index_graph">
                        <canvas id="foam{{ $foa['id'] }}" style="height:222px;width:222px;"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>

              </div>
              @foreach($bitter as $bit )
        <script>
        var ctx = document.getElementById("bitter{{ $bit['id'] }}");
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
                             {{ $bit['bitter'] }},
                             {{ $bit['sour'] }},
                             {{ $bit['sweet'] }},
                             {{ $bit['aftertaste'] }},
                             {{ $bit['body'] }},
                             {{ $bit['foam'] }}
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
        @foreach($sour as $sou )
  <script>
  var ctx = document.getElementById("sour{{ $sou['id'] }}");
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
                       {{ $sou['bitter'] }},
                       {{ $sou['sour'] }},
                       {{ $sou['sweet'] }},
                       {{ $sou['aftertaste'] }},
                       {{ $sou['body'] }},
                       {{ $sou['foam'] }}
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
  @foreach($sweet as $swe )
  <script>
  var ctx = document.getElementById("sweet{{ $swe['id'] }}");
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
                 {{ $swe['bitter'] }},
                 {{ $swe['sour'] }},
                 {{ $swe['sweet'] }},
                 {{ $swe['aftertaste'] }},
                 {{ $swe['body'] }},
                 {{ $swe['foam'] }}
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
  @foreach($aftertaste as $aft )
  <script>
  var ctx = document.getElementById("aftertaste{{ $aft['id'] }}");
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
                 {{ $aft['bitter'] }},
                 {{ $aft['sour'] }},
                 {{ $aft['sweet'] }},
                 {{ $aft['aftertaste'] }},
                 {{ $aft['body'] }},
                 {{ $aft['foam'] }}
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
  @foreach($body as $bod )
  <script>
  var ctx = document.getElementById("body{{ $bod['id'] }}");
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
                 {{ $bod['bitter'] }},
                 {{ $bod['sour'] }},
                 {{ $bod['sweet'] }},
                 {{ $bod['aftertaste'] }},
                 {{ $bod['body'] }},
                 {{ $bod['foam'] }}
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
  @foreach($foam as $foa )
  <script>
  var ctx = document.getElementById("foam{{ $foa['id'] }}");
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
                 {{ $foa['bitter'] }},
                 {{ $foa['sour'] }},
                 {{ $foa['sweet'] }},
                 {{ $foa['aftertaste'] }},
                 {{ $foa['body'] }},
                 {{ $foa['foam'] }}
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
                $('.push_a').click(function(){
                  $('.rank_a').show();
                  $('.rank_b').hide();
                  $('.rank_c').hide();
                  $('.rank_d').hide();
                  $('.rank_e').hide();
                  $('.rank_f').hide();
                });
                $('.push_b').click(function(){
                  $('.rank_b').show();
                  $('.rank_a').hide();
                  $('.rank_c').hide();
                  $('.rank_d').hide();
                  $('.rank_e').hide();
                  $('.rank_f').hide();
                });
                $('.push_c').click(function(){
                  $('.rank_c').show();
                  $('.rank_a').hide();
                  $('.rank_b').hide();
                  $('.rank_d').hide();
                  $('.rank_e').hide();
                  $('.rank_f').hide();
                });
                $('.push_d').click(function(){
                  $('.rank_d').show();
                  $('.rank_a').hide();
                  $('.rank_b').hide();
                  $('.rank_c').hide();
                  $('.rank_e').hide();
                  $('.rank_f').hide();
                });
                $('.push_e').click(function(){
                  $('.rank_e').show();
                  $('.rank_a').hide();
                  $('.rank_b').hide();
                  $('.rank_c').hide();
                  $('.rank_d').hide();
                  $('.rank_f').hide();
                });
                $('.push_f').click(function(){
                  $('.rank_f').show();
                  $('.rank_a').hide();
                  $('.rank_b').hide();
                  $('.rank_c').hide();
                  $('.rank_d').hide();
                  $('.rank_e').hide();
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
