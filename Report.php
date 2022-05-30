<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問題回報</title>
    <link rel="icon" type="image/x-icon" href="assets/build-outline.svg" />
    <!-- <link rel="stylesheet" type="text/css" href="/css/result-light.css"> -->
    <link rel="stylesheet" href="https://bootswatch.com/5/litera/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function($) {
            
            $("[name='send_rep']").click(function() {
                send_mail();
            })
            $("[type='checkbox']").change(function() {
                $("[type='checkbox']").removeAttr('checked');
                $("[type='checkbox']:checked").attr('checked','checked');
            })
            $("[type='radio']").change(function() {
                $("[type='radio']").removeAttr('checked');
                $("[type='radio']:checked").attr('checked','checked');
            })
            
            function send_mail(){
                $('#name').attr('value',$('#name').val());
                $('.form-control').eq(2).attr('value',$('.form-control').eq(2).val());
                $('#inputEmail3').attr('value',$('#inputEmail3').val());
                $('#name').attr('readonly','readonly');
                $('.form-control').eq(2).attr('readonly','readonly');
                $('#inputEmail3').attr('readonly','readonly');
                var f1=$('#rep_form').html();
                // var f1=file_get_contents('rep.php');
                $.ajax({
                    url: "check_mail_ajax.php",
                    data: {
                        "send_rep":f1,
                    },
                    type: 'POST',
                    dataType: "text",
                    success: function(JData) {
                        
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        
                    }
                });
            }
        });
    </script>
    <style>
        .bg-dark {
            background-image: linear-gradient(7deg, #7b92a9bf, #c4d7ec);
        }

        /* .navbar:hover {
            background-image: linear-gradient(159deg, #023265, #697d92);
        } */
        .nav-link {
            font-family: inherit;
        }

        .navbar-brand {
            font-weight: 200;
            text-shadow: 0px 0px 15px #ffffff;
            font-stretch: extra-expanded;
            font-size: large;
            font-weight: 700;
            letter-spacing: 5px;
        }

        @media (max-width:645px) {
            #main-bar {
                display: none;
            }

            #aside {
                display: auto;
            }
        }

        @media(min-width:645px) {
            #main-bar {
                display: auto;
            }

            #aside {
                display: none;
            }
        }
    </style>

</head>

<body>
    <div class="main-bar" id="main-bar">
        <!-- PC上的選單 -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <!-- 看要弄Logo還是要弄怎樣 -->
                    SKoff
                </a>
                <style>
                    form {
                        display: flex;
                        margin: 0 10px;
                        border-radius: 100px;
                        border: 1px solid rgb(255, 255, 255, .4);
                    }

                    form input,
                    form button {
                        border: none;
                        background-color: transparent;
                        color: #fff;
                        padding: 5px 10px;
                    }

                    form input::placeholder,
                    form input::-webkit-input-placeholder {
                        /* padding-left: 1em; */
                        color: #ffffff;
                        letter-spacing: 1px;
                    }

                    form input {
                        width: 230px;
                        font-size: 16pt;
                        padding-left: 1em;
                        letter-spacing: 5px;
                    }

                    form button {
                        width: 50px;
                    }

                    form input:focus,
                    form button:focus {
                        outline: none;
                    }
                </style>
                <form action="index.php" method="post">
                    <input type="search" placeholder="請輸入商品關鍵字" id='keyw' name='keyw'>
                    <button><i class="fa fa-search"></i></button>
                </form>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-navicon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php">首頁
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="About.php">關於我們</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">問題回報</a>
                            <span class="sr-only">(current)</span>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION['user_name'])) {
                                echo '<a class="nav-link" href="logout.php">登出(' . $_SESSION['user_name'] . ')</a>';
                            } else {
                                echo '<a class="nav-link" href="login.php">登入</a>';
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="aside" id="aside">
        <!-- 手機上的選單 -->
        <?php include('Products/t2.php') ?>
        <script>
            $(function(){
                $(".side-menu nav a:eq(0)").attr('href',$(".side-menu nav a:eq(0)").attr('href').substr(3));
                $(".side-menu nav a:eq(1)").attr('href',$(".side-menu nav a:eq(1)").attr('href').substr(3));
                $(".side-menu nav a:eq(2)").attr('href',$(".side-menu nav a:eq(2)").attr('href').substr(3));
                $(".side-menu nav a:eq(3)").attr('href',$(".side-menu nav a:eq(3)").attr('href').substr(3));
                $(".side-menu nav a:eq(4)").attr('href',$(".side-menu nav a:eq(4)").attr('href').substr(3));
                $(".side-menu nav a:eq(5)").attr('href','');
                $(".side-menu nav a:eq(6)").attr('href',$(".side-menu nav a:eq(6)").attr('href').substr(3));
                $(".side-menu nav a:eq(7)").attr('href',$(".side-menu nav a:eq(7)").attr('href').substr(3));
                $(".side-menu nav a:eq(8)").attr('href',$(".side-menu nav a:eq(8)").attr('href').substr(3));
                $(".side-menu nav a:eq(9)").attr('href',$(".side-menu nav a:eq(9)").attr('href').substr(3));
                $("#keyw").closest('form').attr('action',$("#keyw").closest('form').attr('action').substr(3));
            });
        </script>
        <style>
            .side-menu {
                background-image: linear-gradient(0deg, #5a8c85, #004085);
            }

            a:hover {
                color: #b3d7ff;
                ;
                text-decoration: underline;
            }
        </style>
    </div>
    <div id="rep_form">
    <!-- Page Content -->
    <?php include('rep.php'); ?>
    </div>
    <footer class="bg-light py-5">
    <div class="container">
            <div class="small text-center text-muted">
                連絡電話：+886 (555) 123-4567 - 
                聯絡信箱：S0754017@gm.ncue.edu.tw
                 - SKOFF 
            </div>
        </div>
    </footer>
</body>

</html>