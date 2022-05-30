<!DOCTYPE html>
<!-- saved from url=(0046)http://127.0.0.1/%E4%BD%9C%E6%A5%AD/index.html -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>Signin Page</title>


  <link href="bootstrap/css/hrd.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/js/bootstrap.bundle.min.js" rel="stylesheet">
  <!-- <link href="bootstrap/css/signup.css" rel="stylesheet"> -->
  <link href="bootstrap/css/signin.css" rel="stylesheet">
  <!--   <link href="bootstrap/css/sign-snip.css" rel="stylesheet"> -->
  <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <!-- Bootstrap core CSS -->

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .btn-link {
      font-size: 14pt;
    }

    .btn-link:hover {
      color: #0a58ca;
      font-weight: 900;
      background-color: rgba(255, 255, 255, 0);
    }

    @media (max-width: 600px) {
      .btn {
        width: 80%;
        float: none !important;
        margin-right: auto !important;
      }

      .text-muted {
        display: none;
      }

      div.background {
        background-image: url(product_pic/mobile.jpg);
      }
    }

    .btn {
      float: right;
      margin-right: 10%;
    }

    header {
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 4;
    }

    div.cart a {
      color: #842029;
    }

    .tit {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      position: absolute;
      display: inline-block;
      top: -9%;
      left: 10%;
      color: -webkit-linear-gradient(to right, rgb(255, 0, 0), rgba(255, 255, 0));
    }

    .logo {
      height: 10%;
      position: absolute;
      top: 10%;
      margin: 10px auto;
      width: 100%;
      z-index: 3;
    }

    div.transbox-2 {
      z-index: 1;
      display: flex;
      flex-direction: column;
      position: relative;
      height: 60%;
      /* width: 70%; */
      top: 35%;
      justify-content: center;
      margin: 0 auto;
    }
  </style>


  <!-- Custom styles for this template -->

</head>

<header>
  <div class="menu">
    <i class="fa fa-bars"> </i>
  </div>

  <ul class="nav nav-pills py-3" style="width: 65%;">
    <li class="nav-item d-flex justify-content-center"><a href="index.php" class="nav-link active">Home</a></li>
    <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Features</a></li>
    <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Pricing</a></li>
    <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Services</a></li>
    <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">About</a></li>
  </ul>

  <div class="nav nav-pills py-3 cart" style="width: auto; display:block; top:-1pt; right:0; z-index: 3; position:absolute;">
    <span class="nav-item d-flex justify-content-end cart">
      <a href="register.php" class="nav-link">Sign Up</a>
      <a href="signin.php" class="nav-link">Sign In</a>
      <a href="checkout.php" class="nav-link"><img src="product_pic/cart.svg" alt="" height="35" width="35" xmlns="http://www.w3.org/2000/svg">CART</a>
    </span>
  </div>
</header>

<body class="text-center">

  <div class="background">
    <div class="transbox"></div>

  </div>
  <img class="mb-2 logo" src="product_pic/Logo.svg" alt="">
  <style id="compiled-css" type="text/css">
    :root {
      --input-padding-x: 1.5rem;
      --input-padding-y: .75rem;
    }

    body {
      background: #007bff;
      background: linear-gradient(to right, #0062E6, #33AEFF);
    }

    .card-signin {
      border: 0;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signin .card-title {
      margin-bottom: 2rem;
      font-weight: 300;
      font-size: 1.5rem;
    }

    .card {
      background-color: rgb(255 255 255 / 50%);

    }

    .card-signin .card-body {
      padding: 2rem;
    }

    .form-signin {
      width: 100%;
    }

    .form-signin .btn {
      font-size: 80%;
      border-radius: 5rem;
      letter-spacing: .1rem;
      font-weight: bold;
      padding: 1rem;
      transition: all 0.2s;
    }

    .form-label-group {
      position: relative;
      margin-bottom: 1rem;
    }

    .form-label-group input {
      height: auto;
      /* border-radius: 2rem; */
    }

    .form-label-group>input,
    .form-label-group>label {
      padding: var(--input-padding-y) var(--input-padding-x) !important;
    }

    .form-label-group>label {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      margin-bottom: 0;
      /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      border: 1px solid transparent;
      border-radius: .25rem;
      transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
      color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-moz-placeholder {
      color: transparent;
    }

    .form-label-group input::placeholder {
      color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
      padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
      padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown)~label {
      padding-top: calc(var(--input-padding-y) / 3);
      padding-bottom: calc(var(--input-padding-y) / 3);
      font-size: 12px;
      color: #777;
    }

    .btn-google {
      color: white;
      background-color: #ea4335;
    }

    .btn-facebook {
      color: white;
      background-color: #3b5998;
    }

    /* Fallback for Edge
-------------------------------------------------- */

    @supports (-ms-ime-align: auto) {
      .form-label-group>label {
        display: none;
      }

      .form-label-group input::-ms-input-placeholder {
        color: #777;
      }
    }

    /* Fallback for IE
-------------------------------------------------- */

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
      .form-label-group>label {
        display: none;
      }

      .form-label-group input:-ms-input-placeholder {
        color: #777;
      }
    }

    /* EOS */
  </style>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Sign In</h5>
              <form class="form-signin">
                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                  <label for="inputEmail">Email address</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                <hr class="my-4">
                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- <main class="form-signin">

    <form action="#" method="POST" target="_blank">

      <div class="transbox-2">
        <h1 class="h1 tit">Sign In</h1>
        <br></br>
        <label for="User" class="visually-hidden">User</label>
        <input type="text" id="User" class="form-control justify-center d-flex" style="width:40%;" placeholder="User" required autofocus>


        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" id="inputPassword" class="form-control justify-center d-flex" style="width:40%;" placeholder="Password" required autofocus>
        <div class="justify-center d-flex" style="text-align:left;">
          <a type="button" class="btn btn-link" id="ForgetPwd" href="#">忘記密碼</a>
        </div>
        <div class="custom-control custom-checkbox mb-3">
          <input type="checkbox" class="custom-control-input" id="customCheck1">
          <label class="custom-control-label" for="customCheck1">Remember password</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block text-uppercase mb-2" type="submit">Sign in</button>
        <hr class="my-4">
        <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
      </div>
      <p class=" mb-1 text-muted" style="position: fixed; justify-content:center;">2021</p>
    </form>
  </main> -->

</body>

</html>