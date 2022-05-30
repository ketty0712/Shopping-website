<?php 
    session_start();
    include('Link_sql.php');
    $sql='select count(*) from m_info';
    if($result = mysqli_query($link, $sql)){
         $row=mysqli_fetch_row($result);
         $m_total=$row[0];
    }
    $sql='select sum(quan) from p_order';
    if($result = mysqli_query($link, $sql)){
        $row=mysqli_fetch_row($result);
        $item_total=$row[0];
   }
    
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>About SKoff</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="//use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 400) {
                    $('.fixed-bottom').fadeIn();
                } else {
                    $('.fixed-bottom').fadeOut();
                }
            });
            $('.portfolio-box').click(function(){
                $('#keyf').find('input').attr('value',$(this).attr('value'));
                $('#keyf').submit();                
            })
        });
    </script>
    <!-- Google fonts-->
    <link href="//fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="bootstrap/css/styles.css" rel="stylesheet" />
    <link href="bootstrap/css/about.css" rel="stylesheet" />

    <!-- <link href="bootstrap/css/refer2.css" rel="stylesheet" /> -->
</head>
<style>
    @media (min-width: 992px) {
        #mainNav .navbar-brand {
            /* color: #842029; */
            color: rgba(255, 255, 255, 0.7);
        }
        #mainNav .navbar-nav .nav-item .nav-link {
            /* color: #842029; */
            color: rgba(255, 255, 255, 0.7);
        }
    }
    
    body {
        padding: 0 13%;
        background-color: #E3E3E3;
    }
    
    .b2 {
        background-image: url("product_pic/about_pic7.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    #portfolio {
        box-shadow: 5px 0px 10px hsla(240, 40%, 15%, .6);
    }
    
    .img-fluid {
        display: flex;
        justify-self: center;
        align-content: center;
        width: 100%;
        min-height: 240px;
        max-height: 240px;
        object-fit: fill;
    }
    
    .fixed-bottom {
        left: auto;
        right: 10px;
        bottom: 20px;
    }
    
    @media (max-width: 785px) {
        .img-fluid {
            min-height: 226px;
            max-height: 226px;
        }
    }
    
    .portfolio-box {
        min-height: 226px;
    }
</style>

<body id="page-top">
    <a class="navbar-brand js-scroll-trigger fixed-bottom" href="#page-top"><svg xmlns="http://www.w3.org/2000/svg " width="30 " height="30 " fill="currentColor " class="bi bi-arrow-bar-up " viewBox="0 0 16 16 ">
        <path fill-rule="evenodd " d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z "/>
      </svg>
    </a>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">SKoff。</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php">首頁</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">服務</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="board.php">留言板</a></li>
                    <?php 
                    if(!isset($_SESSION['user_name']))
                    echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="login.php">登入</a></li>';
                    else echo '<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php">登出('.$_SESSION['user_name'].')</a></li>';
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">您最喜歡的主題式蛋糕全都在<br>SKoff的世界
                    </h1>
                    <hr class="divider my-4" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">幫助您成為 SKoffian 來訂購商品。趕快加入我們！一起體驗SKOFF為您打造的美味新世界!</p>
                    </p>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="index.php">更多內容</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container">
            <div class="row justify-content-center n-about">
                <div class="stats">

                    <ul>
                        <li>主要客群<span>18 - 65 歲</span></li>
                        <li>會員總人數超過<span><?php echo $m_total;?> 人</span></li>
                        <li>已招募設計師<span>2 位</span></li>
                        <li>賣出商品超過<span><?php echo $item_total;?> 件</span></li>
                        <li>販售至<span>全球 1 國</span></li>
                        <li>App Store 評價<span>? 分 <small>/ 5</small></span></li>
                    </ul>
                </div>
                <!-- <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">We've got what you need!</h2>
                    <hr class="divider light my-4" />
                    <p class="text-white-50 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>
                    <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">服務內容</h2>
            <hr class="divider my-4" />
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-birthday-cake text-primary mb-4"></i>
                        <h3 class="h4 mb-2">主題蛋糕</h3>
                        <p class="text-muted mb-0">定期推出全新主題的一系列蛋糕，時時驚艷您的味蕾!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-boxes text-primary mb-4"></i>
                        <h3 class="h4 mb-2">安心配送</h3>
                        <p class="text-muted mb-0">商品運送有完善的章程與品管，讓您收到的商品都是最佳的狀態!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                        <h3 class="h4 mb-2">全球響應</h3>
                        <p class="text-muted mb-0">在世界的任何角落，都能夠加入我們的會員並定購!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">用心製作</h3>
                        <p class="text-muted mb-0">懷著美好的心情，為您鑄造一個價值的永恆。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6">
                    <form style="display:none;" id="keyf" action="index.php" method="post"><input name='keyw'></form>
                    <a class="portfolio-box" value="海洋">
                        <img class="img-fluid" src="product_pic/about_pic6.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Ocean</div>
                            <div class="project-name">海洋主題蛋糕</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" value="酒鬼">
                        <img class="img-fluid" src="product_pic/about_pic5.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Revel</div>
                            <div class="project-name">酒鬼系列蛋糕</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" value="旅行">
                        <img class="img-fluid" src="product_pic/about_pic3.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">travel </div>
                            <div class="project-name">旅行小點</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" value="客製化">
                        <img class="img-fluid" src="product_pic/about_pic2.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Special</div>
                            <div class="project-name">客製化蛋糕</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" value="巧克力">
                        <img class="img-fluid" src="product_pic/about_pic4.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Chocolate</div>
                            <div class="project-name">巧克力系列</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" value="草莓">
                        <img class="img-fluid" src="product_pic/about_pic1.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">季節限定</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to action-->
    <div class="b2">
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">全市配送免運費!</h2>
                <!-- <a class="btn btn-light btn-xl" href="https://www.pinkoi.com/store/lm-dessert">Go to Real Website!</a> -->
                <a class="btn btn-light btn-xl" href="index.php">馬上去逛逛!</a>
            </div>
        </section>
    </div>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">聯絡我們!</h2>
                    <hr class="divider my-4" />
                    <p class="text-muted mb-5">想要訂製專屬於你的蛋糕? 想要應徵蛋糕設計師? 對商品有任何特別的建議或回饋?<br>請立即聯絡我們來讓它實現!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div>+886 (555) 123-4567</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                    <a class="d-block" href="mailto:S0754017@gm.ncue.edu.tw">S0754017@gm.ncue.edu.tw</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">
                Copyright &copy;
                <!-- This script automatically adds the current year to your website footer-->
                <!-- (credit: https://updateyourfooter.com/)-->
                <script>
                    document.write(new Date().getFullYear());
                </script>
                - SKOFF | design by 汪楷庭、何采玲
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script> -->
    <!-- Core theme JS-->
    <script src="bootstrap/js/scripts.js"></script>

</body>

</html>