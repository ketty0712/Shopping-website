<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  

    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="About.html">關於我們</a>
                    </li>
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        echo "<li class=\"nav-item dropdown\">" .
                            "<a class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\" href=\"#\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"></a>" .
                            "<div class=\"dropdown-menu\">" .
                            " <a class=\"dropdown-item\" href=\"checkout.php \"><i class=\"bi bi-cart3\"></i> 購物車</a>" .
                            "<a class=\"dropdown-item\" href=\"#\"><i class=\"bi bi-gear\"></i> 帳戶設定</a>";
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
    <main>
        <div class="container" style="margin-top: 3rem ;">
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
                <li class="list-group-item">
                    <div class="table-row row cart-item">
                        <div class="col-xs-12 col-sm-2"><img src="product_pic/no1.svg" style="width:100pt;" alt="" /></div>
                        <div class="col-xs-12 col-sm-3 text-center" style="vertical-align: middle; margin:auto 0;">這是商品</div>
                        <div class="col-xs-12 col-sm-2 text-center" style="vertical-align: middle; margin:auto 0;">NT$210</div>
                        <div class="col-xs-12 col-sm-2 text-center item-quantity global-secondary dark-secondary padding-zero-sm" style="margin: auto 0;">
                            <div class="input-group" style="margin:auto 0;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary add" type="button" id="button-addon1">+</button>
                                </div>
                                <input type="text" class="form-control" style="width: fit-content;" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="1">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary reduce" style="border-top-right-radius: 1em; border-bottom-right-radius: 1em;" type="button" id="button-addon1">-</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2 text-center" style="vertical-align: middle; margin:auto 0;">NT$210</div>
                        <div class="col-xs-12 col-sm-1 text-center item-action">
                            <a class="btn btn-link btn-remove-cart-item"><i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
            
        </div>
    </main>
</body>

</html>