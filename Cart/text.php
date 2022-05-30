<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>收合選單</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Noto+Sans+TC:100,300,400,500,700,900&display=swap");
        @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css");
        @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");

        * {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        html,
        body {
            height: 100%;
        }

        .side-menu2 {
            position: fixed;
            width: 300px;
            height: 100%;
            padding: 50px 0;
            box-sizing: border-box;
            background-image: linear-gradient(0deg, #5a8c85, #983838);
            display: flex;
            flex-direction: column;
            box-shadow: -5px 0px 10px hsla(240, 40%, 15%, .6);
            right:-300px;
            /* transform: translateX(-100%); */
            transition: .3s;
            z-index: 9;
        }

        .side-menu2 form {
            display: flex;
            margin: 0 10px 50px;
            border-radius: 100px;
            border: 1px solid rgb(255, 255, 255, .4);
        }

        .side-menu2 form input,
        .side-menu2 form button {
            border: none;
            background-color: transparent;
            color: #fff;
            padding: 5px 10px;
        }

        .side-menu2 form input {
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



        .side-menu2 form button {
            width: 50px;
        }

        .side-menu2 form input:focus,
        .side-menu2 form button:focus {
            outline: none;
        }

        .side-menu2 label {
            position: absolute;
            width: 40px;
            height: 80px;
            background-color: #000;
            color: #fff;
            left: -40px;
            transform:rotateY(180deg);
            /* transform:rotateX(180deg); */
            top: 0;
            bottom: 0;
            margin: auto;
            line-height: 80px;
            text-align: center;
            font-size: 30px;
            border-radius: 0 10px 10px 0;
        }

        #side-menu2-switch {
            position: absolute;
            opacity: 0;
            z-index: -1;
        }

        #side-menu2-switch:checked+.side-menu2 {
            transform: translateX(-300px);
        }

        #side-menu2-switch:checked+.side-menu2 label .fa {
            transform: scaleX(-1);
        }

        #side-menu2 nav a,
        #side-menu2 li.list-group-item {
            display: block;
            padding: 10px;
            /* padding-right: 10pt; */
            color: #fff;
            text-decoration: none;
            position: relative;
        }

        #side-menu2 nav a+a::before,
        #side-menu2 li.list-group-item a+a::before {
            content: '';
            position: absolute;
            border-top: 1px solid rgb(255, 255, 255, .4);
            left: 10px;
            right: 10px;
            top: 0;
        }

        #checkout {
            padding-top: 1rem;
            text-align: end;
            margin-right: 1rem;
        }

        #checkout:hover {
            color: #ffffff;
            font-weight: 600;
            text-decoration: underline;
            margin-right: 1.1rem;
        }

        #checkout:hover .bi {
            margin-right: 0em;
            transform: scale(1);
            color: #ffffff;
        }

        nav a .bi {
            margin-right: -1.4rem;
            color: transparent;
            transform: scale(0);
            transition: .3s;
        }

        li.list-group-item a .bi {
            margin-right: -1.1em;
            transform: scale(0);
            transition: .3s;
        }

        li.list-group-item a {
            display: block;
            padding: 10px;
            padding-left: 0;
            /* padding-right: 10pt; */
            color: #fff;
            text-decoration: none;
            position: relative;
            word-break: keep-all;
            text-overflow: ellipsis;
            overflow: auto;
            width: 90%;
            font-size: 14pt;
            text-align: left;
        }



        nav a:hover .fa,
        li.list-group-item a:hover .bi {
            margin-right: 0em;
            transform: scale(1);
        }

        .list-group-item {
            background-color: transparent;
            color: #fff;
        }

        .btn-link {
            color: #fff;
        }

        .btn-link:hover {
            color: #fff;
            /* font-weight: bold; */
        }

        h4 {
            color: #fff;
            padding: 16px 20px;
            font-size: 18pt;
        }
    </style>

</head>

<body>
    <input type="checkbox" name="" id="side-menu2-switch">
    <div class="side-menu2">
        <!-- <form>
            <input type="search" placeholder="請輸入商品關鍵字">
            <button><i class="fa fa-search"></i></button>
        </form> -->
        <h4><i class="bi bi-cart3"></i> &nbsp;購物車</h4>
        <nav>
            <ul class="list-group list-group-flush" id="example">
                <?php if (isset($_SESSION['cart_id']))
                    for ($i = 0; $i < count($_SESSION['cart_id']); $i++) {
                        $d = $_SESSION['cart_id'][$i];
                        $pos2 = stripos($_SESSION['products']['name'][$d], "】");
                        if($pos2!==false)
                            $name = substr($_SESSION['products']['name'][$d], $pos2 + 3); //二次過濾
                        $pos = stripos($name, "-");
                        if($pos!==false)
                            $name = substr($name, $pos + 1);
                            
                        // $name = substr($_SESSION['products']['name'][$d], $pos + 1);
                        echo "<li class = 'list-group-item d-flex justify-content-between align-items-center'>";
                        echo "<a class='btn btn-link' href='Product_template.php?product_no=" . $d . "'>";
                        echo  $name . "</a>";
                        echo "<span class ='badge badge-primary badge-pill'>" . $_SESSION['tmp_num'][$i] . "</span>";
                        echo"<h7 name='p_id".$d."' style='display:none' >".$d."</h7>";
                        echo "</li>";
                    }
                ?>
                <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="btn btn-link" href="#">絕對伏特加</a>
                    <span class="badge badge-primary badge-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="btn btn-link" href="#">藍色海洋風格蛋糕</a>

                    <span class="badge badge-primary badge-pill">2</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="btn btn-link" href="#">男人系冷色調風格蛋糕</a>

                    <span class="badge badge-primary badge-pill">1</span>
                </li> -->
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    總價
                    <span>NT$&nbsp;<span id="tot_price"><?php if (!isset($_SESSION['tot_price'])) echo "0";
                                                        else echo $_SESSION['tot_price']; ?></span></span>
                </li>
            </ul>
            <a href="../Cart/cart.php" id="checkout">去結帳<i class="bi bi-arrow-bar-right"></i></a>
        </nav>
        <label for="side-menu2-switch">
            <i class="fa fa-angle-right"></i>
        </label>
    </div>
    <br>

    <!-- <p style="position: fixed;z-index:10; bottom:0; padding: 10px; left:0; right:0; color:#fff;background:#000; text-align:center; font-size:30px;">本文是配合<a href="https://ithelp.ithome.com.tw/users/20112550/ironman/2623" style="color: #fa0;">此教學文章</a>使用的範例，但內容文字所提的都是真實的呦。</p> -->
</body>

</html>