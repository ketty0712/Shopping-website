<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("i").click(function() {
                $("ul").toggleClass("active");
                $("#custom").toggle();
            });
        });
    </script>
    <link href="bootstrap/css/hrd.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu {
            display: none;
            z-index: 4;
        }

        header {
            font-size: .8rem;
            position: relative;
        }

        @media screen and (max-width:1030px) {

            .transbox .nav-pills,
            .transbox .nav {
                display: none;
                width: 100%;
            }

            .transbox ul {
                display: block;
                margin-bottom: 1rem;
            }

            .transbox ul li {
                display: block;
            }

            .active {
                justify-content: flex-start;
                display: block!important;
                width: 100vw !important;;
                background-color: rgba(255, 255, 255, 0.5);
                font-size: 1rem;
            }
        }

        div.background {
            z-index: 0;
            background-image: url(product_pic/login_bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
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

        div.fra{
            
            overflow-y: scroll!important;
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="transbox">
            <header>
                <div class="menu">
                    <i class="fa fa-bars"> </i>
                </div>

                <ul class="nav nav-pills py-3" style="width: 65%;">
                    <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Features</a></li>
                    <!-- <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Pricing</a></li> -->
                    <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">FAQs</a></li>
                    <li class="nav-item d-flex justify-content-center"><a href="About.html" class="nav-link">About</a></li>
                    <span style="display:none" id="custom">
                        <li class="nav-item d-flex justify-content-center"><a href="SignIn.php" class="nav-link">Sign Up</a></li>
                        <li class="nav-item d-flex justify-content-center active"><a href="register.php" class="nav-link">Sign In</a></li>
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
            <div class="fra">
                <!DOCTYPE html>
                <html>

                <head>
                    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                    <title>Bootstrap Registration Page with Floating Labels</title>
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

                    <style id="compiled-css" type="text/css">
                        :root {
                            --input-padding-x: 1.5rem;
                            --input-padding-y: .75rem;
                        }

                        body {
                            background: #007bff;
                            background: linear-gradient(to right, #0062E6, #33AEFF);
                            
                        }

                        .card {
                            background-color: rgba(255, 255, 255, 0.5);
                           
                        }

                        .card-signin {
                            border: 0;
                            border-radius: 1rem;
                            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
                            overflow: hidden;
                        }

                        .card-signin .card-title {
                            margin-bottom: 2rem;
                            font-weight: 300;
                            font-size: 1.5rem;
                        }


                        .card-signin .card-body {
                            padding: 2rem;
                        }

                        .form-signin {
                            width: 100%;
                            height: 100%;
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
                            padding: var(--input-padding-y) var(--input-padding-x);
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

                        label {
                            cursor: text;
                        }
                        .container .content{
                            overflow-y: auto !important;
                        }
                        /* EOS */
                    </style>

                    <script id="insert"></script>


                </head>

                <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

                <body>
                    <div class="container content">
                        <div class="row">
                            <div class="col-sm-col-9 col-lg-7 mx-auto">
                                <div class="card card-signin">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Register</h5>
                                        <form class="form-signin">
                                            <div class="form-label-group">
                                                <input type="text" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                                                <label for="inputUserame">Username</label>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                                                <label for="inputEmail">Email address</label>
                                            </div>


                                            <div class="form-label-group">
                                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                                <label for="inputPassword">Password</label>
                                            </div>

                                            <div class="form-label-group">
                                                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                                                <label for="inputConfirmPassword">Confirm password</label>
                                            </div>

                                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                                            <a class="d-block text-center mt-2 small" href="#">Sign In</a>
                                            <hr class="my-4">
                                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
                                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button>
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
                            slug: "1nu8g6e5"
                        }], "*")
                    }

                    // always overwrite window.name, in case users try to set it manually
                    window.name = "result";
                    $("匹配元素").on("mouseenter mouseleave", function(event) { //挷定滑鼠進入及離開事件
                        if (event.type == "mouseenter") {
                            $(this).css({
                                "overflow-y": "scroll"
                            }); //滑鼠進入
                        } else {
                            $(this).scrollTop(0).css({
                                "overflow-y": "hidden"
                            }); //滑鼠離開
                        }
                    });
                </script>



                </html>
            </div>

        </div>

    </div>
</body>

</html>