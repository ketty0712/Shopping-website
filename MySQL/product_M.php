<!-- 管理者介面－商品管理(模板)-->
<?php
include('../Link_sql.php');
$sql = "select * from product_list"; // 指定SQL查詢字串
if ($result = mysqli_query($link, $sql)) {
    // $data = "<thead><tr>";
    $arr = array();
    while ($finfo = $result->fetch_field()) {
        // $data .= "<th scope=\"col\">$finfo->name</th>";
        array_push($arr, $finfo->name);
        // if ($finfo->name == "file_name") $f = true;
    }
    // $data .= "</tr></thead>";
    $data = "";
    $total_records = mysqli_num_rows($result);
    //echo $total_records;
    $total_page = ceil($total_records / 10);
    //echo $_GET['page'];  // 1:0~9 2:10~19 3:20~29 ....

    if (isset($_GET['page']))
        mysqli_data_seek($result, ($_GET['page'] - 1) * 10);
    else $_GET['page'] = 1;
    $data .= "<tbody>";
    for ($j = 1; $j <= 10; $j++) {
        if ($row = mysqli_fetch_assoc($result)) {
            $data .= "<tr>";
            $data .= "<th scope=\"row\">" . $row[$arr[0]] . "</th>";
            for ($i = 1; $i < count($row); $i++)
                $data .= "<td>" . $row[$arr[$i]] . "</td>";
            $data .= "</tr>";
        }
    }
    $data .= "</tbody>";
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
$header = "<ul class=\"pagination\">
            <li class=\"page-item\">
              <a class=\"page-link\" href=\"#\" aria-label=\"Previous\">
                <span aria-hidden=\"true\">&laquo;</span>
              </a>
            </li>";

for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $_GET['page'] || ($i == !isset($_GET['page']) && $i == 1)) {
        $header .= "<li class=\"page-item active\"><a class=\"page-link\" href=\"#\" >$i</a></li>";
    } else {
        $header .= "<li class=\"page-item\"><a class=\"page-link\" href='" . $_SERVER['PHP_SELF'] . "?page=$i'> $i </a></li>";
    }
}
$header .=  " <li class=\"page-item\"><a class=\"page-link\" href=\"#\" aria-label=\"Next\">
            <span aria-hidden=\"true\">&raquo;</span>
          </a>
          </li>
        </ul>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/pencil-square.svg" />
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

    <script src="//bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery-latest.js"></script>

    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="../bootstrap/js/jquery.tabledit.js"></script>
    <script src="../bootstrap/js/jquery.tabledit.min.js"></script>
    <title>修改商品資料庫</title>
    <script>
        function load() {
            $('textarea[name="p_intro"]').each(function() {
                $(this).closest("td").css("min-width", "500px");
                $(this).closest("td").find($('textarea')).css("font-size", "12pt");
                $(this).closest("td").find($('textarea')).css("width", "100%");
            });
            $('input[name="picture"]').each(function() {
                $(this).closest("td").css("min-width", "350px");
                $(this).closest("td").find($('input')).css("font-size", "12pt");
            });
            $('textarea[name="p_intro_long"]').each(function() {
                $(this).closest("td").find($('textarea')).css("font-size", "12pt");
                $(this).closest("td").find($('textarea')).css("width", "100%");
            });
        }
    </script>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("https://bootswatch.com/5/litera/bootstrap.css");

        .container {
            margin-top: 2em;
        }

        th,
        td {
            vertical-align: middle !important;
        }
        th:nth-of-type(1){
            width:3%;
        }
        th:nth-of-type(3),th:nth-of-type(4){
            width:5%;
        }
        th:nth-of-type(6){
            width:23%;
        }
        th:nth-of-type(7){
            width:23%;
        }
        /* th:nth-of-type(9){
            width:5%;
        } */
        td.tabledit-view-mode {
            min-width: 150pt;
        }
        td:nth-of-type(5) .tabledit-span{
            display: -webkit-box;
            height: 100px;
            overflow: auto;
            text-overflow: ellipsis; 
        }
        td:nth-of-type(6) .tabledit-span{
            display: -webkit-box;
            width:100%;
            height: 100px;
            overflow: auto;
            text-overflow: ellipsis;
            
        }
        td:nth-of-type(7){
            white-space:wrap;
            word-wrap:break-word !important;
        }
        /* td.tabledit-edit-mode {
            max-width: 300px;
            min-width: 150px;
        }
        .prod_name {
            min-width: 200pt;
        } */
        .btn-toolbar{
            display:inline-flex;
        }
        .form-control {
            font-size: 16pt;
        }
        td input{
            width:100% !important;
            font-size:12pt !important;
        }
        input.col-md-2 {
            padding: 0;
            padding-left: 5px;
            max-width: none;
        }
        input.col-md-4 {
            padding: 0;
            padding-left: 5px;
            max-width: none;
        }
        /* #example{
            display: block;
            overflow-x: auto;
        } */
    </style>


</head>


<body onload="load()">
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="db.php">查詢MySQL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">修改商品資料庫</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">修改訂單資料庫</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member_M.php">修改會員資料庫</a>
            </li>
            <!-- <li class="nav-item">
				<a class="nav-link" href="#">刪除資料庫</a>
			</li> -->
        </ul>
        <div class="row">
            <div class="form-group" style="margin-top: 1em;">
               
            </div>
            <!-- <div class="col-md-2"></div> -->

            <div class="col-md-12 text-center">
                <form action="" class="form-horizontal form-inline" name="modify" id="modify" method="post">
                    <input type="hidden" name="oper" id="oper" value="insert">
                    <input type="hidden" name="stud_no_old" id="stud_no_old" value="">

                    <table class="table table-striped table-bordered" id="example" style="table-layout:fixed;">
                        <caption>
                            Click the table cells to edit.
                        </caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>商品名稱</th>
                                <th>單價</th>
                                <th>庫存</th>
                                <th>圖檔</th>
                                <th>簡介</th>
                                <th>介紹</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $data; ?>
                        </tbody>
                    </table>
                    <table class=" table table-striped">

                    </table>
                    <div class="text-center" style="margin: 0 auto;"><?php echo $header; ?></div>

                </form>
            </div>
        </div>
    </div>
    <script>
        $('#example').Tabledit({
            editButton: false,
            removeButton: false,
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'p_name'],
                    [2, 'p_price'],
                    [3, 'stock'],
                    [4, 'picture', 'file'],
                    [5, 'p_intro', 'textarea', 3],
                    [6,'p_intro_long','textarea',3],
                ]
            }
        });
        // $('#example-2').Tabledit({
        //     columns: {
        //         identifier: [0, 'id'],
        //         editable: [
        //             [1, 'First'],
        //             [2, 'Last'],
        //             [3, 'Nickname', '{"1": "@mdo", "2": "@fat", "3": "@twitter"}']
        //         ]
        //     }
        // });
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>

</html>
<!-- <input class="col-md-2 tabledit-input form-control input-sm" type="text" name="stock" value="28" style="display: none; " disabled="">
<input class="form-control" type="file" id="formFile"> -->