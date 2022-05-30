<?php
session_start();
if (!isset($_SESSION['user_name']))
    echo "<script>alert('請登入帳戶!!');location = 'login.php'</script>";
function update($sql)
{
    include('Link_sql.php');
    if ($result = mysqli_query($link, $sql)) {
        echo "<script>alert('資料新增成功!');location.href='member.php';</script>";
    } else {
        echo "<font color=red>SQL指令執行失敗！<br>錯誤訊息：" . mysqli_error($link) . "(代碼：" . mysqli_errno($link) . ")</font>";
    }
    mysqli_close($link); // 關閉資料庫連結
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/gear.svg" />
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-datepicker.min.css" />
    <script src="//bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="bootstrap/js/bootstrap-datepicker.min.js"></script>
    <script src="bootstrap/js/bootstrap-datepicker.zh-TW.min.js"></script>

    <title>帳戶設定</title>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("https://bootswatch.com/5/litera/bootstrap.css");

        .breadcrumb {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 0 0;
            margin: 1rem;
            list-style: none;
            background-color: transparent;
            border-radius: .25rem;
        }

        .input-group-text {
            border-radius: 0.75rem;
            font-size: 0.875rem;
        }

        .form-control:disabled,
        .form-control[readonly] {
            background-color: transparent;
            color: rgba(0, 0, 0, 0.6);
            font-style: italic;
            font-stretch: expanded;
        }

        hr {
            margin-top: 3em;
        }

        h4 {
            margin-bottom: 1em;
        }
    </style>
</head>
<script>
    function checksize() {
        var height = 0;
        $(".input-group-text").each(function() {
            $(this).height($(this).parent().siblings("input").height());
        })
    }
</script>
<script>
    $(function() {
        $(".input-group-text").each(function() {
            $(this).height($(this).parent().siblings("input").height());
        })
        $(".ctrl").click(function() {
            var content = "";
            if ($(this).parent().siblings("input").attr("disabled") == "disabled") {
                var content = $(this).parent().siblings("input").val();
                $(this).parent().siblings("input").removeAttr("disabled");
                $(this).text("取消")
                var str = $(this).parent().siblings("input").val().trim();
            } else {
                if ($(this).parent().siblings("input").val().trim() != "") {
                    $(this).parent().siblings("input").attr("disabled", "disabled");
                    $(this).parent().siblings("input").val(content);
                    $(this).text("變更");
                }
            }
        })
    });
</script>

<body onload="checksize();">
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
                <form class="d-flex" action="index.php" method="post">
                    <input class="form-control me-sm-2" type="text" placeholder="Search" id="keyw" name="keyw">
                    <button class="btn btn-secondary my-2 my-sm-0" style="text-align: left;" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <main>

        <div class="container" style="margin-top: 3em; margin-bottom: 3em;">
            <form action="" method="POST" name="member">
                <fieldset>
                    <legend>帳戶管理</legend>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend title">
                            <span class="input-group-text">使用者名稱</span>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" name="user_name" placeholder="" aria-label="Example text with button addon" value="<?php if (isset($_SESSION['user_name'])) echo $_SESSION['user_name'] ?>" aria-describedby="button-addon1" disabled>
                        <!-- <div class="input-group-append">
                            <button class="btn btn-outline-secondary ctrl" type="button" id="button-addon2">變更</button>
                        </div> -->
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend title">
                            <span class="input-group-text" id="basic-addon2">姓名</span>
                        </div>
                        <input type="text" class="form-control" placeholder="" name="name" aria-label="Example text with button addon" value="<?php if (isset($_SESSION['name'])) echo $_SESSION['name'] ?>" aria-describedby="button-addon1" disabled>
                        <?php if (isset($_POST['name'])) {
                            $name = $_POST['name'];
                        }
                        ?>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary ctrl" type="button" id="button-addon2">變更</button>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend" title>
                            <span class="input-group-text" id="basic-addon2">密碼</span>
                        </div>
                        <!-- 好煩這一欄還要加表單驗證(還沒加) -->
                        <input type="text" class="form-control" name="password" placeholder="" aria-label="Example text with button addon" value="<?php if (isset($_SESSION['password'])) echo $_SESSION['password'] ?>" aria-describedby="button-addon1" disabled required>
                        <?php if (isset($_POST['password']) && !empty($_POST['password'])) {
                            $password = $_POST['password'];
                        }
                        ?>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary ctrl" type="button" id="button-addon2">變更</button>
                        </div>
                    </div>
                    <hr>
                    <h4>聯絡方式</h4>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend title">
                            <span class="input-group-text" id="basic-addon2">行動電話</span>
                        </div>
                        <input type="text" class="form-control" name="mobile" placeholder="" aria-label="Example text with button addon" value="<?php if (isset($_SESSION['mobile'])) echo $_SESSION['mobile'] ?>" aria-describedby="button-addon1" disabled>
                        <?php if (isset($_POST['mobile'])) {
                            $mobile = $_POST['mobile'];
                        }
                        ?>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary ctrl" type="button" id="button-addon2">變更</button>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend title">
                            <span class="input-group-text" id="basic-addon2">Email</span>
                        </div>
                        <input type="text" class="form-control" name="email" placeholder="" aria-label="Example text with button addon" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'] ?>" aria-describedby="button-addon1" disabled>
                        <?php if (isset($_POST['email'])) {
                            $email = $_POST['email'];
                        }
                        ?>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary ctrl" type="button" id="button-addon2">變更</button>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend title">
                            <span class="input-group-text" id="basic-addon2">地址</span>
                        </div>
                        <input type="text" class="form-control" placeholder="" name="address" aria-label="Example text with button addon" value="<?php if (isset($_SESSION['address'])) echo $_SESSION['address'] ?>" aria-describedby="button-addon1" disabled>
                        <?php if (isset($_POST['address'])) {
                            $address = $_POST['address'];
                        }
                        ?>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary ctrl" type="button" id="button-addon2">變更</button>
                        </div>
                    </div>
                    <!-- <script>
                        $("#datetimepicker14 button").datepicker({
                            language: "zh-TW"
                        });
                    </script>
                    <div class="row">
                        <div class="col-sm-6" id="datetimepicker14">
                            <div class="form-group">
                                <div class="input-group date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker14" />
                                    <div class="input-group-append" data-target="#datetimepicker14" data-toggle="datetimepicker">
                                        <button class="btn btn-outline-secondary" type="button"><i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </fieldset>
                <button type="submit" class="btn btn-primary">確認更改</button>
                <?php
                $sql = "update m_info set ";
                $arr = array();
                $arr2 = array();
                if (isset($name)) {
                    array_push($arr, "name");
                    array_push($arr2, $name);
                    $_SESSION['name'] = $name;
                }
                if (isset($password)) {
                    array_push($arr, "password");
                    array_push($arr2, $password);
                    $_SESSION['password'] = $password;
                }
                if (isset($mobile)) {
                    array_push($arr, "mobile");
                    array_push($arr2, $mobile);
                    $_SESSION['mobile'] = $mobile;
                }
                if (isset($email)) {
                    array_push($arr, "email");
                    array_push($arr2, $email);
                    $_SESSION['email'] = $email;
                }
                if (isset($address)) {
                    array_push($arr, "address");
                    array_push($arr2, $address);
                    $_SESSION['address'] = $address;
                }
                if (count($arr) > 0) {
                    for ($i = 0; $i < count($arr); $i++) {
                        // echo $arr2[$i] . " " . $_SESSION[$arr[$i]] . "\n";
                        $sql .= $arr[$i] . "='" . $arr2[$i] . "'";
                        if ($i < count($arr) - 1) $sql .= " and ";
                    }
                    // echo $sql . "\n";
                    $sql .= "where no = " . $_SESSION['no'];
                    update($sql);
                }
                ?>
            </form>
        </div>
    </main>

    <footer>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
            <li class="breadcrumb-item"><a href="member.php">帳戶</a></li>
            <li class="breadcrumb-item active">帳戶設定</li>
        </ol>
    </footer>
    <!-- <script src="js/bootstrap-datetimepicker.min.js"></script> -->

</body>

</html>