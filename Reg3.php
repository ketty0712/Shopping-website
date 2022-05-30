<!-- 註冊 -->
<?php

if (!empty($_POST['user_name']) && isset($_POST['password']) && isset($_POST['name'])) {
    include('Link_sql.php');
    $sql = "select * from m_info where (username='" . $_POST['user_name'] . "')";
    if ($result = mysqli_query($link, $sql)) {
        $total_records = mysqli_num_rows($result); //總筆數
        if ($total_records > 0) {
            
            echo "<script>alert('使用者名稱已存在，請更換一個!');</script>";
        } else {
            $sql = "insert into m_info (name, username, password, email) values ('" . $_POST['name'] . "','" . $_POST['user_name'] . "','" . $_POST['password'] . "','" . $_POST['email'] . "')";
            if ($result = mysqli_query($link, $sql)) {
                echo "<script>alert('資料新增成功!');location.href='login.php';</script>";
            } else {
                echo "<font color=red>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</font>";
                // $msg = "<span style='color:#FF0000'>資料新增失敗！<br>錯誤代碼：" . mysqli_errno($link) . "<br>錯誤訊息：" . mysqli_error($link) . "</span>";
            }
        }
    }

    mysqli_close($link); // 關閉資料庫連結

}

?>
<!DOCTYPE html>
<html lang="en" class="fontawesome-i2svg-active fontawesome-i2svg-complete">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>
    <script>
        function sendRequest() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1){ 
                        document.getElementById('show_msg').innerHTML = ' 此帳號已存在!';
                        if($('[name="name"]').val())
                            $("[name='submit']").attr('type','button');
                    }
                    else {
                        document.getElementById('show_msg').innerHTML = '';
                        $("[name='submit']").attr('type','submit');
                    }
                }
            };
            var url = 'check_account_ajax.php?user_name=' + document.login.user_name.value + '&timeStamp=' + new Date().getTime();
            xhttp.open('GET', url, true); //建立XMLHttpRequest連線要求
            xhttp.send();
        }
    </script>
    
    <!-- Favicon-->
    <style type="text/css">
        body {
            background-image: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.5)), url("product_pic/Login_bg.jpg") !important;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        svg:not(:root).svg-inline--fa {
            overflow: visible
        }

        .svg-inline--fa {
            display: inline-block;
            font-size: inherit;
            height: 1em;
            overflow: visible;
            vertical-align: -.125em
        }

        .svg-inline--fa.fa-lg {
            vertical-align: -.225em
        }

        .svg-inline--fa.fa-w-1 {
            width: .0625em
        }

        .svg-inline--fa.fa-w-2 {
            width: .125em
        }

        .svg-inline--fa.fa-w-3 {
            width: .1875em
        }

        .svg-inline--fa.fa-w-4 {
            width: .25em
        }

        .svg-inline--fa.fa-w-5 {
            width: .3125em
        }

        .svg-inline--fa.fa-w-6 {
            width: .375em
        }

        .svg-inline--fa.fa-w-7 {
            width: .4375em
        }

        .svg-inline--fa.fa-w-8 {
            width: .5em
        }

        .svg-inline--fa.fa-w-9 {
            width: .5625em
        }

        .svg-inline--fa.fa-w-10 {
            width: .625em
        }

        .svg-inline--fa.fa-w-11 {
            width: .6875em
        }

        .svg-inline--fa.fa-w-12 {
            width: .75em
        }

        .svg-inline--fa.fa-w-13 {
            width: .8125em
        }

        .svg-inline--fa.fa-w-14 {
            width: .875em
        }

        .svg-inline--fa.fa-w-15 {
            width: .9375em
        }

        .svg-inline--fa.fa-w-16 {
            width: 1em
        }

        .svg-inline--fa.fa-w-17 {
            width: 1.0625em
        }

        .svg-inline--fa.fa-w-18 {
            width: 1.125em
        }

        .svg-inline--fa.fa-w-19 {
            width: 1.1875em
        }

        .svg-inline--fa.fa-w-20 {
            width: 1.25em
        }

        .svg-inline--fa.fa-pull-left {
            margin-right: .3em;
            width: auto
        }

        .svg-inline--fa.fa-pull-right {
            margin-left: .3em;
            width: auto
        }

        .svg-inline--fa.fa-border {
            height: 1.5em
        }

        .svg-inline--fa.fa-li {
            width: 2em
        }

        .svg-inline--fa.fa-fw {
            width: 1.25em
        }

        .fa-layers svg.svg-inline--fa {
            bottom: 0;
            left: 0;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0
        }

        .fa-layers {
            display: inline-block;
            height: 1em;
            position: relative;
            text-align: center;
            vertical-align: -.125em;
            width: 1em
        }

        .fa-layers svg.svg-inline--fa {
            -webkit-transform-origin: center center;
            transform-origin: center center
        }

        .fa-layers-counter,
        .fa-layers-text {
            display: inline-block;
            position: absolute;
            text-align: center
        }

        .fa-layers-text {
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transform-origin: center center;
            transform-origin: center center
        }

        .fa-layers-counter {
            background-color: #ff253a;
            border-radius: 1em;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            color: #fff;
            height: 1.5em;
            line-height: 1;
            max-width: 5em;
            min-width: 1.5em;
            overflow: hidden;
            padding: .25em;
            right: 0;
            text-overflow: ellipsis;
            top: 0;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: top right;
            transform-origin: top right
        }

        .fa-layers-bottom-right {
            bottom: 0;
            right: 0;
            top: auto;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: bottom right;
            transform-origin: bottom right
        }

        .fa-layers-bottom-left {
            bottom: 0;
            left: 0;
            right: auto;
            top: auto;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: bottom left;
            transform-origin: bottom left
        }

        .fa-layers-top-right {
            right: 0;
            top: 0;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: top right;
            transform-origin: top right
        }

        .fa-layers-top-left {
            left: 0;
            right: auto;
            top: 0;
            -webkit-transform: scale(.25);
            transform: scale(.25);
            -webkit-transform-origin: top left;
            transform-origin: top left
        }

        .fa-lg {
            font-size: 1.3333333333em;
            line-height: .75em;
            vertical-align: -.0667em
        }

        .fa-xs {
            font-size: .75em
        }

        .fa-sm {
            font-size: .875em
        }

        .fa-1x {
            font-size: 1em
        }

        .fa-2x {
            font-size: 2em
        }

        .fa-3x {
            font-size: 3em
        }

        .fa-4x {
            font-size: 4em
        }

        .fa-5x {
            font-size: 5em
        }

        .fa-6x {
            font-size: 6em
        }

        .fa-7x {
            font-size: 7em
        }

        .fa-8x {
            font-size: 8em
        }

        .fa-9x {
            font-size: 9em
        }

        .fa-10x {
            font-size: 10em
        }

        .fa-fw {
            text-align: center;
            width: 1.25em
        }

        .fa-ul {
            list-style-type: none;
            margin-left: 2.5em;
            padding-left: 0
        }

        .fa-ul>li {
            position: relative
        }

        .fa-li {
            left: -2em;
            position: absolute;
            text-align: center;
            width: 2em;
            line-height: inherit
        }

        .fa-border {
            border: solid .08em #eee;
            border-radius: .1em;
            padding: .2em .25em .15em
        }

        .fa-pull-left {
            float: left
        }

        .fa-pull-right {
            float: right
        }

        .fa.fa-pull-left,
        .fab.fa-pull-left,
        .fal.fa-pull-left,
        .far.fa-pull-left,
        .fas.fa-pull-left {
            margin-right: .3em
        }

        .fa.fa-pull-right,
        .fab.fa-pull-right,
        .fal.fa-pull-right,
        .far.fa-pull-right,
        .fas.fa-pull-right {
            margin-left: .3em
        }

        .fa-spin {
            -webkit-animation: fa-spin 2s infinite linear;
            animation: fa-spin 2s infinite linear
        }

        .fa-pulse {
            -webkit-animation: fa-spin 1s infinite steps(8);
            animation: fa-spin 1s infinite steps(8)
        }

        @-webkit-keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        .fa-rotate-90 {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg)
        }

        .fa-rotate-180 {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        .fa-rotate-270 {
            -webkit-transform: rotate(270deg);
            transform: rotate(270deg)
        }

        .fa-flip-horizontal {
            -webkit-transform: scale(-1, 1);
            transform: scale(-1, 1)
        }

        .fa-flip-vertical {
            -webkit-transform: scale(1, -1);
            transform: scale(1, -1)
        }

        .fa-flip-both,
        .fa-flip-horizontal.fa-flip-vertical {
            -webkit-transform: scale(-1, -1);
            transform: scale(-1, -1)
        }

        .nav-link {
            font-weight: 600;
        }

        :root .fa-flip-both,
        :root .fa-flip-horizontal,
        :root .fa-flip-vertical,
        :root .fa-rotate-180,
        :root .fa-rotate-270,
        :root .fa-rotate-90 {
            -webkit-filter: none;
            filter: none
        }

        .fa-stack {
            display: inline-block;
            height: 2em;
            position: relative;
            width: 2.5em
        }

        .fa-stack-1x,
        .fa-stack-2x {
            bottom: 0;
            left: 0;
            margin: auto;
            position: absolute;
            right: 0;
            top: 0
        }

        .svg-inline--fa.fa-stack-1x {
            height: 1em;
            width: 1.25em
        }

        .svg-inline--fa.fa-stack-2x {
            height: 2em;
            width: 2.5em
        }

        .fa-inverse {
            color: #fff
        }

        .sr-only {
            border: 0;
            clip: rect(0, 0, 0, 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px
        }

        .sr-only-focusable:active,
        .sr-only-focusable:focus {
            clip: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            position: static;
            width: auto
        }

        .svg-inline--fa .fa-primary {
            fill: var(--fa-primary-color, currentColor);
            opacity: 1;
            opacity: var(--fa-primary-opacity, 1)
        }

        .svg-inline--fa .fa-secondary {
            fill: var(--fa-secondary-color, currentColor);
            opacity: .4;
            opacity: var(--fa-secondary-opacity, .4)
        }

        .svg-inline--fa.fa-swap-opacity .fa-primary {
            opacity: .4;
            opacity: var(--fa-secondary-opacity, .4)
        }

        .svg-inline--fa.fa-swap-opacity .fa-secondary {
            opacity: 1;
            opacity: var(--fa-primary-opacity, 1)
        }

        .svg-inline--fa mask .fa-primary,
        .svg-inline--fa mask .fa-secondary {
            fill: #000
        }

        .fad.fa-inverse {
            color: #fff
        }
    </style>
    <link rel="icon" type="image/x-icon" href="assets/diamond-outline.svg">
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="bootstrap/css/styles.css" rel="stylesheet">
    <link href="bootstrap/css/about.css" rel="stylesheet">
    <!-- <link href="bootstrap/css/refer2.css" rel="stylesheet" /> -->
</head>

<body id="page-top">
    <div>
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
        </div>
        </nav>

        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <title>Bootstrap Registration Page with Floating Labels</title>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <meta name="robots" content="noindex, nofollow">
            <meta name="googlebot" content="noindex, nofollow">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" type="text/css" href="/css/result-light.css">

            <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
            <!-- <script type="text/javascript" src="bootstrap/js/collapse.js"></script>x -->

            <style id="compiled-css" type="text/css">
                :root {
                    --input-padding-x: 1.1rem;
                    --input-padding-y: .75rem;
                }

                /* body {
                    background-image: url(product_pic/Login_bg.jpg);
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-attachment: fixed;
                } */


                .card {
                    background-color: rgba(255, 255, 255, 0.5);
                    margin-top: 5rem;
                    margin-bottom: 5rem;
                }

                .card-login {
                    border: 0;
                    border-radius: 1rem;
                    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                }

                .card-login .card-title {
                    margin-bottom: 2rem;
                    font-weight: 300;
                    font-size: 1.5rem;
                }


                .card-login .card-body {
                    padding: 2rem;
                }

                .form-login {
                    width: 100%;
                    height: 100%;
                }

                .form-login .btn {
                    font-size: 80%;
                    border-radius: 5rem;
                    letter-spacing: .1rem;
                    font-weight: bold;
                    padding: 1rem;
                    transition: all 0.2s;
                }

                .form-label-group {
                    position: relative;
                    margin-bottom: 1.5rem;
                }

                .form-label-group input {
                    height: auto;
                    /* border-radius: 2rem; */
                }

                .form-label-group>input,
                .form-label-group>label,
                .input-group>label,
                .input-group>input {
                    padding: var(--input-padding-y) var(--input-padding-x);

                }

                .form-label-group>label,
                .input-group>label {
                    position: absolute;
                    top: 0;
                    left: 0;
                    display: block;
                    width: 90%;
                    padding-left: calc(var(--input-padding-x)+2.5rem);
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

                .input-group,
                .form-control {
                    width: 90%;
                    margin: 0 auto;
                }

                .form-row {
                    justify-content: center;
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

                .btn {
                    max-width: 300px;
                    margin: 0 auto;
                }

                .form-row {
                    width: 100%;
                }

                input #inlineFormInputGroup.form-control {
                    padding-left: 0;
                }

                .col-auto {
                    padding-right: 0px;
                    padding-left: 0px;
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
                        <div class="card card-login">
                            <div class="card-body">
                                <h5 class="card-title text-center">註冊</h5>
                                <form class="form-login" method="post" action="" name="login">

                                    <div class="form-label-group">
                                        <input type="text" name="name" id="inlineFormInput" class="form-control" placeholder="姓名" required>
                                        <label for="inlineFormInput">姓名</label>
                                    </div>

                                    <div class="col-auto form-label-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">@</div>
                                            </div>
                                            <input type="text" name="user_name" id="inlineFormInputGroup" class="form-control" placeholder="Username" required onkeyup=sendRequest();>
                                            <label for="inlineFormInputGroup" style="padding-left:55px;z-index:3;">Username<span id='show_msg' style="color:red"></span></label>
                                        </div>

                                    </div>


                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required>
                                        <label for="inputEmail">Email</label>
                                    </div>

                                    <div class="form-row form-label-group">
                                        <div class="form-label-group col-md-6">
                                            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                            <label for="inputPassword">密碼</label>
                                        </div>
                                        <div class="form-label-group col-md-6">
                                            <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                                            <label for="inputConfirmPassword" style="padding-left: 2rem;">密碼確認</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit" name="submit">註冊</button>
                                    <a class="btn btn-primary d-block text-center mt-2 small" href="login.php">已經有帳號了? 趕緊登入</a>
                                    <!-- <hr class="my-4">
                                    <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
                                    <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

</body>


<script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent) {
        window.parent.parent.postMessage(["resultsFrame", {
            height: document.body.getBoundingClientRect().height,
            slug: "1nu8g6e5"
        }], "*")
    }

    // always overwrite window.name, in case users try to set it manually
    // window.name = "result";
    // $("匹配元素").on("mouseenter mouseleave", function(event) { //挷定滑鼠進入及離開事件
    //     if (event.type == "mouseenter") {
    //         $(this).css({
    //             "overflow-y": "scroll"
    //         }); //滑鼠進入
    //     } else {
    //         $(this).scrollTop(0).css({
    //             "overflow-y": "hidden"
    //         }); //滑鼠離開
    //     }
    // });
</script>



<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- Core theme JS-->
<script src="bootstrap/js/scripts.js"></script>

</body>

</html>