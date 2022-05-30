<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] < 9) echo '<script>alert("請登入管理者帳戶!");location.href="../login.php";</script>';
// $link = mysqli_connect("localhost", "root", "root123456", "member") // 建立MySQL的資料庫連結
// 	or die("無法開啟MySQL資料庫連結!<br>");
if (isset($_POST["sql"])) echo $_POST["sql"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../assets/server.svg" />

    <title>SQL manager</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("https://bootswatch.com/5/litera/bootstrap.css");

        iframe {
            width: 90%;
            height: 300pt;
        }

        #top3 {
            width: 100%;
            height: 1000pt;
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.ph">SKoff。</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../index.php">首頁
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user_name'])) {
                            echo '<a class="nav-link" href="../logout.php"> 登出(' . $_SESSION['user_name'] . ')</a>';
                        } else {
                            echo '<a class="nav-link" href="../login.php"> 登入</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../board.php">留言板</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../About.php">關於我們</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        echo "<li class=\"nav-item dropdown\">" .
                            "<a class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"></a>" .
                            "<div class=\"dropdown-menu\">";
                        if ($_SESSION['level'] == 9) echo "<a class=\"dropdown-item\" href=\"# \"><i class=\"bi bi-cart3\"></i> 資料館</a>";
                        else echo "<a class=\"dropdown-item\" href=\"../cart.php\"><i class=\"bi bi-cart3\"></i> 購物車</a>";
                        echo "<a class=\"dropdown-item\" href=\"../member.php\"><i class=\"bi bi-gear\"></i> 帳戶設定</a>
                        <a class=\"dropdown-item\" href=\"../order_search.php\"><i class=\"bi bi-layers-half\"></i> 訂單查詢</a>
                        <div class=\"dropdown-divider\"></div>
                        <a class=\"dropdown-item\" href=\"../Report.php\"><i class=\"bi bi-question-circle\"></i> 問題回報</a>
                    </div>
                </li>";
                    }
                    ?>
                </ul>
                <form class="d-flex" action="../index.php" method="post">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" id="keyw" name="keyw">
                    <button class="btn btn-secondary my-2 my-sm-0" style="text-align: left;" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top: 1em;">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">查詢MySQL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modify_product.php">修改商品資料庫</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modify_order.php">修改訂單資料庫</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modify_member.php">修改會員資料庫</a>
            </li>
            <!-- <li class="nav-item">
				<a class="nav-link" href="#">刪除資料庫</a>
			</li> -->
        </ul>
        <div class="mt-3 m-align-center">
            <iframe src="form1.php" id="top1" name="top1" frameborder="0"></iframe>
        </div>


        <iframe src="form2.php" id="top2" name="top2" frameborder="0"></iframe>

        <iframe src="form3.php" id="top3" name="top3" frameborder="0"></iframe>
    </div>

</body>

</html>