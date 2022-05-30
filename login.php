<?php
if (isset($_POST['user_name']) && isset($_POST['user_password'])) {
  session_start();

  if (isset($_POST['user_name']) && isset($_POST['user_password'])) {
    $user = trim($_POST["user_name"]);
    include('Link_sql.php');
    $sql = "SELECT * FROM m_info where (username = '" .
      trim($_POST['user_name']) .
      "' and password='" .
      trim($_POST['user_password']) . "')"; // 指定SQL查詢字串
    $exit = false;
    // 送出查詢的SQL指令
    if ($result = mysqli_query($link, $sql)) {
      if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['no'] = $row['no'];
        $_SESSION['user_name'] = $_POST['user_name'];
        $_SESSION['password'] = $_POST['user_password'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['mobile'] = $row['mobile'];
        // $_SESSION['tel'] = $row['tel'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['address'] = $row['address'];
        // $_SESSION['birthday'] = $row['birthday'];
        $_SESSION['level'] = 2;  //帳號已存在
        if ($_SESSION['user_name'] == "admin") $_SESSION['level'] = 9;
        $exit = true; //帳號已存在
      } else {
        $exit = false; //帳號不存在
      }
      mysqli_free_result($result); // 釋放佔用的記憶體
    }

    mysqli_close($link); // 關閉資料庫連結

    alert_1($exit);
  }
}
?>
<!DOCTYPE html>
<html lang="en" class="fontawesome-i2svg-active fontawesome-i2svg-complete">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Favicon-->

  <link rel="icon" type="image/x-icon" href="assets/person.svg" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
  <!-- jquery model -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- My design js -->
  <script type="text/javascript" src="bootstrap/js/login_forger_pwd.js"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
  <!-- Third party plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="bootstrap/css/styles.css" rel="stylesheet">
  <link href="bootstrap/css/about.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap/css/sign.css">
</head>
<script>
  // $(function() {
  //   function message() {
  //     setTimeout(function() {
  //       $("#formAlert").fadeOut();
  //     }, 1500);
  //   }
  //   // message();
  // });
</script>

<body id="page-top">
  <div class="transbox">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">SKoff。</a>
        <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="navbar-collapse collapse" id="navbarResponsive" style>
          <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">首頁</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="About.php">關於我們</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="Report.php">問題回報</a></li>
            <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="signin.php">Sign In</a></li> -->
          </ul>
        </div>
        <!-- <div id="formAlert" style="position:fixed;" class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>登入失敗!</strong> &nbsp; 找不到此帳戶，或是密碼輸入錯誤，請重新檢查
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->
      </div>
    </nav>

    <head>

      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
      <!-- <script type="text/javascript" src="bootstrap/js/collapse.js"></script>x -->

      <link rel="stylesheet" href='bootstrap/css/login.css' id="compiled-css">
      <script id="insert"></script>


    </head>

    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
    <div class="container">

      <div class="row">
        <div class="col-sm-col-9 col-lg-7 mx-auto">
          <div class="card card-signin">
            <div class="out-window" style="display:none;">
              <button type="button" class="close forger-window-close" data-dismiss="card" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></br>
              <div id="find_user">
                <h6>我們需要認證您的身分：</h6>
                <div class="form-label-group form-group">
                  <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required>
                  <label for="inputEmail">請輸入您當初註冊的Email</label>
                  <label for="inputEmail" class="error"></label>
                </div>
                <button class="btn btn-primary" style="border-radius: 10px; float:right;" id="mail_s">送出</button>
              </div>
              <div id="is_you">
              </div>

            </div>
            <div class="card-body">
              <i class="bi bi-person-circle card-icon text-center"></i>
              <h5 class="card-title text-center">Login</h5>
              <form name="signIn" id="signIn" class="form-signin" method="POST">
                <div class="form-label-group">
                  <input type="text" name="user_name" id="inputUser" class="form-control" placeholder="@example" required autofocus>
                  <label for="inputUser" class="input2">使用者名稱</label>
                </div>

                <div class="form-label-group">
                  <input type="password" name="user_password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword" class="input2">密碼</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">記住密碼</label>
                  <label class="forget-a"><a>忘記密碼?</a></label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" id="subb" type="submit">登入</button>
                <a href="Reg3.php" class="btn btn-lg btn-danger btn-block text-uppercase">還不是會員嗎？註冊一個</a>

                <!-- <hr class="my-4">
                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button> -->
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Bootstrap core JS-->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <!-- Core theme JS-->
  <script src="bootstrap/js/scripts.js"></script>
</body>
<?php 
function alert_1($exit){
  if ($exit) {
    //認證(Authentication):連線資料庫驗證使用者的帳號密碼是否正確
    //授權(Authorization):連線資料庫檢查使用者的身分別(會員、管理者....)
    echo "<script>alert('登入成功!');location.href='index.php';</script>";
  } else {
    // echo "<script>alert('此帳號不存在，或是密碼輸入錯誤，請重新檢查!');location.href='login.php';</script>";
    // echo "<script>$('.alert').alert('使用者名稱或密碼輸入錯誤!');</script>";
    echo "<script>alert('使用者名稱或密碼輸入錯誤!');</script>";
  } 
}

?>





</html>