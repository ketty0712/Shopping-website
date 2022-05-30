<?php
session_start();
if (!isset($_SESSION['user_name']))
    echo "<script>alert('請登入帳戶!!');location = 'login.php'</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/search.svg" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <title>訂單搜尋頁面</title>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("https://bootswatch.com/5/litera/bootstrap.css");

        th,
        td {
            vertical-align: middle !important;
        }

        label.error {
            color: #D82424;
            font-weight: normal;
            font-family: "微軟正黑體";
            display: inline;
            padding: 1px;
        }
    </style>
    <script>
        $(function() {
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var recipient = button.data('whatever');
                var str = "table#" + recipient;
                var dis = "<table class=\"table table-sm\">" + $(str).html().trim() + "</table>";
                var tab = "<table class=\"table table-sm table-responsive-sm\">" +
                    "<thead>" +
                    "<tr>" +
                    "<th scope=\"col\">品名</th>" +
                    "<th scope=\"col\">單價(含稅)</th>" +
                    "<th scope=\"col\">數量</th>" +
                    "<th scope=\"col\">是否收到貨</th>" +
                    "<th scope=\"col\">退訂原因<label for=\"ans2\" class=\"error\"></label></th>" +
                    "</tr>" +
                    "</thead>" +
                    "<tbody>";
                var t = false;
                var c = 0;
                var arr1 = [],
                    arr2 = [];
                $(dis).find("tr").each(function() {
                    if (t == false) {
                        t = true;
                        // alert(c);
                        c++;
                    } else {
                        // alert(c);
                        c++;
                        var tdArr = $(this).children();
                        var name = tdArr.eq(1).text();
                        var quan = tdArr.eq(2).text();
                        var price = tdArr.eq(3).text();
                        arr1.push(name);
                        arr2.push(quan);
                        tab += "<tr>" +
                            "<td>" + name + "</td>" +
                            "<td>" + price + "</td>" +
                            "<td>" + quan + "</td>" +
                            "<td class='Rad'>" +
                            "<div class=\"form-check form-check-inline\" >" +
                            "<input class=\"form-check-input\" type=\"radio\" name=\"inlineRadioOptions" + c + "\"value=\"1\" id=\"inlineRadio1\" required>" +
                            "<label class=\"form-check-label\" for=\"inlineRadio1\">是</label>" +
                            "</div>" +
                            "<div class=\"form-check form-check-inline\">" +
                            "<input class=\"form-check-input\" type=\"radio\" name=\"inlineRadioOptions" + c + "\" value=\"2\" id=\"inlineRadio2\"required>" +
                            "<label class=\"form-check-label\" for=\"inlineRadio2\">否</label>" +
                            "<div class=\"invalid-feedback\">必填來著</div>" +
                            "</div>" +
                            "</td>" +
                            "<td>" +
                            "<div class=\"col-auto\">" +
                            "<select class=\"form-select mr-sm-2\" name=\"ans2" + c + "\" id=\"inlineFormCustomSelect\" required>" +
                            "<option value=\"0\" selected> 請選擇... </option>" +
                            "<option value=\"1\">不符所需</option>" +
                            "<option value=\"2\">商品缺件</option>" +
                            "<option value=\"3\">規格不符</option>" +
                            "<option value=\"4\">不想等/等太久</option>" +
                            "<option value=\"5\">寄錯商品</option>" +
                            "<option value=\"6\">商品有瑕疵</option>" +
                            "</select>" +
                            "</div>" +
                            "</td></tr>";
                    }
                });
                tab += "</tbody></table>";
                $("#form1").html(tab);
                // console.log(arr1);
                $("#del").click(function() {
                    var flag = true;
                    var t = 2;
                    $(".Rad").each(function() {
                        var radio = "inlineRadioOptions" + t;
                        if (!$(":radio[name='" + radio + "']").is(":checked")) {
                            t++;
                            // alert("no ch " + radio);
                            $("#error-feedback").text("請選擇!!");
                            $(":radio[name='" + radio + "']").focus();
                            flag = false;
                            return false;
                        } else {
                            t++;
                            // alert("yes " + radio);
                        }
                    });
                    $(".form-select").each(function() {
                        if ($(this).val() == 0 || $("#" + $(this).attr("id") + " :selected").text().trim() == "請選擇...") {
                            $("#error-feedback").text("請選擇!!");
                            $(this).focus();
                            flag = false;
                            return false;
                        }
                    });
                    if (flag) {
                        var arr3 = [];
                        var arr4 = [];
                        var f = false;
                        $("#form1 tr").each(function() {
                            if (f == true) {
                                var arr = $(this).children("td");
                                arr3.push(arr.eq(3).find(":checked").val());
                                arr4.push(arr.eq(4).find(":selected").text());
                            } else f = true;
                        });
                        console.log(arr1);
                        console.log(arr3);
                        console.log(arr4);
                        $.ajax({
                            // url: location.href,
                            url: "delete.php",
                            type: "POST",
                            data: {
                                "id": recipient,
                                "name": arr1,
                                "quan": arr2,
                                "reason": arr4,
                            },
                            dataType: "json",
                            success: function(JData) {
                                if (JData.code)
                                    toastr["error"](JData.message);
                                else {
                                    toastr["success"](JData.message);
                                    // document.getElementById("#box").ajax.reload();
                                    console.log(JData)
                                }
                                location.reload();
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                                console.log(thrownError);
                                alert(xhr.responseText);
                            }
                        });
                    }
                    // $("#back").append("<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\"><strong>Holy guacamole!</strong> You should check in on some of those fields below. <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div>");
                });
                $("#cancel_1").click(function() {
                    $("#error-feedback").text("");
                });
            });
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="">SKoff。</a>
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
        <div class="container" style="margin-top: 3rem;" id="box">
            <?php
            if (isset($_SESSION['user_name'])) {
                include('Link_sql.php');
                $data = "";
                $sqlc = "SELECT * FROM p_order where mem_no = '" . $_SESSION['no'] . "' order by id desc";
                if ($result = mysqli_query($link, $sqlc)) {
                    $total_records = mysqli_num_rows($result);
                    if ($total_records == 0) $data = '您還沒有加入任何訂單!';
                    //echo $total_records;
                    $total_page = ceil($total_records / 10);
                    //echo $_GET['page'];  // 1:0~9 2:10~19 3:20~29 ....

                    if (isset($_GET['page']))
                        mysqli_data_seek($result, ($_GET['page'] - 1) * 10);
                    else $_GET['page'] = 1;
                    $id = -1;
                    for ($j = 1; $j <= 10; $j++) {
                        $flag = true;

                        if ($row = mysqli_fetch_assoc($result)) {
                            if ($id != $row['id']) {
                                $id = $row['id'];
                                $data .= "<div class=\"card\" style=\"margin-bottom:3rem;\">
                                            <div class=\"card-header\">
                                            訂單編號&nbsp;#" . $row['id'] . "</div>
                                            <div class=\"card-body\">
                                                <h5 class=\"card-title\">感謝您的訂購</h5>
                                                <p class=\"card-text\">
                                                <table class=\"table table-borderless\" id=\"$id\">
                                                    <thead>
                                                        <tr>
                                                            <th scope=\"col\"></th>
                                                            <th scope=\"col\">商品名稱</th>
                                                            <th scope=\"col\">數量</th>
                                                            <th scope=\"col\">單價(含稅)</th>
                                                            <th scope=\"col\"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                                $sql2 = "select name, p_name,  quan, p_price from product_list a, m_info b, p_order c
                                where a.id = c.p_no and
                                b.no = c.mem_no and
                                c.id = '$id'";
                                $_GET['id'] = $id;
                                $n = 1;
                                if ($result2 = mysqli_query($link, $sql2)) {
                                    $total_records2 = mysqli_num_rows($result2);
                                    while ($row2 = mysqli_fetch_assoc($result2)) {

                                        $data .= "<tr>
                                        <th scope=\"row\">" . $n . "</th>
                                        <td style='width:55%'>" . $row2['p_name'] . "</td>
                                        <td>" . $row2['quan'] . "</td>
                                        <td>" . $row2['p_price'] . "</td>";
                                        if ($n == 1)
                                            $data .= "<td rowspan=\"total_records2\"><button type=\"button\" class=\"btn btn-link\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"$id\">我想退貨</button></td>";
                                        // $data .= "<td rowspan=\"total_records2\"><a role=\"button\" href=\"delete.php?id=" . $id . "\" class=\"btn btn-link\" \">我要退貨</a></td>";
                                        $data .= "</tr>";
                                        $n++;
                                    }
                                }
                                $data .= "</tbody>
                                    </table>
                                </p>
                                </div>
                                </div>";
                            }
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
            }
            echo $data;
            ?>
            <div class="card" style="border:0px;">
                <div class="card-header" style="display:none;">
                    訂單編號&nbsp;#111111
                </div>
                <div class="card-body" style="overflow:hidden; height:0; padding:0;">
                    <h5 class="card-title">感謝您的訂購</h5>
                    <p class="card-text">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">商品名稱</th>
                                <th scope="col">數量</th>
                                <th scope="col">價格</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td rowspan="3">
                                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                                        我想退貨
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1200px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">退訂退款申請</h5>
                                    <div id="error-feedback" style="color: chocolate;margin-inline-start: 1em;"></div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>
                                <div class="modal-body">
                                    <form method="POST" name="form1" id="form1" class="" novalidate>
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><input type="checkbox" id="all"></th>
                                                    <th scope="col">品名</th>
                                                    <th scope="col">單價(含稅)</th>
                                                    <th scope="col">數量</th>
                                                    <th scope="col">是否收到貨</th>
                                                    <th scope="col">退訂原因</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><input type="checkbox" name="check[]" id="1"></th>
                                                    <td>【客製化蛋糕】酒鬼系列蛋糕-jack'd</td>
                                                    <td>1580</td>
                                                    <td>3</td>
                                                    <td>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                                            <label class="form-check-label" for="inlineRadio1">是</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="0">
                                                            <label class="form-check-label" for="inlineRadio2">否</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-auto">
                                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                                <option selected>請選擇...</option>
                                                                <option value="1">不符所需</option>
                                                                <option value="2">商品缺件</option>
                                                                <option value="3">規格不符</option>
                                                                <option value="4">不想等/等太久</option>
                                                                <option value="5">寄錯商品</option>
                                                                <option value="6">商品有瑕疵</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel_1">取消</button>
                                    <button type="submit" class="btn btn-primary" id="del">確認送出</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                    <div style="float: right;" id="back">

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>