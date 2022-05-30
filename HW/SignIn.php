<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="bootstrap/css/hrd.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>
<script>
  $(document).ready(function() {
    $("i").click(function() {
      $("ul").toggleClass("active");
    });
  });
</script>

<style>
  .menu {
    display: none;
    z-index: 2;
  }
  header {
    font-size: .8rem;
    position: relative;
  }

  div.background {
    z-index: 0;
    background-image: url(product_pic/login_bg.jpg);
    background-repeat: no-repeat;
    background-size: cover;
  }

  header {
    z-index: 1;
  }

  ul li a,
  div.cart a {
    color: #842029 !important;
  }

  .nav-link.active,
  div.cart a:active {
    color: #fff !important;
    background-color: #842029 !important;
  }

  .fra {
    margin-top: 5vh;
  }

  .cart {
    z-index: 2;
    position: fixed;
    top: 0;
  }
</style>

<body>
  <header>
    <div class="menu">
      <i class="fa fa-bars"> </i>
    </div>

    <ul class="nav nav-pills py-3" style="width: 65%;">
      <li class="nav-item d-flex justify-content-center"><a href="index.php" class="nav-link">Home</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Features</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Pricing</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">FAQ</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="About.html" class="nav-link">About</a></li>
    </ul>

    <div class="nav nav-pills py-3 cart" style="width: auto; display:block; top:-1pt; right:0; z-index: 3; position:absolute;">
      <span class="nav-item d-flex justify-content-end cart">
        <a href="register.php" class="nav-link">Sign Up</a>
        <a href="signin.php" class="nav-link active">Sign In</a>
        <a href="checkout.php" class="nav-link "><img src="../HW/product_pic/cart.svg" alt="" height="35" width="35" xmlns="http://www.w3.org/2000/svg">CART</a>
      </span>
    </div>
  </header>

  <body>
    <div class="background">
      <div class="transbox">
        <div class="fra">
          <html>

          <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <title>Bootstrap Login Page Card with Floating Labels</title>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">
            <meta name="viewport" content="width=device-width, initial-scale=1">


            <script type="text/javascript" src="/js/lib/dummy.js"></script>

            <link rel="stylesheet" type="text/css" href="/css/result-light.css">

            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
            <link href="bootstrap/css/sign-snip.css" rel="stylesheet">

            <style>
              div.form-label-group {
                width: 70%;
                margin: 1rem auto;
              }

              .card-signin {
                margin-top: 15vh;
              }

              .btn-google {
                margin-bottom: 15px;
              }

              .btn-primary {
                background: #0067b8;
              }

              .custom-control-label {
                margin-left: 20pt;
              }
            </style>
            <script id="insert"></script>


          </head>

          <body>
            <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

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


            <script type="text/javascript">
              //<![CDATA[





              //]]>
            </script>

            <script>
              // tell the embed parent frame the height of the content
              if (window.parent && window.parent.parent) {
                window.parent.parent.postMessage(["resultsFrame", {
                  height: document.body.getBoundingClientRect().height,
                  slug: "amxr8n19"
                }], "*")
              }

              // always overwrite window.name, in case users try to set it manually
              window.name = "result"
            </script>


          </body>

          </html>
        </div>

      </div>

    </div>
  </body>
</body>

</html>