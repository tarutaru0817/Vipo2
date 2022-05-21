<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/base.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/boot.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<nav class="navbar navbar-expand-sm navbar-dark sticky-top">
  <img src="{{ asset('/img/icon.png')}}" class="navbar-brand head_img">
  <div class="collapse navbar-collapse justify-content-start">
    <ul class='navbar nav' id="head_text">
      <?php if(isset($_GET['user_id'])): ?>
        <li class="nav-item">
          <a href="../other/index?user_id=<?php echo $_GET['user_id'] ?>" class="head_link ">ホーム</a>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <a href="../other/ranking<?php if(isset($_GET['user_id'])): ?>?user_id=<?php echo $_GET['user_id'] ?> <?php endif; ?>" class="head_link ">ランキング</a>
      </li>
      <?php if(isset($_GET['user_id'])): ?>
        <li class="nav-item">
          <a href="../post/post?user_id=<?php echo $_GET['user_id'] ?>" class="head_link ">投稿</a>
        </li>
      <?php endif; ?>
      <?php if(isset($_GET['user_id'])): ?>
        <li class="nav-item">
          <a href="../other/mypage?user_id=<?php echo $_GET['user_id'] ?>" class="head_link ">マイページ</a>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <a href="../login/login<?php if(isset($_GET['user_id'])): ?>?user_id=<?php echo $_GET['user_id'] ?> <?php endif; ?>" class="head_link">ログイン</a>
      </li>
    </ul>
  </div>
</nav>
