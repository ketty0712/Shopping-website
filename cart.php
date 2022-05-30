<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>
    <link rel="icon" type="image/x-icon" href="assets/cart3.svg" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        $(document).ready(function($) {
            var count;
            var this_item_cnt;
            var this_item_id;
            var price = [1680, 1580, 1380, 1680, 1680, 2150, 220, 250, 650, 1880, 2980, 1580];
            $(".input-group").find("input").keyup(function() {
                var max = 100;
                var ind = parseInt($(this).attr('name')) - 1;
                var re = /^[0-9] .?[0-9]*/; //正規
                count = $(this).val();
                max = parseInt($(this).closest(".input-group").find('[name="p_q"]').html());
                if (!re.test(count) && count.length != 0 && !isNaN(parseInt(count))) {
                    count = parseInt(count);
                    if (count > max) {
                        $(this).val(max);
                        count = max;
                    } else if (count < 1) {
                        $(this).val(1);
                        count = 1;
                    }
                    $(this).attr('value', count);
                    $(this).val(count);
                } else {
                    count = 1;
                    $(this).attr('value', count);
                }
                cart(count, $(this).attr('name')); //存session
                //改小計
                var new_tot = count * price[ind];
                new_tot = new_tot.toLocaleString(); //千分位逗號
                $(this).closest($('.list-group-item')).find($("[name='subtotal']")).text("NT$" + new_tot);
                //改總價
                var tot_cost = 0;
                $("[name='subtotal']").each(function() {
                    tot_cost = tot_cost + parseInt($(this).text().replace(/[^\d]/g, ''));
                    console.log(tot_cost);
                })
                tot_cost = tot_cost.toLocaleString();
                $('#price').text("金額：NT$" + tot_cost);
                //改購買量
                var tot_q = 0;
                $(".input-group").find("input").each(function() {
                    if ($(this).val().replace(/[^\d]/g, '') == '') {
                        tot_q = tot_q + 1;
                    } else tot_q = tot_q + parseInt($(this).val().replace(/[^\d]/g, ''));
                    console.log(tot_q);
                })
                $('#quantity').text("商品數量：" + tot_q);
            })
            $(".input-group").find("input").blur(function() {
                if ($(this).val().replace(/[^\d]/g, '') == '') {
                    $(this).val(1);
                }
            })
            $("[name='add']").click(function() {
                var max = 100;
                this_item_cnt = $(this).closest($(".input-group")).find("input"); //找到單個商品數量框
                max = parseInt($(this).closest(".input-group").find('[name="p_q"]').html());
                count = this_item_cnt.val(); //單個商品數量框的值
                if (count <= max) {
                    count++; //數量增加
                    this_item_cnt.attr({
                        "value": count
                    }); //找到改變數量
                    this_item_cnt.val(count);
                    var tmp_tot = $('#price').text();
                    tmp_tot = parseInt(tmp_tot.replace(/[^\d]/g, ''));
                    tmp_tot += price[parseInt(this_item_cnt.attr('name')) - 1];
                    tmp_tot = tmp_tot.toLocaleString();
                    $('#price').text("金額：NT$" + tmp_tot);
                    var q = parseInt($('#quantity').text().replace(/[^\d]/g, ''));
                    $('#quantity').text("商品數量：" + (q + 1));
                }
                cart(this_item_cnt.val(), this_item_cnt.attr('name')); //存session
                var new_tot = count * price[parseInt(this_item_cnt.attr('name')) - 1];
                new_tot = new_tot.toLocaleString(); //千分位逗號
                $(this).closest($('.list-group-item')).find($("[name='subtotal']")).text("NT$" + new_tot);

            })
            $("[name='reduce']").click(function() {

                this_item_cnt = $(this).closest($(".input-group")).find("input"); //找到數量框
                count = this_item_cnt.val();
                if (count > 1) {
                    count--; //數量減少
                    this_item_cnt.attr({
                        "value": count
                    }); //找到改變數量
                    this_item_cnt.val(count);
                    cart(this_item_cnt.val(), this_item_cnt.attr('name')); //存session
                    var new_tot = count * price[parseInt(this_item_cnt.attr('name')) - 1];
                    new_tot = new_tot.toLocaleString(); //千分位逗號
                    $(this).closest($('.list-group-item')).find($("[name='subtotal']")).text("NT$" + new_tot) //小計變動
                    var tmp_tot = $('#price').text();
                    tmp_tot = parseInt(tmp_tot.replace(/[^\d]/g, ''));
                    tmp_tot -= price[parseInt(this_item_cnt.attr('name')) - 1];
                    tmp_tot = tmp_tot.toLocaleString();
                    $('#price').text("金額：NT$" + tmp_tot);
                    var q = parseInt($('#quantity').text().replace(/[^\d]/g, ''));
                    $('#quantity').text("商品數量：" + (q - 1));
                }
            })
            $("[name='del']").click(function() {

                this_item_cnt = $(this).closest($('.list-group-item')).find("input"); //找到數量框
                var tmp_tot = $('#price').text();
                tmp_tot = tmp_tot.replace(/[^\d]/g, '');
                tmp_tot -= this_item_cnt.val() * price[parseInt(this_item_cnt.attr('name')) - 1];
                tmp_tot = tmp_tot.toLocaleString();
                $('#price').text("金額：NT$" + tmp_tot);

                var q = $('#quantity').text().replace(/[^\d]/g, '');
                $('#quantity').text("商品數量：" + (q - this_item_cnt.val()));

                $(this).closest($('.list-group-item')).css('display', 'none'); //移除item

                cart(0, this_item_cnt.attr('name')); //

            })


        }); //這個是document的括號

        function cart(num, id) {
            $.ajax({
                url: 'Cart_Session.php',
                data: {
                    'num': num,
                    'id': id
                },
                type: 'POST',
                dataType: "json",
                success: function() {},
                error: function(xhr, ajaxOptions, thrownError) {}
            });
        }
    </script>
    <title>訂單搜尋頁面</title>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("https://bootswatch.com/5/litera/bootstrap.css");

        .input-group {
            flex-wrap: nowrap;
        }

        .add,
        .reduce {
            width: 2pt;
            padding: 0.5rem 1rem;
        }

        ol,
        ul {
            padding-left: 0px !important;
        }

        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox 不讓箭頭出現*/
        input[type=number] {
            -moz-appearance: textfield;
        }

        @media (min-width:991px) {}

        /* .form-control {
                text-align: center;
        } */
        @media (max-width: 1400px) {
            .form-control {
                text-align: center;
                padding-left: 0;
                padding-right: 0;
            }

            .add,
            .reduce {
                text-align: center;
                padding-left: 7pt;
            }

            .btn-default {
                color: #333;
                background-color: #fff;
                border-color: #ccc;
            }

            /* old */
            img {
                width: 100pt;
            }

            legend {
                background-color: #f6f6f6;
                padding: 5px 20px;
            }

            .table td,
            .table th {
                vertical-align: middle !important;
                border-top: 1px solid transparent;
            }

            .count {
                width: 40pt;
                margin: 0 3pt;
                border: 1px solid #878787;
                border-radius: 4pt;
            }

            .amount {
                display: inline-flex;
            }

            .btn-warning {
                background-color: #6387ae;
                border-color: #6387ae;
                color: #ffffff;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">SKoff。</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">首頁
                            <span class="visually-hidden">(current)</span>
                        </a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="board.php">留言板</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="About.php">關於我們</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        echo "<li class=\"nav-item dropdown\">" .
                            "<a class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"></a>" .
                            "<div class=\"dropdown-menu\">" .
                            " <a class=\"dropdown-item\" href=\"# \"><i class=\"bi bi-cart3\"></i> 購物車</a>" .
                            "<a class=\"dropdown-item\" href=\"member.php\"><i class=\"bi bi-gear\"></i> 帳戶設定</a>";
                        if ($_SESSION['level'] == 9) {
                            echo "<a class=\"dropdown-item\" href=\"order_manager.php\"><i class=\"bi bi-search\"></i> 訂單管理(管理者)</a>";
                        } else {
                            echo "<a class=\"dropdown-item\" href=\"order_search.php\"><i class=\"bi bi-search\"></i> 訂單查詢</a>";
                        }
                        echo " <div class=\"dropdown-divider\"></div>
                        <a class=\"dropdown-item\" href=\"Report.php\"><i class=\"bi bi-question-circle\"></i> 問題回報</a>
                    </div>
                </li>";
                    }
                    ?>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <form action="" method="post" name="cart">
        <div class="container" style="margin-top: 3rem ;">
            <fieldset>
                <legend>購物車</legend>
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="table-header row hidden-xs">
                            <div class="col-sm-5">商品資訊 </div>
                            <div class="col-sm-2 text-center">單件價格</div>
                            <div class="col-sm-2 text-center">數量</div>
                            <div class="col-sm-2 text-center item-total">小計</div>
                            <div class="col-sm-1"></div>
                        </div>
                    </li>
                    <?php
                    $price = $_SESSION['products']['price'];
                    // $price = array(1 => "1,680", "1,580", "1,380", "1,680", "1,680", "2,150", "220", "250", "650", "1,880", "2,980", "1,580");
                    $p_name = $_SESSION['products']['name'];
                    // $p_name = array(
                    //     1 => "【客製化蛋糕】酒鬼系列蛋糕-絕對伏特加", "【客製化蛋糕】酒鬼系列蛋糕-jack daniel", "【客製化蛋糕】藍色海洋風格蛋糕",
                    //     "【客製化蛋糕】男人系冷色調風格蛋糕", "【客製化蛋糕】男人系灰色風格蛋糕", "【客製化蛋糕】人魚公主蛋糕", "【旅行蛋糕】紅酒莓果蛋糕", "【經典系列】乳酪布朗尼", "10入草莓系列達克瓦茲禮盒", "【客製化蛋糕】酒鬼系列蛋糕-格瑪蘭", "【客製化蛋糕】權力遊戲卓耿蛋糕", "【客製化蛋糕】迷霧金磚"
                    // );
                    $_SESSION['tot_price'] = 0;
                    $arr = array();
                    $brr = array();
                    if (isset($_SESSION['cart_id']))
                        for ($i = 0; $i < count($_SESSION['cart_id']); $i++) {
                            $p_id = $_SESSION['cart_id'][$i];
                            if ($p_id == 'id1' || $p_id == 'item_test"' || $p_id == 'item_test' || $p_id == 'item1') continue;
                            $_SESSION['tot_price'] += (intval(str_replace(",", "", $price[$p_id])) * $_SESSION['tmp_num'][$i]);
                            $p_stock = $_SESSION['products']['stock'][$p_id];
                            array_push($arr, $p_id);
                            array_push($brr, $_SESSION['tmp_num'][$i]);
                            echo '<li class="list-group-item">
                            <div class="table-row row cart-item">
                                <div class="col-xs-12 col-sm-2"><img src="product_pic/no' . $p_id . '.svg" style="width:100pt;" alt="" /></div>
                                <div class="col-xs-12 col-sm-3 text-center" style="vertical-align: middle; margin:auto 0;">' . $p_name[$p_id] . '</div>
                                <div class="col-xs-12 col-sm-2 text-center" style="vertical-align: middle; margin:auto 0;">NT$' . $price[$p_id] . '</div>
                                <div class="col-xs-12 col-sm-2 text-center item-quantity global-secondary dark-secondary padding-zero-sm" style="margin: auto 0;">
                                    <div class="input-group" style="margin:auto 0;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary add" type="button" id="button-addon1" name="add">+</button>
                                        </div>
                                        <h7 name="p_q" style="display:none">' . $p_stock . '</h7>
                                        <input type="number" class="form-control" style="width: fit-content; " placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="' . $_SESSION['tmp_num'][$i] . '" name=' . $p_id . '>
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary reduce" style="border-top-right-radius: 1em; border-bottom-right-radius: 1em;" type="button" id="button-addon1" name="reduce">-</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 text-center" style="vertical-align: middle; margin:auto 0;" name="subtotal" >NT$';
                            $d = (intval(str_replace(",", "", $price[$p_id])) * $_SESSION['tmp_num'][$i]) . "";
                            for ($j = 0; $j < strlen($d); $j++) {
                                echo $d[$j];
                                if ((strlen($d) - $j) % 3 == 1 && $j < strlen($d) - 1) {
                                    echo ",";
                                }
                            }
                            echo '</div>
                                <div class="col-xs-12 col-sm-1 text-center item-action">
                                    <a class="btn btn-link btn-remove-cart-item" name="del"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </li>';
                        }
                    $d = $_SESSION['tot_price'] . "";
                    $pr = "";
                    for ($j = 0; $j < strlen($d); $j++) {
                        $pr .= $d[$j];
                        if ((strlen($d) - $j) % 3 == 1 && $j < strlen($d) - 1) {
                            $pr .= ",";
                        }
                    }
                    ?>
                    <!-- <li class="list-group-item">
                    <div class="table-row row cart-item">
                        <div class="col-xs-12 col-sm-2"><img src="product_pic/no1.svg" style="width:100pt;" alt="" /></div>
                        <div class="col-xs-12 col-sm-3 text-center" style="vertical-align: middle; margin:auto 0;">這是商品</div>
                        <div class="col-xs-12 col-sm-2 text-center" style="vertical-align: middle; margin:auto 0;">NT$210</div>
                        <div class="col-xs-12 col-sm-2 text-center item-quantity global-secondary dark-secondary padding-zero-sm" style="margin: auto 0;">
                            <div class="input-group" style="margin:auto 0;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary add" type="button" id="button-addon1" name="add">+</button>
                                </div>
                                <input type="text" class="form-control" style="width: fit-content;" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value=<?php if (isset($_SESSION['cart_id'][0])) echo $_SESSION['tmp_num'][0];
                                                                                                                                                                                                        else echo '1' ?> name="item1">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary reduce" style="border-top-right-radius: 1em; border-bottom-right-radius: 1em;" type="button" id="button-addon1" name="reduce">-</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2 text-center" style="vertical-align: middle; margin:auto 0;">NT$210</div>
                        <div class="col-xs-12 col-sm-1 text-center item-action">
                            <a class="btn btn-link btn-remove-cart-item" name="del"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li> -->
                </ul>

            </fieldset>

        </div>
        <div class="container" style="margin-top: 5rem; margin-bottom: 3rem;">
            <fieldset>
                <legend>總計</legend>
                <p class="text-right" id="price">金額：NT$<?php if (isset($_SESSION['tot_price']) && $_SESSION['tot_price'] > 0) echo $pr; ?></p>
                <p class="text-right" id="quantity">商品數量：<?php if (isset($_SESSION['total']) && $_SESSION['total'] > 0) echo $_SESSION['total']; ?></p>
                <button type="submit" name="send" class="btn btn-warning" style="float: right;">送出訂單</button>
            </fieldset>
        </div>
    </form>
    <?php
    if (isset($_POST['send'])) {
        if (isset($_SESSION['tot_price']) && $_SESSION['tot_price'] > 0 && isset($arr) && isset($brr)) {
            include('Link_sql.php');
            $sql = "select MAX(id) as id from p_order";
            if ($result = mysqli_query($link, $sql)) {
                $row = mysqli_fetch_row($result);
                $id = $row[0] + 1;
                for ($i = 0; $i < count($arr); $i++) {
                    $sql = "insert into p_order (id, mem_no, p_no, quan) values ($id, " . $_SESSION['no'] . ", " . $arr[$i] . ", " . $brr[$i] . ")";
                    if ($result = mysqli_query($link, $sql)) {
                    } else {
                        echo "<script>alert('無法送出訂單，可能是此商品已經無法購買，或是有其他原因。');location.href='cart.php';</script>";
                        echo "<font color=red>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</font>";
                    }
                }
                unset($_SESSION['tmp_num']);
                unset($_SESSION['cart_id']);
                unset($_SESSION['total']);
                unset($_SESSION['cart']);
                unset($_SESSION['tot_price']);
            }
            echo "<script>alert('訂單送出!');location.href='cart.php';</script>";
            mysqli_close($link); // 關閉資料庫連結
        }
    }

    ?>
</body>

</html>