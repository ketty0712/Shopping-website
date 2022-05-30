<?php
    session_start();
    include('Link_sql.php');
    // 送出查詢的SQL指令
    if (!empty($_POST['keyw'])) {
        $keyw = "%" . $_POST['keyw'] . "%";
        if ($result = mysqli_query($link, "SELECT * FROM product_list where p_name like '" . $keyw . "' or p_intro_long like '" . $keyw . "' order by id")) {
            $total_records = mysqli_num_rows($result);
            $data = '';
            for ($i = 0; $i < $total_records; $i++) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $data .= '<div class="col"><div class="card shadow-sm"><a href="Products/Product_template.php?product_no=' . $row['id'] . '" class="bd-placeholder-img card-img-top">';
                    $data .= '<img src= ' . $row['file_name'] . ' width="100%" ></a><div class="card-body">';
                    $data .= '<p class="card-text">' . $row['p_name'] . "</p><div class='d-flex justify-content-between align-items-center'><mark class=\"text-body\">NT$ " . $row['p_price'] . " </mark></div>" . "<div id='stock' style='display:none;'>" . $row['stock'] . "</div>";
                    if (isset($_SESSION['user_name']))
                        $data .= '<div class="btn-group d-flex justify-content-between align-items-center"><button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]" id="' . $row['id'] . '">Add in Cart</button></div>';
                    else
                        $data .= '<div class="btn-group d-flex justify-content-between align-items-center"><button type="button" class="btn btn-sm btn-outline-secondary" onclick="tologin();">Add in Cart</button></div>';
                    $data .= '</div></div></div>';
                }
            }
            if ($total_records == 0) {
                $data = "<div class='col' style='width:100%; text-align:center; font-size:26px'><h7>沒有找到關鍵字商品!<h7></div>";
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
        } else {
            echo "<font color=red>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</font>";
        }
    } else {
        $keyw = "%" . "%";
        if ($result = mysqli_query($link, "SELECT * FROM product_list where p_name like '" . $keyw . "' or p_intro_long like '" . $keyw . "' order by id")) {
            $total_records = mysqli_num_rows($result);
            $_SESSION['products']['name'] = array();
            $_SESSION['products']['price'] = array();
            $_SESSION['products']['stock'] = array();
            $data = '';
            for ($i = 0; $i < $total_records; $i++) {
                if ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['products']['name'][$row['id']] = $row['p_name'];
                    $_SESSION['products']['price'][$row['id']] = $row['p_price'];
                    $_SESSION['products']['stock'][$row['id']] = $row['stock'];
                    $data .= '<div class="col"><div class="card shadow-sm"><a href="Products/Product_template.php?product_no=' . $row['id'] . '" class="bd-placeholder-img card-img-top">';
                    $data .= '<img src= ' . $row['file_name'] . ' width="100%" ></a><div class="card-body">';
                    $data .= '<p class="card-text">' . $row['p_name'] . "</p><div class='d-flex justify-content-between align-items-center'><mark class=\"text-body\">NT$ " . $row['p_price'] . " </mark></div>" . "<div id='stock' style='display:none;'>" . $row['stock'] . "</div>";
                    if (isset($_SESSION['user_name']))
                        $data .= '<div class="btn-group d-flex justify-content-between align-items-center"><button type="button" class="btn btn-sm btn-outline-secondary" name="cart[]" id="' . $row['id'] . '">Add in Cart</button></div>';
                    else
                        $data .= '<div class="btn-group d-flex justify-content-between align-items-center"><button type="button" class="btn btn-sm btn-outline-secondary" onclick="tologin();">Add in Cart</button></div>';
                    $data .= '</div></div></div>';
                }
            }
            mysqli_free_result($result); // 釋放佔用的記憶體
        } else {
            echo "<font color=red>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</font>";
        }
    }
    mysqli_close($link); // 關閉資料庫連結

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKoff Bakery</title>
    <link rel="icon" type="image/x-icon" href="assets/shop.svg" />
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- 自行製作的css與js -->
    <link rel="stylesheet" href='bootstrap/css/loading.css'>
    <link rel="stylesheet" href="bootstrap/css/index.css">
    <script src="bootstrap/js/index.js"></script>
</head>

<body onload="checksize();">
    <div class="loader">
        <div class="loader_constant">
            <svg class="svg-inline--fa fa-birthday-cake fa-w-14 fa-4x text-primary mb-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="birthday-cake" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="#FF6100" d="M448 384c-28.02 0-31.26-32-74.5-32-43.43 0-46.825 32-74.75 32-27.695 0-31.454-32-74.75-32-42.842 0-47.218 32-74.5 32-28.148 0-31.202-32-74.75-32-43.547 0-46.653 32-74.75 32v-80c0-26.5 21.5-48 48-48h16V112h64v144h64V112h64v144h64V112h64v144h16c26.5 0 48 21.5 48 48v80zm0 128H0v-96c43.356 0 46.767-32 74.75-32 27.951 0 31.253 32 74.75 32 42.843 0 47.217-32 74.5-32 28.148 0 31.201 32 74.75 32 43.357 0 46.767-32 74.75-32 27.488 0 31.252 32 74.5 32v96zM96 96c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40z"></path>
            </svg>
            <div class="img_box">
                <div class="img_item"></div>
                <div class="loading"></div>
            </div>
            <!-- <div style="font-size:10px; margin:10px auto;text-align:center;"><b>SKOFF</b>為您獻上最用心的客製化蛋糕</div> -->
        </div>
    </div>
    <?php if (isset($_SESSION['user_name'])) include('Cart/cart_side.php'); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SKoff。</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">首頁
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php
                            if (isset($_SESSION['user_name'])) {
                                echo '<a class="nav-link" href="logout.php"> 登出(' . $_SESSION['user_name'] . ')</a>';
                            } else {
                                echo '<a class="nav-link" href="login.php"> 登入</a>';
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
                            "<div class=\"dropdown-menu\">";
                        if ($_SESSION['level'] == 9) echo "<a class=\"dropdown-item\" href=\"MySQL/db.php \"><i class=\"bi bi-cart3\"></i> 資料館</a>";
                        else echo "<a class=\"dropdown-item\" href=\"Cart/cart.php\"><i class=\"bi bi-cart3\"></i> 購物車</a>";
                        echo "<a class=\"dropdown-item\" href=\"member.php\"><i class=\"bi bi-gear\"></i> 帳戶設定</a>
                        <a class=\"dropdown-item\" href=\"order_search.php\"><i class=\"bi bi-layers-half\"></i> 訂單查詢</a>
                        <div class=\"dropdown-divider\"></div>
                        <a class=\"dropdown-item\" href=\"Report.php\"><i class=\"bi bi-question-circle\"></i> 問題回報</a>
                    </div>
                </li>";
                    }
                    ?>
                </ul>
                <label class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" value=<?php if (isset($_POST['keyw'])) echo $_POST['keyw']; ?>>
                    <button class="btn btn-secondary my-2 my-sm-0" type="button" id="search_b" href="#main">Search</button>
                </label>
            </div>
        </div>
    </nav>
    <main>
        <div class="container" style="margin-bottom: 3em;">
            <header>
                <div id=slide>
                    <label onclick="location.href='about.php'">
                        <div class="carousel-caption d-none d-md-block title_slide show_t">
                            <h3 class="display-4">關於SKOFF</h3>
                            <p class="lead">暢遊SKOFF世界，從成為SKoffian開始！</p>
                        </div>
                    </label>
                    <label onclick="location.href='Products/Product_template.php?product_no=1'">
                        <div class="carousel-caption d-none d-md-block title_slide show_t">
                            <h3 class="display-4">蛋糕主打星</h3>
                            <p class="lead">酒鬼系列、客製化主題蛋糕熱賣中！</p>
                        </div>
                    </label>
                    <label onclick="location.href='Products/Product_template.php?product_no=8'">
                        <div class="carousel-caption d-none d-md-block title_slide show_t">
                            <h3 class="display-4">下午茶甜點</h3>
                            <p class="lead">在家也能享受到歐洲風情的TeaTime</p>
                        </div>
                    </label>
                    <ol class="carousel-indicators">
                        <li id='line_ind' data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li id='line_ind' data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li id='line_ind' data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                </div>
            </header>

        </div>
    </main>
    <script type="text/javascript">$('.loading').css('width', '50%');//第一個進度節點 </script>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="main">
        <?php echo $data;?>
        </div>
    </div>
    <script type="text/javascript">$('.loading').css('width', '100%');//第二個進度節點 </script>


</body>

</html>