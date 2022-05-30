<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>Album example · Bootstrap v5.0</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $("i").click(function() {
        $("ul").toggleClass("active");
        $("#custom").toggle();
      });
    });
  </script>
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

    ul li a,
    div.cart a {
      color: #842029 !important;
    }

    .nav-link.active,
    div.cart a:active {
      color: #fff !important;
      background-color: #842029 !important;
    }

    .menu {
      display: none;
      z-index: 2;
    }

    ol,
    ul {
      padding-left: 2rem !important;
    }

    header {
      font-size: .8rem;
      position: relative;
    }

    div.background {
      z-index: 0;
      background-image: url(product_pic/background.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      opacity: 0.6;
    }
    .container {
      overflow-y: scroll;
    }
  </style>


</head>

<body>

  <header>
    <div class="menu">
      <i class="fa fa-bars"> </i>
    </div>

    <ul class="nav nav-pills py-3" style="width: 65%;">
      <li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Features</a></li>
      <!-- <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Pricing</a></li> -->
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">FAQs</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="About.html" class="nav-link">About</a></li>
      <span style="display:none" id="custom">
        <li class="nav-item d-flex justify-content-center"><a href="SignIn.php" class="nav-link">Sign Up</a></li>
        <li class="nav-item d-flex justify-content-center"><a href="register.php" class="nav-link">Sign In</a></li>
        <li class="nav-item d-flex justify-content-center"><a href="checkout.php" class="nav-link">Cart</a></li>
      </span>

    </ul>

    <div class="nav nav-pills py-3 cart" id="custom" style="width: auto; top:-1pt; right:0; z-index: 3; position:absolute;">
      <span class="nav-item d-flex justify-content-end cart">
        <a href="register.php" class="nav-link">Sign Up</a>
        <a href="signin.php" class="nav-link">Sign In</a>
        <a href="checkout.php" class="nav-link"><img src="product_pic/cart.svg" alt="" height="35" width="35" xmlns="http://www.w3.org/2000/svg">CART</a>
      </span>
    </div>
  </header>

  <main>

    <div class="background">
      <section class="py-5 text-center container">

        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Bakery House</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            <p>
              <a href="#" class="btn btn-primary my-2">Main call to action</a>
              <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
          </div>
        </div>

      </section>
    </div>
    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="col">
            <div class="card shadow-sm">
              <a href="Product1.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no1.svg" width="100%" height="100%"></a>


              <div class="card-body">
                <p class="card-text">【客製化蛋糕】酒鬼系列蛋糕-絕對伏特加</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,680</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>

              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no2.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】酒鬼系列蛋糕-jack daniel</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,580</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no3.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】藍色海洋風格蛋糕</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,380</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no4.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】男人系冷色調風格蛋糕</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,680</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no6.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】男人系灰色風格蛋糕</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,680</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no7.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】人魚公主蛋糕<br></br></p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 2,150</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no5.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【旅行蛋糕】紅酒莓果蛋糕</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 220</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no10.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【經典系列】乳酪布朗尼</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 250</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no9.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">10入草莓系列達克瓦茲禮盒</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 650</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no8.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】酒鬼系列蛋糕-格瑪蘭</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,880</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no11.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】權力遊戲卓耿蛋糕<br></br></p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 2,980</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="#" class="bd-placeholder-img card-img-top"><img src="product_pic/no12.svg" width="100%" height="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】迷霧金磚<br></br></p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,580</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

  <footer class="text-muted py-3">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer>


  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>