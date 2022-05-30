<?php
session_start();
if (isset($_GET['product_no'])) {
    find($_GET['product_no']);
    $tag_arr = array('客製化','酒鬼', '草莓', '旅行', '人魚', '海洋', '男人','巧克力');
    $tags="";
    for ($i = 0; $i < count($tag_arr); $i++)
        if (strpos($_GET['product_name'], $tag_arr[$i]) !== false or strpos($_GET['description'], $tag_arr[$i])) {
            $tag = $tag_arr[$i];
            $tags.='<a href="#" class="btn btn-default" ><span class="glyphicon glyphicon-tags">'.$tag.'</span></a>';
        }
    if($tags==""){
        $tag = "蛋糕";
        $tags.='<a href="#" class="btn btn-default" ><span class="glyphicon glyphicon-tags">'.$tag.'</span></a>';
    }
}
$_SESSION['tot_price'] = 0;
$price = $_SESSION['products']['price'];
if (isset($_SESSION['cart_id']) && isset($_SESSION['tmp_num']))
    for ($i = 0; $i < count($_SESSION['cart_id']); $i++) {
        $p_id = $_SESSION['cart_id'][$i];
        $_SESSION['tot_price'] += (intval(str_replace(",", "", $price[$p_id])) * $_SESSION['tmp_num'][$i]);
    }
function find($no)
{
    include('../Link_sql.php');
    // 送出查詢的SQL指令
    $sql = "SELECT * FROM product_list where id = '" . $no . "'";
    if ($result = mysqli_query($link, $sql)) {
        $row = mysqli_fetch_assoc($result);
        $_GET['product_name'] = $row['p_name'];
        $_GET['product_price'] = $row['p_price'];
        $_GET['file_name'] = $row['file_name'];
        $_GET['left_quantity'] = $row['stock'];
        $_GET['short_description'] = $row['p_intro'];
        $_GET['description'] = $row['p_intro_long'];
    }
    mysqli_free_result($result); // 釋放佔用的記憶體
    mysqli_close($link); // 關閉資料庫連結
}
// $arr_cart = array_filter(explode(",", $_SESSION['cart']));
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php error_reporting(0); ?>
    <title><?php echo $product_name ?></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/small-business.css" rel="stylesheet">
    <link href="../bootstrap/css/product.css" rel="stylesheet">
    <script src="../bootstrap/js/sweetalert.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/sweetalert.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="canonical" href="//mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/compiled-4.19.1.min.css" />
    <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../bootstrap/js/cart.js"></script>
    <style>
        .card.h-100 {
            border-radius: 10px;
        }

        .card.h-100 a img:hover {
            transform: scale(1.03, 1.03);
            transition: all 0.3s ease-out;
        }

        .card.h-100 a {
            overflow: hidden;
        }

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

        @media(min-width:992px) {
            /* #side_bar {
                display: none;
            } */

            #nav_top {
                display: block;
            }

            body {
                padding-top: 56px;
                /* background-color: whitesmoke; */
            }
        }

        @media(max-width:992px) {
            #side_bar {
                display: flex;
            }

            #nav_top {
                display: none;
            }

            body {
                padding-top: 2em !important;
                background-color: whitesmoke;
            }
        }

        .cart a {
            color: #ffffff;
        }

        div.nav .nav-pills .py-3 .cart {
            padding: 12pt 0 !important;
        }

        .cart a.nav-link {
            padding: 12px;
        }

        .menu {
            display: none;
            z-index: 2;
        }

        .btn-default {
            width: fit-content;
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

        @media (max-width:1199px) {
            .intl-shipping-info .form-select {
                width: 80%;
            }
        }

        nav a+a::before {
            border-top: 0px !important;
        }

        .dropdown-item {
            font-size: 16pt;
            color: #6f7a85;
        }

        div.dropdown-menu.show {
            border-radius: 5pt;
        }

        .navbar-brand {
            height: auto;
        }

        .nav-item {
            padding-right: 2rem;
        }
    </style>
</head>

<body onload="checksize()">
    <!-- #842029 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-darkred fixed-top" id="nav_top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">SKoff。</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="../index.php">首頁</a></li>
                    <li class="nav-item"><a class="nav-link" href="../About.php">關於我們</a> </li>
                    <li class="nav-item"><a class="nav-link" href="../board.php">留言板</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Report.php">問題回報</a></li>
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        echo "<li class=\"nav-item dropdown\">" .
                            "<a class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"></a>" .
                            "<div class=\"dropdown-menu\">" .
                            " <a class=\"dropdown-item\" href=\"../Cart/cart.php \"><i class=\"bi bi-cart3\"></i> 購物車</a>" .
                            "<a class=\"dropdown-item\" href=\"../member.php\"><i class=\"bi bi-gear\"></i> 帳戶設定</a>
                        <a class=\"dropdown-item\" href=\"../order_search.php\"><i class=\"bi bi-layers-half\"></i> 訂單查詢</a>
                        <div class=\"dropdown-divider\"></div>
                        <a class=\"dropdown-item\" href=\"../Report.php\"><i class=\"bi bi-question-circle\"></i> 問題回報</a>
                    </div>
                </li>";
                    }
                    ?>
                </ul>

            </div>

            <span class="nav-item d-flex justify-content-end cart">
                <?php
                if (isset($_SESSION['user_name'])) {
                    echo '<a href="../logout.php" class="nav-link">登出(' . $_SESSION['user_name'] . ')</a>
                    <a href="../Cart/cart.php" class="nav-link">
                    <img src="../product_pic/cart.svg" alt="" height="35" width="35" xmlns="http://www.w3.org/2000/svg">
                    購物車 <span id="cart_cnt" class="badge rounded-pill alert-danger">';
                    if (isset($_SESSION['total']) && $_SESSION['total'] > 0) echo $_SESSION['total'];
                    echo '</span></a>';
                } else {
                    echo "<a href=\"../login.php\" class=\"nav-link\">登入</a>";
                }
                ?>
            </span>
        </div>
    </nav>

    <script>
        function checksize() {
            if ($(window).width() > 1199) {
                $('#S').html($('#hide').html());
                $('#H').html('');
            } else {
                $('#H').html($('#hide').html());
                $('#S').html('');
            }
            var hc = $(".card.h-100:eq(0)").find("img").height();
            for (var i = 0; i < 3; i++) {
                if (hc > $(".card.h-100:eq(" + i + ")").find("img").height()) {
                    // alert("1");
                    hc = $(".card.h-100:eq(" + i + ")").find("img").height();
                } else {
                    // alert("2");
                }
            }
            for (var i = 0; i < 3; i++) {
                $(".card.h-100:eq(" + i + ")").find("img").height(hc);
            }
        }
        $(function() {
            $(window).resize(function() {
                if ($(window).width() <= 1199) {
                    $('#H').html($('#hide').html());
                    $('#S').html('');
                } else {
                    $('#S').html($('#hide').html());
                    $('#H').html('');
                }
            });
            $('.tags').find('a').click(function(){
                $('[name="keyw"]').attr('value',$(this).text());
                $('#tag').submit();
            });
        });

        function cart(oper, quant, id) {
            $.ajax({
                url: '../Cart/cart_ajax.php',
                data: {
                    oper: oper,
                    add: quant, //1:add 2:remove
                    id: id //商品id
                },
                type: 'POST',
                dataType: "json",
                success: function(Jdata) {
                    // var total = 0;
                    // // for (var i = 1; i <=Jdata; i++) {
                    // //     total += Jdata[i];
                    // //     document.write(Jdata[i] + " ");
                    // // }
                    // for (var ind in Jdata) {
                    //     total += parseInt(Jdata[ind]);
                    //     // alert(total);
                    //     // total++;
                    // }
                    var total = 0;
                    if (parseInt($("#cart_cnt").html())) {
                        total = parseInt($("#cart_cnt").html());
                    }
                    total += parseInt(quant);
                    if (oper == 2) {
                        $('[name="_quantity"]').get(0).selectedIndex = 0; //數量回歸
                    }
                    if (total != 0) {
                        $("#cart_cnt").html(total); //顯示購物車物品數量

                    } else {
                        $("#cart_cnt").html(''); //顯示購物車物品數量
                    }
                    var new_tot = parseInt($('[name="p_id' + id + '"]').parent().find('span').html());
                    new_tot += parseInt(quant);
                    if ($('[name="p_id' + id + '"]').html()) {
                        $('[name="p_id' + id + '"]').parent().find('span').html(new_tot);
                    } else {
                        var name = $('[data-translate="title"]').html();
                        if (name.indexOf('】') >= 0) {
                            name = name.substr(name.indexOf('】') + 1, name.length - 1);
                        }
                        if (name.indexOf('-') >= 0) {
                            name = name.substr(name.indexOf('-') + 1, name.length - 1);
                        }
                        var new_data = "<li class = 'list-group-item d-flex justify-content-between align-items-center'>";
                        new_data += "<a class='btn btn-link' href='Product_template.php?product_no=" + id + "'>";
                        new_data += name + "</a><span class ='badge badge-primary badge-pill'>" + quant + "</span><h7 name='p_id" + id + "' style='display:none' >" + id + "</h7>";
                        new_data += "</li>";
                        if ($('#example').find('li').eq(-2).html())
                            $('#example').find('li').eq(-2).after(new_data);
                        else
                            $('#example').find('li').eq(0).before(new_data);
                    }
                    var price = parseInt($('#tot_price').html());
                    price += parseInt(quant) * parseInt($('.amount').html());
                    $('#tot_price').html(price);
                    // if (oper == 1) {
                    //     $("[name='add']").css("display", "none");
                    //     $("[name='remove']").css("display", "block");
                    // } else {
                    //     $("[name='add']").css("display", "block");
                    //     $("[name='remove']").css("display", "none");
                    // }
                },
                error: function(xhr, ajaxOptions, thrownError) {}
            });
        }
    </script>
    <style>
        mark {
            font-size: 20pt;
        }

        @media (max-width:1199px) {
            .n-product #main {
                width: 90%;
                margin: 0 auto;
            }

            .n-product #sider {
                width: 90%;
                margin: 0 auto;

            }
        }
    </style>
    <div id="side_bar">
        <?php include('t2.php') ?>
        <?php if (isset($_SESSION["user_name"])) include('../Cart/text.php') ?>
    </div>

    <!-- Page Content -->
    <div class="container">
        <div class="n-product">
            <div class="row my-5 mx-auto">
                <!-- <form action="" name="form1" id="form1" method="POST" novalidate="novalidate" enctype="multipart/form-data">
      </form> -->
                <!-- Heading Row -->
                <div id="main">
                    <div class="main-inner">

                        <img class="img-fluid rounded mb-4" src="../<?php echo $_GET['file_name']; ?>" alt="">

                        <div id="scroll-hooks-advanced-info" data-sticky-target="advanced-info" data-tracking-seen="advanced-info">
                            <span id="H">

                            </span>
                            <div class="m-box m-box-main m-product-advanced-info">

                                <h2 class="m-box-title">運費與其他資訊</h2>
                                <div class="m-box-body">
                                    <dl class="m-product-list m-product-list-main">

                                        <div class="js-block-intl-shipping-react m-product-list-item " data-props="">
                                            <div class="intl-shipping-info">
                                                <dt class="m-product-list-title">商品運費</dt>
                                                <dd class="m-product-list-content g-lazy-fadein">
                                                    <div class="intl-shipping-info-hd">
                                                        <div class="intl-shipping-info-title">從 <select class="form-select">
                                                                <option value="" disabled="">選擇國家/地區</option>
                                                                <option value="TW">台灣</option>
                                                                <option value="CN">中國大陸</option>
                                                                <option value="HK">香港</option>
                                                                <option value="JP">日本</option>
                                                                <option value="US">美國</option>
                                                            </select> 寄出，寄往：</div>
                                                        <div class="intl-shipping-info-ctrl">
                                                            <div class="m-react-select s-web-native s-fullwidth">
                                                                <select class="form-select">
                                                                    <option value="" disabled="">選擇國家/地區</option>
                                                                    <option value="TW">台灣</option>
                                                                    <option value="CN">中國大陸</option>
                                                                    <option value="HK">香港</option>
                                                                    <option value="JP">日本</option>
                                                                    <option value="US">美國</option>
                                                                </select>
                                                                <div class="select-replace"><span class="text">台灣</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="intl-shipping-info-bd">
                                                        <div class="m-carriers-table">
                                                            <div class="m-carriers-table__hd">
                                                                <div class="m-carriers-table__row">
                                                                    <div class="m-carriers-table__col method">運送方式</div>
                                                                    <div class="m-carriers-table__col fees1">首件運費</div>
                                                                    <div class="m-carriers-table__col fees2">續件加收</div>
                                                                </div>
                                                            </div>
                                                            <div class="m-carriers-table__bd">
                                                                <div class="m-carriers-table__row m-carriers-table__item">
                                                                    <div class="m-carriers-table__col method">宅配</div>
                                                                    <div class="m-carriers-table__col fees1">NT$ 225</div>
                                                                    <div class="m-carriers-table__col fees2">NT$ 0</div>
                                                                    <div class="m-carriers-table__col tipinfo">滿 NT$ 1,000 後，運費統一 NT$ 225<br>滿 NT$ 3,000 <font style="color: #F16C5D">免運費</font>
                                                                    </div>
                                                                </div>
                                                                <div class="m-carriers-table__ft">實際運費金額以購物車結算或是到貨時收取的金額為準。</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </dd>
                                            </div>
                                        </div>

                                        <div class="m-product-list-item">
                                            <dt class="m-product-list-title">付款方式</dt>
                                            <dd class="m-product-list-content payment-method">
                                                新增信用卡快速付款, 信用卡安全加密付款, 7-11 ibon 代碼繳費, ATM 轉帳繳費, 全家 FamiPort 代碼繳費, 信用卡分期 (3 期零利率), 信用卡分期 (6 期零利率), LINE Pay, Alipay 支付寶
                                            </dd>
                                        </div>

                                        <div class="m-product-list-item">
                                            <dt class="m-product-list-title">退款換貨須知</dt>
                                            <dd class="m-product-list-content">
                                                <a data-click="show-policy" data-sid="lm-dessert" href="#">點我了解退款換貨須知</a>
                                            </dd>
                                        </div>

                                        <div class="m-product-list-item tags">
                                            <dt class="m-product-list-title">商品標籤</dt>
                                            <dd class="m-product-list-content">
                                                <form action="../index.php" method="post" id='tag' style="display:flex;flex-wrap:wrap">
                                                    <input style="display:none;" name="keyw">
                                                    <?php echo $tags; ?>
                                                    <!-- <button type="button" class="btn btn-outline-secondary waves-effect">Secondary</button>  -->
                                                    <!-- <a class="m-tag" href="/store/lm-dessert?tag=%E5%AE%A2%E8%A3%BD%E8%9B%8B%E7%B3%95&amp;i18n_tag=%E5%AE%A2%E8%A3%BD%E8%9B%8B%E7%B3%95">客製蛋糕</a><a class="m-tag" href="/store/lm-dessert?tag=%E7%94%9F%E6%97%A5%E8%9B%8B%E7%B3%95&amp;i18n_tag=%E7%94%9F%E6%97%A5%E8%9B%8B%E7%B3%95">生日蛋糕</a><a class="m-tag" href="/store/lm-dessert?tag=%E9%85%92%E9%AC%BC%E8%9B%8B%E7%B3%95&amp;i18n_tag=%E9%85%92%E9%AC%BC%E8%9B%8B%E7%B3%95">酒鬼蛋糕</a> -->
                                                </form>
                                            </dd>
                                        </div>

                                        <div class="m-product-list-item">
                                            <dt class="m-product-list-title">問題回報</dt>
                                            <dd class="m-product-list-content">
                                                <!-- <a id="report-flag" class="report-flag" data-target-id="gvGYkxG4">我要檢舉此商品</a> -->
                                            </dd>
                                        </div>

                                    </dl>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="sider">
                    <span id="S">

                    </span>
                </div>
            </div>
            <hr>
            <div class="row recommend">
                <p class="text-body">您也許也喜歡...</p>

                <?php
                $rad[0] = mt_rand(1, 12);
                $rad[1] = mt_rand(1, 12);
                $rad[2] = mt_rand(1, 12);
                while ($rad[0] == $_GET['product_no']) $rad[0] = mt_rand(1, 12);
                while ($rad[0] == $rad[1] || $rad[1] == $_GET['product_no']) $rad[1] = mt_rand(1, 12);
                while ($rad[2] == $rad[0] || $rad[2] == $rad[1] || $rad[2] == $_GET['product_no']) $rad[2] = mt_rand(1, 12);

                $name = array();
                $price = array();
                $filepath = array();

                include('../Link_sql.php');
                // 送出查詢的SQL指令
                for ($i = 0; $i < 3; $i++) {
                    $sql = "SELECT * FROM product_list where id = '" .
                        $rad[$i] . "'";
                    if ($result = mysqli_query($link, $sql)) {
                        $row = mysqli_fetch_assoc($result);
                        // $name[$i] = $row['p_name'];
                        // $price[$i] = $row['p_price'];
                        // $filepath[$i] = $row['file_name'];

                        echo "<div class=\"col-md-4 mb-5\"><div class=\"card h-100\">";
                        echo "<a href=\"Product" . $rad[$i] . ".php\" class=\"bd-placeholder-img card-img-top\">" . "<img src=\"../" . $row['file_name'] . "\"" . " width=\"100%\"></a>";

                        echo "<div class=\"card-body\">
                        <p class=\"card-text\">" . $row['p_name'] . "</p>
                        <div class=\"d-flex justify-content-between align-items-center\">
                            <mark class=\"text-body fw-bold\">NT$ " . $row['p_price'] . "</mark>
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <a href=\"Product_template.php?product_no=$rad[$i]\" class=\"btn btn-outline-danger btn-sm\">More Info</a></div></div></div>";
                    }
                }
                mysqli_free_result($result); // 釋放佔用的記憶體
                mysqli_close($link); // 關閉資料庫連結


                ?>


            </div>
            <!-- /.col-lg-8 -->

            <!-- /.col-md-4 -->
            <!-- 商品介紹 -->

        </div>
    </div>
    <div style="display: none;">
        <span id="hide">
            <div class="m-product-main-info m-box test-product-main-info">
                <h1 class="title translate"><span data-translate="title"><?php echo $_GET['product_name']; ?></span></h1>
                <div class="price">
                    <span class="symbol">NT$ </span>
                    <span class="amount"><?php echo $_GET['product_price'] ?></span>
                </div>
                <div class="action">
                    <div class="quantity">
                        <label for="_quantity">數量</label>
                        <select name="_quantity" class="form-select js-quantity-select" id="_quantity" data-change="quantity-select">
                            <?php
                            // for ($i = 1; $i <= $_GET['left_quantity']; $i++) {
                            //     if (isset($_SESSION['cart']) && in_array($_GET['product_no'], explode(',', $_SESSION['cart'])) && $i == $_SESSION['tmp_num'][array_search($_GET['product_no'], $_SESSION['cart_id'])])
                            //         echo "<option value = '$i' selected>{$i}</option>";
                            //     else echo "<option value = '$i'>{$i}</option>";
                            // }
                            for ($i = 1; $i <= $_GET['left_quantity']; $i++) {
                                if ($i == 1)
                                    echo "<option value = '$i' selected>{$i}</option>";
                                else echo "<option value = '$i'>{$i}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <button id="p<?php echo $_GET['product_no']; ?>" name='add' <?php if (isset($_SESSION['user_name'])) echo "onclick=\"cart(1,document.getElementById('_quantity').value," . $_GET['product_no'] . ")\"";
                                                                            else echo 'onclick=location.href="../login.php"'; ?> class="btn btn-outline-danger add_to_cart quantity" href="#" data-click="buy"><svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.494 4.552a.625.625 0 0 1 .105.546l-1.484 5.364a.625.625 0 0 1-.603.458H7.817l.03.088c.041.119.047.245.015.365l-.385 1.474h8.53v1.25h-9.34a.627.627 0 0 1-.605-.783l.543-2.072-2.603-7.405H2.153v-1.25h2.292c.265 0 .502.167.59.417l.457 1.302h11.505c.195 0 .38.09.497.246zM15.037 9.67l1.139-4.114H5.93L7.377 9.67zm-6.391 6.718a1.25 1.25 0 1 1-2.501 0 1.25 1.25 0 0 1 2.5 0zm7.361 0a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0z" fill="#39393e" class="color"></path>
                    </svg>Add in Cart!</button>
                <!-- <button type="button" class="btn btn-outline-dark go_to_cart quantity" onclick='location.href=<?php if (isset($_SESSION["user_name"])) echo $_SESSION["user_name"] ?>"../cart.php"'>Go to Cart</button> -->
                <ul class="note">
                    <li>本商品為「接單訂製」。付款後，從開始製作到寄出商品為 14 個工作天。（不包含假日）
                    </li>
                </ul>

            </div>
            <div id="scroll-hooks-detail" data-sticky-target="detail" data-tracking-seen="detail">

                <div id="js-block-detail" class="m-box m-box-main m-product-detail">
                    <h2 class="m-box-title">商品介紹</h2>
                    <div class="m-box-body">
                        <div class="js-lazy-init richtext-content s-inited">
                            <div>
                                <div id="description" class="m-product-detail-content js-detail-content" data-more="閱讀更多" data-close="收合" style="min-height: auto;overflow-y: auto;">
                                    <div class="m-richtext js-detail-content-inner"><br>
                                        <div data-translate="description"><?php echo $_GET['description']; ?>></div><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 商品資訊 -->
            <div class="m-product-basic-info m-box">
                <h2 class="m-box-title">商品資訊</h2>
                <div class="m-product-list">
                    <dl class="m-product-list">

                        <div class="m-product-list-item">
                            <dt class="m-product-list-title">
                                製造方式
                            </dt>
                            <dd class="m-product-list-content">
                                手工製造
                            </dd>
                        </div>
                        <div class="m-product-list-item">
                            <dt class="m-product-list-title">
                                商品產地
                            </dt>
                            <dd class="m-product-list-content">
                                台灣
                            </dd>
                        </div>

                        <div class="m-product-list-item">
                            <dt class="m-product-list-title">
                                商品特點
                            </dt>
                            <dd class="m-product-list-content">
                                有提供客製服務
                            </dd>
                        </div>

                        <div class="m-product-list-item">
                            <dt class="m-product-list-title">
                                庫存
                            </dt>
                            <dd class="m-product-list-content">
                                剩最後 <?php echo $_GET['left_quantity'] ?> 件
                            </dd>
                        </div>

                        <div class="m-product-list-item">
                            <dt class="m-product-list-title">
                                商品摘要
                            </dt>
                            <dd class="m-product-list-content" data-translate="short_description">
                                <?php echo $_GET['short_description']; ?>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </span>

    </div>
    <!-- Footer -->
    <footer class="py-3 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../jquery/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>