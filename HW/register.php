<!DOCTYPE html>
<!-- saved from url=(0031)http://127.0.0.1/HW/SignUp.html -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.80.0">
  <title>SignUp Page</title>


  <link href="bootstrap/css/hrd.css" rel="stylesheet">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/css/signup.css" rel="stylesheet">
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

    .flex-container {
      box-sizing: border-box;
      display: flex;
      margin: 0 auto;
      justify-content: flex-end;
      width: 100%;
    }

    .name {
      width: 100%;
      margin: 1em auto;
      justify-content: flex-start;
    }

    .flex-container input[type="text"] {
      font-size: 1em !important;
      margin: 0 2em auto 0;
      width: 35%;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    @media (max-width: 590px) {
      .text-muted {
        display: none !important;
      }

      .transbox2 {
        display: absolute !important;
        height: auto !important;
      }

      .form-control4 {
        margin: 0 auto 0 0;
        text-overflow: ellipsis;
        justify-content: center;
      }

      .selectday,
      .selectmonth {
        width: calc(15vw) !important;
      }

      .selectyear {
        width: calc(25vw) !important;
      }

      .name {
        flex-direction: column-reverse;
      }

      .flex-container input[type="text"] {

        width: auto;
        margin-right: 0;
      }
    }

    h1 {
      font-size: 40px;
      word-spacing: 0.25em;
    }

    div.transbox-2 {
      top: 15%;
    }

    header {
      position: absolute;
      width: 100%;
      top: 0;
      z-index: 4;
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

    .logo {
      height: 10%;
      top: 10%;
      margin: 10px auto;
      width: 30%;
      display: inline;
      z-index: 9;
    }

    div.background {
      z-index: 0;
    }

    div.transbox {
      z-index: 1;
    }

    .signup {
      z-index: 4;
      opacity: none !important;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="bootstrap/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <header>
    <div class="menu">
      <i class="fa fa-bars"> </i>
    </div>

    <ul class="nav nav-pills py-3" style="width: 65%;">
      <li class="nav-item"><a href="index.php" class="nav-link ">Home</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Features</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Pricing</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">FAQ</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="About.html" class="nav-link">About</a></li>
    </ul>

    <div class="nav nav-pills py-3 cart" style="width: auto; display:block; top:-1pt; right:0; z-index: 3; position:absolute;">
      <span class="nav-item d-flex justify-content-end cart">
        <a href="register.php" class="nav-link active">Sign Up</a>
        <a href="signin.php" class="nav-link">Sign In</a>
        <a href="checkout.php" class="nav-link"><img src="../HW/product_pic/cart.svg" alt="" height="35" width="35" xmlns="http://www.w3.org/2000/svg">CART</a>
      </span>
    </div>
  </header>

  <main>
    <div class="background">
      <div class="transbox"></div>
    </div>
    <form action="a.php" method="POST" target="_blank">

      <div class="transbox-2">
        <img class="mb-2 logo" src="../HW/product_pic/Logo.svg" alt=""></img>

        <div class="form-signup form-signin">
          <div class="flex-container name" style="width:70%;">
            <input type="text" id="firstname" class="form-control2 justify-center d-flex firstname" placeholder="First Name" required autofocus>

            <input type="text" id="lastname" class="form-control2 justify-center d-flex lastname" placeholder="Last Name" required autofocus>

          </div>


          <label for="inputDate" class="visually-hidden ">date</label>

          <div class="inline form-control3">
            <span class="title">Your Birthday:</span>

            <script>
              function changeday(y, m) {
                y = parseInt(y);
                m = parseInt(m);
                var Today = new Date();
                var iYear = Today.getFullYear();
                var iMonth = Today.getMonth() + 1;
                var iDay = Today.getDate();

                if (y == iYear) {
                  while (document.all("selectmonth").options.length > 0) {
                    document.all("selectmonth").remove(0);
                  }
                  for (var i = 1; i <= iMonth; i++) {
                    var nOption = document.createElement("OPTION");
                    nOption.text = i;
                    nOption.value = i;
                    if (i == m) nOption.selected = true;
                    document.all("selectmonth").add(nOption);
                  }
                } else {
                  while (document.all("selectmonth").options.length > 0) {
                    document.all("selectmonth").remove(0);
                  }
                  for (var i = 1; i <= 12; i++) {
                    var nOption = document.createElement("OPTION");
                    nOption.text = i;
                    nOption.value = i;
                    if (i == m) nOption.selected = true;
                    document.all("selectmonth").add(nOption);
                  }
                }
                var myselect = document.getElementById("selectday");
                var index = myselect.selectedIndex;

                var tmp = myselect.options[index].value;
                while (document.all("selectday").options.length > 0) {

                  document.all("selectday").remove(0);
                }
                for (var i = 1; i <= maxDate(y, m); i++) {
                  var nOption = document.createElement("OPTION");
                  nOption.text = i;
                  nOption.value = i;
                  if (i == tmp) nOption.selected = true;
                  document.all("selectday").add(nOption);
                }
              }

              function maxDate(y, m) {
                var rtn;
                y = parseInt(y);
                m = parseInt(m);
                var Today = new Date();
                var iYear = Today.getFullYear();
                var iMonth = Today.getMonth() + 1;
                var iDay = Today.getDate();
                if (iYear == y && iMonth == m) {
                  return (iDay);
                }
                if (m % 2 == 0 && m != 2 && m <= 7 || m % 2 == 1 && m > 7) return (30);
                if (m % 2 == 1 && m <= 7 || m % 2 == 0 && m > 7) return (31);
                if (m == 2) {
                  if (y % 4 == 0 && y % 100 != 0 || y % 400 == 0)
                    return (29);
                  else
                    return (28);
                }
              }
            </script>
            <div class="flex-container">
              <select name="Year" class="form-control4 form-select selectyear" required autofocus id="selectyear" onclick="changeday(this.value, selectmonth.value)">
                <?php
                $stamps = time();
                $today = getdate($stamps);
                $year = $today["year"];
                for ($i = $year; $i >= $year - 30; $i--) {
                  echo "<option value={$i}>{$i}</option><br>";
                }
                ?>
              </select>
              <select name="Mon" class="form-control4 form-select selectmonth" required autofocus id="selectmonth" onclick="changeday(selectyear.value, this.value)">
                <?php
                $stamps = time();
                $today = getdate($stamps);
                $month = $today["mon"];
                $day = $today["mday"];
                $year = $today["year"];
                for ($i = 1; $i <= 12; $i++) {
                  if ($i == $month) echo "<option value={$i} selected>{$i}</option>";

                  else echo "<option value={$i}>{$i}</option>";
                }
                ?>
              </select>


              <select name="Day" class="form-control4 form-select selectday" required autofocus id="selectday">
                <?php
                $stamps = time();
                $today = getdate($stamps);
                $month = $today["mon"];
                $day = $today["mday"];
                $total_day = date("t", $stamps);
                for ($i = 1; $i <= $day; $i++) {
                  if ($i == $day) echo "<option value={$i} selected>{$i}</option>";

                  else echo "<option value={$i}>{$i}</option>";
                }
                ?>
              </select>
            </div>



            <script type="text/javascript">
              var Today = new Date();
              selectyear.value = Today.getFullYear();
              selectmonth.value = (Today.getMonth() + 1);
              selectday.value = Today.getDate();
              changeday(selectyear.value, selectmonth.value);
            </script>
          </div>



          <label for="inputEmail" class="visually-hidden">Email address</label>

          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

          <label for="inputtel" class="visually-hidden">phone number</label>

          <input type="tel" id="inputTel" class="form-control" placeholder="Phone number" required autofocus>

          <label for="inputPassword" class="visually-hidden">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">

          <button class="mb-1 w-40 btn btn-lg btn-primary" type="submit">Next</button>
        </div>
      </div>

      <p class=" mb-1 text-muted" style="position: fixed; justify-content:center;">© <?php echo date("Y") ?></p>
    </form>
  </main>
</body>

</html>