<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <title>收合選單</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Noto+Sans+TC:100,300,400,500,700,900&display=swap");
        @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css");
        @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");

        * {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        html,
        body {
            height: 100%;
        }

        .side-menu {
            position: fixed;
            width: 300px;
            height: 100%;
            padding: 50px 0;
            box-sizing: border-box;
            background-image: linear-gradient(0deg, #5a8c85, #983838);
            display: flex;
            flex-direction: column;
            box-shadow: 5px 0px 10px hsla(240, 40%, 15%, .6);
            transform: translateX(-100%);
            transition: .3s;
            z-index: 9;
        }
        @media (min-width:992px){
            .side-menu{
                display:none;
            }
        }
        .side-menu form {
            display: flex;
            margin: 0 10px 50px;
            border-radius: 100px;
            border: 1px solid rgb(255, 255, 255, .4);
        }

        .side-menu form input,
        .side-menu form button {
            border: none;
            background-color: transparent;
            color: #fff;
            padding: 5px 10px;
        }

        .side-menu form input {
            width: 230px;
            font-size: 16pt;
            padding-left: 1em;
            letter-spacing: 5px;

        }

        ::placeholder,
        ::-webkit-input-placeholder {
            /* padding-left: 1em; */
            color: #bababa;
            letter-spacing: 1px;
        }



        .side-menu form button {
            width: 50px;
        }

        .side-menu form input:focus,
        .side-menu form button:focus {
            outline: none;
        }

        .side-menu label {
            position: absolute;
            width: 40px;
            height: 80px;
            background-color: #000;
            color: #fff;
            right: -40px;
            top: 0;
            bottom: 0;
            margin: auto;
            line-height: 80px;
            text-align: center;
            font-size: 30px;
            border-radius: 0 10px 10px 0;
        }

        #side-menu-switch {
            position: absolute;
            opacity: 0;
            z-index: -1;
        }

        #side-menu-switch:checked+.side-menu {
            transform: translateX(0);
        }

        #side-menu-switch:checked+.side-menu label .fa {
            transform: scaleX(-1);
        }

        nav a {
            display: block;
            padding: 10px;
            /* padding-right: 10pt; */
            color: #fff;
            text-decoration: none;
            position: relative;
            font-family: 'Noto Sans TC', sans-serif;
        }

        nav a+a::before {
            content: '';
            position: absolute;
            border-top: 1px solid rgb(255, 255, 255, .4);
            left: 10px;
            right: 10px;
            top: 0;
        }

        nav a .fa {
            margin-right: -1.1em;
            transform: scale(0);
            transition: .3s;
        }

        nav a:hover .fa {
            margin-right: 0em;
            transform: scale(1);
        }
    </style>

</head>

<body>
    <input type="checkbox" name="" id="side-menu-switch">
    <div class="side-menu">
        <form action="../index.php" method="post">
            <input type="search" placeholder="請輸入商品關鍵字" name='keyw' id='keyw'>
            <button><i class="fa fa-search"></i></button>
        </form>
        <nav>
            <?php
            if (isset($_SESSION['user_name'])) {
                echo '<a href="../Cart/cart.php">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                購物車
            </a>';
            } else {
                echo '<a href="../login.php">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                登入
            </a>';
            }
            ?>
            <a href="../index.php">
                <i class="fa fa-home" aria-hidden="true"></i>
                主頁
            </a>
            <a href="../about.php">
                <i class="fa fa-send" aria-hidden="true"></i>
                關於我們
            </a>
            <a href="#">
                <i class="fa fa-female" aria-hidden="true"></i>
                &nbsp給女孩們
            </a>
            <a href="#">
                <i class="fa fa-male" aria-hidden="true"></i>
                &nbsp&nbsp給男孩們
            </a>
            <a href="../board.php">
                <i class="fa fa-group" aria-hidden="true"></i>
                留言板
            </a>
            <a href="../Report.php">
                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                問題回報
            </a>
            <?php
            if (isset($_SESSION['user_name'])) {
                echo '<a href="../member.php">
                <i class="	fa fa-gear" aria-hidden="true"></i>
                設定帳戶
            </a>';
                echo '<a href="../logout.php">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                登出(' . $_SESSION['user_name'] . ')
            </a>';
            }
            ?>
        </nav>
        <label for="side-menu-switch">
            <i class="fa fa-angle-right"></i>
        </label>
    </div>
    <br>

    <!-- <p style="position: fixed;z-index:10; bottom:0; padding: 10px; left:0; right:0; color:#fff;background:#000; text-align:center; font-size:30px;">本文是配合<a href="https://ithelp.ithome.com.tw/users/20112550/ironman/2623" style="color: #fa0;">此教學文章</a>使用的範例，但內容文字所提的都是真實的呦。</p> -->
</body>

</html>