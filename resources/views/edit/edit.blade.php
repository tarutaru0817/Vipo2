
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>投稿編集画面</title>
</head>
<body>
  @include('other/header')
  @if(session('checker') == $_GET['user_id'])
  @if(!empty($beer))
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
      </div>
      <h1 class="index_text col-sm-8 mt-5 mb-5">投稿編集</h1>
      <div class="col-sm-2">
      </div>
    </div>
  </div>

  <div class="login_box mt-5 mb-5">
    <form action="edit_confirm?user_id=<?php echo $_GET['user_id'] ?>&beer_id=<?php echo $_GET['beer_id'] ?>" method="post" enctype="multipart/form-data">
      @csrf
      @foreach($errors->all() as $error)
      <li style="text-align: center;">{{ $error }}</li>
      @endforeach
      <div class="post_cont">
        <div class="post_left">
          <div class="post_minicont">
            <div class="post_minir">

              <p class="mt-3 post_label">ビール名*:</p>
              <p class="mt-4 post_label">醸造所:</p>
              <p class="mt-4 post_label">ビアスタイル:</p>
              <p class="mt-4 post_label">値段:</p>

            </div>
            <div class="post_minil">
              <input type="text" required name="name" class="mt-3" style="width:150px;" value="{{ $beer['name'] }}"><br>
              <input type="text" name="brewery" class="mt-3" style="width:150px;" value="{{ $beer['brewery'] }}"><br>
              <input type="text" name="style" class="mt-3" style="width:150px;" value="{{ $beer['style'] }}"><br>
              <input type="number" name="price" class="mt-3" style="width:150px;" value="{{ $beer['price'] }}"><br>
            </div>
          </div>
          <br>
          <label for="image" class="leftside">写真を選択<br>
            <input type="file" name="image">


          </div>

          <div class="post_right">
            <label for="bitter">苦み*：
              <input type="radio" name="bitter" value="1"  class="mt-3" <?php if($beer['bitter']==1){ echo "checked";} ?> > 1
              <input type="radio" name="bitter" value="2" <?php if($beer['bitter']==2){ echo "checked";} ?>> 2
              <input type="radio" name="bitter" value="3" <?php if($beer['bitter']==3){ echo "checked";} ?>> 3
              <input type="radio" name="bitter" value="4" <?php if($beer['bitter']==4){ echo "checked";} ?>> 4
              <input type="radio" name="bitter" value="5" <?php if($beer['bitter']==5){ echo "checked";} ?>> 5</label><br>
              <label for="sour">酸味*：
                <input type="radio" name="sour" value="1" class="mt-3" <?php if($beer['sour']==1){ echo "checked";} ?>> 1
                <input type="radio" name="sour" value="2" <?php if($beer['sour']==2){ echo "checked";} ?>> 2
                <input type="radio" name="sour" value="3" <?php if($beer['sour']==3){ echo "checked";} ?>> 3
                <input type="radio" name="sour" value="4" <?php if($beer['sour']==4){ echo "checked";} ?>> 4
                <input type="radio" name="sour" value="5" <?php if($beer['sour']==5){ echo "checked";} ?>> 5</label><br>
                <label for="sweet">甘味*：
                  <input type="radio" name="sweet" value="1" class="mt-3" <?php if($beer['sweet']==1){ echo "checked";} ?>> 1
                  <input type="radio" name="sweet" value="2" <?php if($beer['sweet']==2){ echo "checked";} ?>> 2
                  <input type="radio" name="sweet" value="3" <?php if($beer['sweet']==3){ echo "checked";} ?>> 3
                  <input type="radio" name="sweet" value="4" <?php if($beer['sweet']==4){ echo "checked";} ?>> 4
                  <input type="radio" name="sweet" value="5" <?php if($beer['sweet']==5){ echo "checked";} ?>> 5</label><br>
                  <label for="aftertaste">後味*：
                    <input type="radio" name="aftertaste" value="1" class="mt-3" <?php if($beer['aftertaste']==1){ echo "checked";} ?>> 1
                    <input type="radio" name="aftertaste" value="2" <?php if($beer['aftertaste']==2){ echo "checked";} ?>> 2
                    <input type="radio" name="aftertaste" value="3" <?php if($beer['aftertaste']==3){ echo "checked";} ?>> 3
                    <input type="radio" name="aftertaste" value="4" <?php if($beer['aftertaste']==4){ echo "checked";} ?>> 4
                    <input type="radio" name="aftertaste" value="5" <?php if($beer['aftertaste']==5){ echo "checked";} ?>> 5</label><br>
                    <label for="body">ボディ*：
                      <input type="radio" name="body" value="1" class="mt-3" <?php if($beer['body']==1){ echo "checked";} ?>> 1
                      <input type="radio" name="body" value="2" <?php if($beer['body']==2){ echo "checked";} ?>> 2
                      <input type="radio" name="body" value="3" <?php if($beer['body']==3){ echo "checked";} ?>> 3
                      <input type="radio" name="body" value="4" <?php if($beer['body']==4){ echo "checked";} ?>> 4
                      <input type="radio" name="body" value="5" <?php if($beer['body']==5){ echo "checked";} ?>> 5</label><br>
                      <label for="foam">泡*：
                        <input type="radio" name="foam" value="1" class="mt-3" <?php if($beer['foam']==1){ echo "checked";} ?>> 1
                        <input type="radio" name="foam" value="2" <?php if($beer['foam']==2){ echo "checked";} ?>> 2
                        <input type="radio" name="foam" value="3" <?php if($beer['foam']==3){ echo "checked";} ?>> 3
                        <input type="radio" name="foam" value="4" <?php if($beer['foam']==4){ echo "checked";} ?>> 4
                        <input type="radio" name="foam" value="5" <?php if($beer['foam']==5){ echo "checked";} ?>> 5</label><br>
                        <label for="impressions" class="leftside">感想<br>
                          <textarea name="impressions"cols='20' rows="4" maxlength="240">{{ $beer['impressions'] }}</textarea></label>
                        </div>

                      </div>
                      <br>
                      <div class="post_button">
                        <input type="button" value="戻る" class="btn btn-primary" onclick="history.back()">
                        <input type="submit" value="確定画面へ" class="btn btn-primary mr-5" name="check">
                      </div>
                    </form>
                  </div>
                  @else
                  <div class="pass_comp_box mt-5">
                    <p class="mt-5 mb-5" style="text-align:center"><?= '不正なビールIDです。';?></p>
                  </div>
                  @endif
                  @else
                  <div class="pass_comp_box mt-5">
                    <p class="mt-5 mb-5" style="text-align:center"><?= '不正アクセスです。';?></p>
                  </div>
                  @endif
                </body>
                </html>
