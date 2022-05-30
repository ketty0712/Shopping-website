<?php
session_start();
// if (!isset($_SESSION['user_name'])) {
//     echo "<script>location.href='login.php';</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/bricks.svg" />
    <title>留言板</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("https://bootswatch.com/5/litera/bootstrap.css");

        .menu {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }

        button.menu {
            padding: 0;
            background-color: transparent;
            border: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .menu:not(:disabled):not(.disabled):focus,
        .menu:not(:disabled):not(.disabled):hover {
            opacity: .75;
        }

        .menu:hover {
            color: #000;
            text-decoration: none;
        }

        textarea {
            padding: 0.5rem 10pt !important;
        }

        .navbar {
            width: 100%;
            z-index: 9;
            position: fixed;
        }

        main {
            padding-top: 60px;
        }
    </style>
</head>
<script>
    $(function() {
        $(".close").click(function() {
            console.log($(this).closest(".card").attr('id'));
            $(this).parent().parent().fadeOut();
            $.ajax({
                url: "board_ajax.php",
                data: {
                    "id": $(this).closest(".card").attr('id'),
                    "oper": "delete",
                },
                type: 'POST',
                dataType: "text",
                success: function(JData) {
                    if (JData)
                        console.log(JData);
                    else {
                        // tbl.ajax.reload();
                        location.reload();
                        console.log(JData)
                    }
                    // $('#member_id').removeAttr('disabled');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    alert(xhr.responseText);
                }
            });
        });
        $(".mod").click(function() {
            var content = $(this).closest(".card").find(".card-text").text();
            $(this).closest(".card").find(".card-text").html("<textarea class=\"form-control\" id=\"exampleTextarea\" rows=\"3\">" + content + "</textarea>");
            $(this).closest(".card").find("h7").append("<button type=\"submit\" class=\"btn btn-primary\" style=\"float: right\">修改完畢</button>");
            $("[type='submit']").click(function() {
                $.ajax({
                    url: "board_ajax.php",
                    data: {
                        "id": $(this).closest(".card").attr('id'),
                        "content": $(this).closest(".card").find("textarea").val(),
                        "oper": "update",
                    },
                    type: 'POST',
                    dataType: "json",
                    success: function(JData) {
                        if (JData.code)
                            toastr["error"](JData.message);
                        else {
                            location.reload("board.php");
                            console.log(JData)
                        }
                        // $('#member_id').removeAttr('disabled');
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.responseText);
                        alert(xhr.responseText);
                    }
                });

            });
        });
    });
</script>

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
                        else echo "<a class=\"dropdown-item\" href=\"cart.php\"><i class=\"bi bi-cart3\"></i> 購物車</a>";
                        echo "<a class=\"dropdown-item\" href=\"member.php\"><i class=\"bi bi-gear\"></i> 帳戶設定</a>
                            <a class=\"dropdown-item\" href=\"order_search.php\"><i class=\"bi bi-layers-half\"></i> 訂單查詢</a>
                            <div class=\"dropdown-divider\"></div>
                            <a class=\"dropdown-item\" href=\"Report.php\"><i class=\"bi bi-question-circle\"></i> 問題回報</a>
                        </div>
                    </li>";
                    }
                    ?>
                </ul>
                <form class="d-flex" action="index.php" method="post">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" id="keyw" name="keyw">
                    <button class="btn btn-secondary my-2 my-sm-0" style="text-align: left;" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <main>
        <div class="container" style="margin-top: 2em;">
            <h3>留言列表</h3>
            <!-- <div class="card mb-3" role="card"> -->
                <!-- <h5 class="card-header">標題
                    <button type="button" class="close" data-dismiss="card" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="menu" aria-label="Menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret" aria-hidden="true">&equiv;</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item mod" href="#"><i class="bi bi-pencil"></i>&nbsp;修改</a>

                    </div>
                </h5>

                <div class="card-body">
                    <h6 class="card-title text-muted" style="display: inline">by姓名</h6>
                    <h7 class="card-subtitle text-muted">email</h7>
                </div>
                <div class="card-body">
                    <p class="card-text" style="font-weight: 800; font-size: smaller;">我覺得很好吃</p>
                </div>
                <div class="card-footer text-muted" style="font-size: small;">
                    2 days ago
                </div> -->
            <!-- </div> -->

            <?php
            include('Link_sql.php');
            $sqlc = "SELECT * FROM board"; // 指定SQL查詢字串
            // 送出查詢的SQL指令
            if ($result = mysqli_query($link, $sqlc)) {
                $total_records = mysqli_num_rows($result);
                //echo $total_records;
                $total_page = ceil($total_records / 10);
                //echo $_GET['page'];  // 1:0~9 2:10~19 3:20~29 ....

                if (isset($_GET['page']))
                    mysqli_data_seek($result, ($_GET['page'] - 1) * 10);
                else $_GET['page'] = 1;
                $data = "";
                for ($j = 1; $j <= 10; $j++) {
                    if ($row = mysqli_fetch_assoc($result)) {
                        $data .= "<div class=\"card mb-3\" id=\"" . $row['id'] . "\">
                        <h5 class=\"card-header\">" . $row['title'];
                        if (isset($_SESSION['level']) && $_SESSION['level'] == 9) $data .= "<button type=\"button\" class=\"close\" data-dismiss=\"card\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button><button type=\"button\" class=\"menu\" aria-label=\"Menu\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    <span class=\"caret\" aria-hidden=\"true\">&equiv;</span>
                </button>
                <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"btnGroupDrop1\">
                    <a class=\"dropdown-item mod\" href=\"#\"><i class=\"bi bi-pencil\"></i>&nbsp;修改</a>
                    <!-- <a class=\"dropdown-item\" href=\"#\"></a> -->
                </div>";
                        $data .= "</h5>
                        <div class=\"card-body\">
                            <h6 class=\"card-title text-muted\" style=\"display: inline\">by " . $row['name'] . "</h6>
                            <h7 class=\"card-subtitle text-muted\">" . $row['email'] . "</h7>
                        </div>
                        <div class=\"card-body\">
                            <p class=\"card-text\" style=\"font-weight: 800; font-size: smaller;\">" . $row['content'] . "</p>
                        </div>
                        <div class=\"card-footer text-muted\" style=\"font-size: small;\">";
                        // 2 days ago
                        $data .= $row['time'];
                        $data .= "</div>
                    </div>";
                    }
                }
                mysqli_free_result($result); // 釋放佔用的記憶體
            }
            mysqli_close($link); // 關閉資料庫連結
            $data .= "<ul class=\"pagination\">
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"#\" aria-label=\"Previous\">
                <span aria-hidden=\"true\">&laquo;</span>
              </a>
            </li>";

            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $_GET['page'] || ($i == !isset($_GET['page']) && $i == 1)) {
                    $data .= "<li class=\"page-item active\"><a class=\"page-link\" href=\"#\" >$i</a></li>";
                } else {
                    $data .= "<li class=\"page-item\"><a class=\"page-link\" href='" . $_SERVER['PHP_SELF'] . "?page=$i'> $i </a></li>";
                }
            }
            $data .=  " <li class=\"page-item\"><a class=\"page-link\" href=\"#\" aria-label=\"Next\">
            <span aria-hidden=\"true\">&raquo;</span>
          </a>
          </li>
        </ul>";
            echo $data;
            ?>
        </div>
    </main>
    <footer style="margin-top: 3rem; margin-bottom: 3rem;">
        <div class="container">
            <fieldset>
                <legend>新增留言</legend>
                <section id="contact-area">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="contact-box text-center">
                                <form id="ajax-contact" method="post">
                                    <div class="form-group row">
                                        <div class="col-lg-6"><input type="text" class="form-control" id="name" name="name" placeholder="姓名" required=""></div>
                                        <div class="col-lg-6"><input type="email" class="form-control" id="email" name="email" placeholder="Email" required=""></div>
                                    </div>
                                    <div class="form-group"><input type="text" class="form-control" id="subject" name="subject" placeholder="標題"></div>
                                    <div class="form-group"><textarea class="form-control" id="message" name="message" rows="10" placeholder="留言內容" required=""></textarea></div>
                                    <button type="submit" class="btn btn-primary">提 交</button>
                                    <div id="form-messages"></div>
                                    <?php
                                    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && !empty($_POST["message"])) {
                                        $date = date("Y-m-j G:i:s", time());
                                        $sql = "insert into board (name, email, title, content, time) values ('" . $_POST["name"] . "', '" . $_POST["email"] . "', '" . $_POST["subject"] . "', '" . $_POST["message"] . "', '" . $date . "')";
                                        echo $sql;
                                        $link = mysqli_connect("localhost", "root", "root123456", "group_15") or die("無法開啟MySQL資料庫連結!<br>");
                                        mysqli_query($link, 'SET CHARACTER SET utf8');
                                        mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
                                        if ($result = mysqli_query($link, $sql)) {
                                            echo "<script>alert('新增成功!');location.href='board.php';</script>";
                                        } else {
                                            echo "<font color=red>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</font>";
                                        }
                                        mysqli_close($link); // 關閉資料庫連結
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

            </fieldset>
        </div>
    </footer>
</body>

</html>