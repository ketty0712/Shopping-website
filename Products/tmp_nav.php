<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>nav_test</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script>
        $(function() {
            var counter = 0, // 一開始要顯示的圖，0 的話就是顯示第一張
                slide = document.querySelector('#slide'),
                items = slide.querySelectorAll('img'), // 抓取所有 img
                itemsCount = items.length, // 圖片總數 
                prevBtn = document.createElement('a'), // 上一張按鈕
                nextBtn = document.createElement('a'), // 下一張按鈕
                timer = 4000, // 4 秒換圖
                interval = window.setInterval(showNext, timer); // 設定循環

            prevBtn.classList.add('prev'); // 幫上一張按鈕加 class＝"prev" 給 CSS 指定樣式用
            nextBtn.classList.add('next'); // 幫下一張按鈕加 class＝"next" 給 CSS 指定樣式用
            slide.appendChild(prevBtn); // 將按鈕加到 #slide 裡
            slide.appendChild(nextBtn);

            // 帶入目前要顯示第幾張圖 
            var showCurrent = function() {
                var itemToShow = Math.abs(counter % itemsCount); // 取餘數才能無限循環
                [].forEach.call(items, function(el) {
                    el.classList.remove('show'); // 將所有 img 的 class="show" 移除
                });
                items[itemToShow].classList.add('show'); // 將要顯示的 img 加入 class="show"
            };

            function showNext() {
                counter++; // 將 counter+1 指定下一張圖
                showCurrent();
            }

            function showPrev() {
                counter--; // 將 counter－1 指定上一張圖
                showCurrent();
            }

            // 滑鼠移到 #slider 上方時，停止循環計時
            slide.addEventListener('mouseover', function() {
                interval = clearInterval(interval);
            });

            // 滑鼠離開 #slider 時，重新開始循環計時
            slide.addEventListener('mouseout', function() {
                interval = window.setInterval(showNext, timer);
            });

            // 綁定點擊上一張，下一張按鈕的事件
            nextBtn.addEventListener('click', showNext, false);
            prevBtn.addEventListener('click', showPrev, false);

            // 一開始秀出第一張圖，也可以在 HTML 的第一個 img 裡加上 class="show"
            items[0].classList.add('show');
            $(window).resize(function() {
                $(".card-text").height($(".MAX").height());
                $(".left1").css("display", "inline-flex");
                $(".right1").css("display", "inline-flex");
                $(".left1").css("padding-top", "0");
                $(".right1").css("padding-top", "0");
                $("#fhc").prop("checked", false);

            });
            $("#fhc").change(function() {
                if ($(this).prop("checked")) {
                    $(".left1").css("padding-top", "250px");
                    $(".right1").css("padding-top", "490px");
                } else {
                    $(".left1").css("padding-top", "0px");
                    $(".right1").css("padding-top", "0px");
                }
            });
        });
    </script>
    <style>
        #slide {
            position: relative;
            max-width: 100%;
        }

        #slide img {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            opacity: 0;
            visibility: hidden;
            transition: .8s;
        }

        #slide img:first-child {
            position: static;
        }

        #slide .show {
            opacity: 1;
            visibility: visible;
        }

        #slide .prev,
        #slide .next {
            display: block;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            transition: .4s;
            background-color: rgba(0, 0, 0, .12);
            padding: 14px 12px;
        }

        #slide .prev:hover,
        #slide .next:hover {
            background-color: rgba(0, 0, 0, .24);
        }

        #slide .prev:after,
        #slide .next:after {
            display: block;
            content: "";
            width: 10px;
            height: 10px;
            border-top: 2px solid #fff;
            border-right: 2px solid #fff;
        }

        .prev {
            left: 0;
        }
        .prev:after {
            transform: rotate(-135deg);
            margin-left: 4px;
        }

        .next {
            right: 0;
        }

        .next:after {
            transform: rotate(45deg);
            margin-right: 4px;
        }

        header {
            background-color: #842029;
        }

        header .left1 {
            position: relative;
            display: inline-flex;
            font-size: 1.05rem;
            list-style-type: none;
            margin: 1.25rem 0;
        }

        header .right1 {
            position: relative;
            display: inline-flex;
            font-size: 1.05rem;
            margin-right: 1.25rem;
            list-style-type: none;
            float: right;
            margin: 1.25rem 0;
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

        @media(max-width:1030px) {
            @media(max-height:350px) {
                main {
                    padding-top: 50px;
                }
            }

        }

        @media(max-width:1030px) {
            main {
                padding-top: 50px;
            }

            header .menu {
                position: fixed;
                display: inline-flex !important;
                flex-wrap: nowrap;
                background-color: #842029;
                width: 100%;
                height: 50px;
                z-index: 4;
            }

            #logo {
                display: none;
            }

            .menu a {
                width: 100%;
                text-align: center;
            }

            .fa-bars:before {
                color: white;
                font-size: 1.5rem;
                margin: 10px 10px;
                line-height: 50px;
                z-index: 4;
            }

            #fhc {
                position: absolute;
                top: 10px;
                left: 10px;
                width: 25px;
                height: 25px;
                opacity: 0;
            }

            header .left1 {
                position: fixed;
                display: flex;
                top: -200px;
                margin: 0;
                flex-wrap: wrap;
                flex-direction: column;
                background-color: white;
                padding-left: 0px !important;
                text-align: center;
                width: 100%;
                list-style: none;
                transition: all 0.8s;
                z-index: 3;
            }

            header .right1 {
                position: fixed;
                display: flex;
                top: -241px;
                margin: 0;
                text-align: center;
                flex-direction: column;
                width: 100%;
                background-color: white;
                transition: all 0.8s;
                z-index: 2;
            }

            .left1 a {
                width: 100%;
                margin: 0 auto;
            }

            .right1 span {
                flex-direction: <?php if (isset($_SESSION)) echo "column-reverse";
                                else echo "column" ?>
            }

            .right1 a {
                width: 100%;
                display: block;
                margin: 0 auto;
            }
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }

            @media(max-height:375px) {
                header .menu {
                    height: 35px;
                }
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
            <input type="checkbox" name="fa-bars-hidden-checkbox " id=fhc>
            <a href="../index.php" class="nav-link active" style="font-size:1.55rem; padding:0 0; padding-right:1.25rem;">SKoff。</a>
        </div>

        <!-- <ul class="nav nav-pills py-3" style="width: 65%;"> -->
        <ul class="left1 ">
            <a href="../index.php" class="nav-link active" style="font-size:1.55rem; padding:0 0; padding-right:1.25rem;" id="logo">SKoff。</a>
            <li class="nav-item">
                <form class="nav-link active">
                    <input type="search" placeholder="請輸入商品關鍵字">
                    <button><i class="fa fa-search"></i></button>
                </form>
            </li>
            <!-- <li class="nav-item"><a href="#" class="nav-link active"><img src="./HW/"></a></li> -->
            <li class="nav-item"><a href="../index.php" class="nav-link active">Home</a></li>
            <li class="nav-item d-flex justify-content-center"><a href="About.html" class="nav-link active">Features</a></li>
            <li class="nav-item d-flex justify-content-center"><a href="#main" class="nav-link active js-scroll-trigger">Pricing</a></li>
            <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link active">FAQs</a></li>
            <li class="nav-item d-flex justify-content-center"><a href="About.html" class="nav-link active">About</a></li>
            <span style="display:none" id="custom">
                <?php
                if (isset($_SESSION['userid'])) {
                    echo "<li class=\"nav-item d-flex justify-content-center\"><a href=\"logout.php\" class=\"nav-link\">Sign Out(" . $_SESSION['userid'] . ")</a></li>";
                } else {
                    echo "<li class=\"nav-item d-flex justify-content-center\"><a href=\"SignIn.php\" class=\"nav-link\">Sign Up</a></li>
                    <li class=\"nav-item d-flex justify-content-center\"><a href=\"Rseg3.php\" class=\"nav-link\">Sign In</a></li>";
                }
                ?>
                <li class="nav-item d-flex justify-content-center"><a href="checkout.php" class="nav-link active">Cart</a></li>
            </span>

        </ul>

        <!-- <div class="nav nav-pills py-3 cart" id="custom" style="width: auto; top:-1pt; right:0; z-index: 3; position:absolute;"> -->
        <div class="right1" id="custom">
            <span class="nav-item d-flex justify-content-end cart">
                <a href="Reg3.php" class="nav-link active">Sign Up</a>
                <a href="signin.php" class="nav-link active">Sign In</a>
                <a href="checkout.php" class="nav-link active"><img src="../product_pic/cart.svg" alt="" height="20" width="35" xmlns="http://www.w3.org/2000/svg">CART</a>
            </span>
        </div>
    </header>
    <div id=slide>
        <img src= 'https://picsum.photos/600/300?image=701'>
        <img src= 'https://picsum.photos/600/300?image=702'>
        <img src= 'https://picsum.photos/600/300?image=703'>
    </div>
</body>

</html>