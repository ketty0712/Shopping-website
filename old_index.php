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
    $(function() {
      $(window).resize(function() {
        $(".card-text").height($(".MAX").height());
        $(".left1").css("display","inline-flex");
        $(".right1").css("display","inline-flex");
        $(".left1").css("padding-top","0");
        $(".right1").css("padding-top","0");
        $("#fhc").prop("checked",false);
        
      });
      $("#fhc").change(function(){
        if($(this).prop("checked")){
          $(".left1").css("padding-top","250px");
          $(".right1").css("padding-top","480px");
        }
        else{  
          $(".left1").css("padding-top","0px");
          $(".right1").css("padding-top","0px");
        }
      });
    });
  </script>
  <style>
    header .left1{
      position:relative;
      display:inline-flex;
      font-size: 0.95rem;
      list-style-type: none;
      margin:1.25rem 0 ;
    }
    header .right1{
      position:relative;
      display:inline-flex;
      font-size: 0.95rem;
      list-style-type: none;
      float: right;
      margin:1.25rem 0 ;
    }
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    img {
      object-fit: cover;
    }
    @media(max-width:1030px){
      main{
        padding-top:50px;
      }
      header .menu{
        position:fixed;
        background-color: white;
        width:100%;
        height:50px;
        z-index:4;
      }
      .fa-bars:before {
        font-size: 1.5rem;
        margin:10px 10px;
        line-height: 50px;
        z-index:4;
      }
      #fhc{
        position: absolute;
        top: 10px;
        left: 10px;
        width:25px;
        height:25px;
        opacity: 0;
      }
      header .left1{
        position:fixed;
        display:flex;
        top:-200px;
        margin:0;
        flex-wrap: wrap;
        flex-direction: column;
        background-color: white;
        padding-left: 0px!important;
        text-align: center;
        width:100%;
        list-style: none;
        transition: all 0.8s;
        z-index: 3;
      }
      header .right1{
        position:fixed;
        display:flex;
        top:-241px;
        margin:0;
        text-align: center;
        flex-direction: column;
        width:100%;
        background-color: white;
        transition: all 0.8s;
        z-index:2;
      }
      .left1 a{
        width:100%;
        margin:0 auto;
      }
      .right1 span{
        flex-direction: <?php if(isset($_SESSION))echo "column-reverse";else echo "column"?>
      }
      .right1 a{
        width:100%;
        display:block;
        margin:0 auto;
      }
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
     
    }

    div.transbox {
      background-size: cover;
      background-color: rgba(255, 255, 255, 0.6);
      background-position: 0px 0px;
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

    .text-muted {
      color: #41464b;
      /* position: fixed; */
      line-height: initial;
      font-weight: 700;
      font-size: smaller;
    }

    .lead.text-muted {
      color: #055160;
      /* position: fixed; */
      bottom: .5em;
      right: 45%;
      font-weight: 600;
      word-spacing: 0.5rem;
      word-break: break-word;
      line-height: 1.5rem;
      font-size: unset;
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
      /* opacity: 0.6; */
    }

    .container {
      overflow-y: auto;
    }

    .card-text {
      max-height: 60px;
    }
  </style>
  <script>
    $(function() {
      $(window).resize(function() {
        $(":button[name='view[]']").each(function() {
          $(this).height($(this).next().height());
        });
      });
      $(".text-body").css({
        "margin-bottom": "1rem"
      })
    });
  </script>

</head>

<body>

  <header>
    <div class="menu">
      <i class="fa fa-bars"> </i>
      <input type="checkbox" name="fa-bars-hidden-checkbox" id=fhc>
    </div>

    <!-- <ul class="nav nav-pills py-3" style="width: 65%;"> -->
    <ul class="left1">
      <!-- <li class="nav-item"><a href="#" class="nav-link active"><img src="./HW/"></a></li> -->
      <li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="About.html" class="nav-link">Features</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#main" class="nav-link js-scroll-trigger">Pricing</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">FAQs</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="About.html" class="nav-link">About</a></li>
      <span style="display:none" id="custom">
        <?php
        if (isset($_SESSION['userid'])) {
          
          echo "<li class=\"nav-item d-flex justify-content-center\"><a href=\"logout.php\" class=\"nav-link\">Sign Out(" . $_SESSION['userid'] . ")</a></li>";
        }
        else {
          echo "<li class=\"nav-item d-flex justify-content-center\"><a href=\"login.php\" class=\"nav-link\">Sign Up</a></li>
                <li class=\"nav-item d-flex justify-content-center\"><a href=\"Rseg3.php\" class=\"nav-link\">Sign In</a></li>";
        }
        ?>
        <li class="nav-item d-flex justify-content-center"><a href="checkout.php" class="nav-link">Cart</a></li>
      </span>

    </ul>

    <!-- <div class="nav nav-pills py-3 cart" id="custom" style="width: auto; top:-1pt; right:0; z-index: 3; position:absolute;"> -->
    <div class="right1" id="custom" >
      <span class="nav-item d-flex justify-content-end cart">
        <a href="Reg3.php" class="nav-link">Sign Up</a>
        <a href="login.php" class="nav-link">Sign In</a>
        <a href="checkout.php" class="nav-link" ><img src="product_pic/cart.svg" alt="" height="20" width="35" xmlns="http://www.w3.org/2000/svg">CART</a>
      </span>
    </div>
  </header>

  <main>

    <div class="background">
      <div class=transbox>
        <section class="py-3 text-center container">

          <div class="row py-lg-5">
            <div class="col-lg-8 col-md-8 mx-auto">
              <h1 class="fw-bold mb-lg-3">Bakery House</h1>
              <p class="lead text-muted status">
                Chill是我們建立這個品牌的核心概念，一切的出發點以放鬆療癒作為我們設計的主軸。
                以這個出發點，與朋友歡聚，或是與自己相處的時候，不管是簡單的做一頓飯，在露營的時候野炊，或是舉辦派對的這種種過程，都應該是要很Chill的。但總是還會有一些繁雜的小瑣事，讓這一切可能變得有點麻煩，所以我們就是要幫您省去這些瑣事，從料理選擇，處理食材，控制份量，這些麻煩的過程交給我們。你只要專心地享受美食和歡聚時光對即可。</p>
              <p>
                <a href="#" class="btn btn-primary my-3">去看看(前往真。店面網址)</a>
                <a href="#" class="btn btn-secondary my-2">Call +1 (555) 123-4567</a>
              </p>
            </div>
          </div>

        </section>
      </div>

    </div>
    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="main">
          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product1.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no1.svg" width="100%"></a>

              <!-- Product1 -->
              <div class="card-body">
                <p class="card-text">【客製化蛋糕】酒鬼系列蛋糕-絕對伏特加</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,680</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>

              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product2.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no2.svg" width="100%"></a>
              <!-- Product2 -->
              <div class="card-body">
                <p class="card-text">【客製化蛋糕】酒鬼系列蛋糕-jack daniel</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,580</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product3.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no3.svg" width="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】藍色海洋風格蛋糕</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,380</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product4.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no4.svg" width="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】男人系冷色調風格蛋糕</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,680</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product5.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no5.svg" width="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】男人系灰色風格蛋糕</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,680</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product6.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no6.svg" width="100%"></a>

              <div class="card-body">
                <p class="card-text">【客製化蛋糕】人魚公主蛋糕<br></br></p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 2,150</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product7.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no7.svg" width="100%"></a>

              <div class="card-body">
                <p class="card-text">【旅行蛋糕】紅酒莓果蛋糕</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 220</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product8.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no8.svg" width="100%"></a>
              <!-- Product8 -->
              <div class="card-body">
                <p class="card-text">【經典系列】乳酪布朗尼</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 250</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>


          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product9.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no9.svg" width="100%"></a>
              <!-- Product9 -->
              <div class="card-body">
                <p class="card-text">10入草莓系列達克瓦茲禮盒</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 650</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product10.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no10.svg" width="100%"></a>
              <!-- Product10 -->
              <div class="card-body">
                <p class="card-text">【客製化蛋糕】酒鬼系列蛋糕-格瑪蘭</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,880</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product11.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no11.svg" width="100%"></a>
              <!-- Product11 -->
              <div class="card-body">
                <p class="card-text MAX">【客製化蛋糕】權力遊戲卓耿蛋糕</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 2,980</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <a href="Products/Product12.php" class="bd-placeholder-img card-img-top"><img src="product_pic/no12.svg" width="100%"></a>
              <!-- Product12 -->
              <div class="card-body">
                <p class="card-text">【客製化蛋糕】迷霧金磚</p>
                <div class="d-flex justify-content-between align-items-center">
                  <mark class="text-body">NT$ 1,580</mark>
                </div>
                <div class="btn-group d-flex justify-content-between align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="view[]">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]">Add in Cart</button>
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
      <!-- <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p> -->
    </div>
  </footer>


  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>