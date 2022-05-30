<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改會員資料</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>訂單搜尋頁面</title>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("https://bootswatch.com/5/litera/bootstrap.css");

        .table td,
        .table th {
            /* min-width: 100pt; */
            vertical-align: middle;
        }

        .table {
            border-radius: 5pt;
        }
    </style>
</head>

<body>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">查詢MySQL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product_M.php">修改商品資料庫</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">修改訂單資料庫</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">修改會員資料庫</a>
            </li>
        </ul>
        <div class="table-responsive-sm">
            <table class="table table-hover table-striped table-bordered mt-5 text-center" id="table2">
                <caption>會員清單</caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">username</th>
                        <th scope="col">password</th>
                        <th scope="col">mobile</th>
                        <th scope="col">tel</th>
                        <th scope="col">email</th>
                        <th scope="col">address</th>
                        <th scope="col">birthday</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $link = mysqli_connect("localhost", "root", "root123456", "group_15") // 建立MySQL的資料庫連結
                        or die("無法開啟MySQL資料庫連結!<br>");

                    $sql = "select * from m_info"; // 指定SQL查詢字串

                    mysqli_query($link, 'SET CHARACTER SET utf8');
                    mysqli_query($link, "SET collation_connection = 'utf8_unicode_ci'");
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
                                $data .= "<th scope=\"row\" style=\"max-width:50pt;\">" . $row[$arr[0]] . "</th>";
                                for ($i = 1; $i < count($row); $i++)
                                    if ($arr[$i] == "birthday")
                                        $data .= "<td style=\"min-width:150pt;\">" . $row[$arr[$i]] . "</td>";
                                    else $data .= "<td>" . $row[$arr[$i]] . "</td>";
                                $data .= "</tr>";
                            }
                        }
                        $data .= "</tbody>";
                        mysqli_free_result($result); // 釋放佔用的記憶體
                    }
                    echo $data;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <script src="../bootstrap/js/bstable.js"></script>
    <script>
        var example2 = new BSTable("table2", {
            editableColumns: "1,2, 3, 4, 5, 6, 7, 8",
            $addButton: $('#table2-new-row-button'),
            onEdit: function() {
                console.log("EDITED");
            },
            advanced: {
                columnLabel: ''
            }
        });
        example2.init();
    </script> -->
</body>

</html>