<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] < 9) echo '<script>alert("請登入管理者帳戶!");location.href="../login.php";</script>';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/people.svg" />
    <!-- 管理者介面－帳戶管理 第二版(完整) -->
    <?php $href = 4;
    include('nav.php');
    ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">

    <title>會員資料管理</title>


    <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="../bootstrap/js/datatable2.js"></script>

    <style>
        @import url("//cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("//bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("//bootswatch.com/5/litera/bootstrap.css");

        body {
            font-family: "微軟正黑體";
            font-size: 16pt;
            line-height: 1.15;
        }

        /* .dataTables_scroll {} */

        table,
        .table {
            font-size: 14pt;
        }

        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc_disabled:before {
            right: 0 !important;
            content: "" !important;
        }

        #example thead .sorting:after,
        #example thead .sorting_asc:after,
        #example thead .sorting_desc:after,
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:after {
            right: 0 !important;
            content: "" !important;
        }

        table.dataTable thead th {
            position: relative;
            background-image: none !important;
        }

        table.dataTable thead th.sorting:after,
        table.dataTable thead th.sorting_asc:after,
        table.dataTable thead th.sorting_desc:after {
            position: absolute !important;
            top: 12px !important;
            right: 8px !important;
            display: block !important;
            font-family: FontAwesome !important;
        }

        table.dataTable thead .sorting:after {
            content: "\f0dc" !important;
        }

        table.dataTable thead th.sorting_asc:after {
            content: "\f160" !important;
        }

        table.dataTable thead th.sorting_desc:after {
            content: "\f161" !important;
        }

        .dataTables_scroll {
            width: 100%;
        }

        .error {
            color: #D82424;
            font-weight: normal;
            display: inline;
            padding: 1px;
        }

        .btn {
            padding: 0.25rem 0.5rem;
            border-radius: 0.35rem;
        }

        input[type="text"] {
            font-size: 14pt;
        }

        th,
        td {
            word-break: keep-all;
            vertical-align: middle !important;
        }

        #edit {
            margin-top: 1em;
            margin-bottom: 3em;
        }

        .dataTables_scrollBody .odd:hover,
        .dataTables_scrollBody .even:hover {
            background-color: #daebffbf;
        }

        .div.dataTables_wrapper div.dataTables_paginate {
            margin: 1em !important;
        }

        .pagination a {
            position: relative;
            display: block;
            color: #4582ec;
            margin-left: -1px;
            line-height: 1.25;
            padding: 0.375rem 0.75rem;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
    </style>
</head>
<script>
    $(window).resize(function() {
        checksize();
    });
    $('#example_next').click(function() {
        setTimeout(function() {
            $('.pagination').find('a').addClass('page-link');
        }, 1500);
    })

    function checksize() {
        $(".dataTables_scroll").find(".table:eq(0)").find("tr:eq(0) th:eq(0)").width("50");
        var tb = $(".dataTables_scroll").find(".table:eq(1)");
        var c = 0;
        tb.find('tr').each(function() {
            var tdArr = $(this).children();
            tdArr.eq(0).width("50");
        });
        $("#example_wrapper").removeClass("form-inline");
        $("table").eq(2).find("th").css("content", "");
        $(".pagination").find("li").addClass("page-item");
        $(".pagination").find("li a").addClass("page-link");
        $(".pagination").find("li:first a").html('<span aria-hidden="true">&laquo;</span>');
        $(".pagination").find("li:last a").html('<span aria-hidden="true">&raquo;</span>');
        $(".dataTables_paginate").find("#example_previous").find("a").html('&laquo');

        $(".dataTables_paginate").find("#example_next").find("a").html('&raquo');

    }
    $(function() {
        $(".page-link").load(function() {
            $(".pagination").find("li").addClass("page-item");
            $(".pagination").find("li a").addClass("page-link");
            $(".pagination").find("li:first a").html('<span aria-hidden="true">&laquo;</span>');
            $(".pagination").find("li:last a").html('<span aria-hidden="true">&raquo;</span>');
        });
    });
</script>

<body onload="checksize();">
    <div class="container">
        <div class="text-center">
            <form class="form-horizontal" name="form1" id="form1" method="post">
                <input type="hidden" name="oper" id="oper" value="insert">
                <input type="hidden" name="old_no" id="old_no" value="">
                <table id="edit" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">編號</th>
                            <th class="text-center">姓名</th>
                            <th class="text-center">使用者名稱</th>
                            <th class="text-center">密碼</th>
                            <th class="text-center">連絡電話</th>
                            <th class="text-center">存檔/取消</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 16pt;">
                        <tr>
                            <td><span id="no"></span></td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="姓名">
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="password" name="password" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-xs" id="btn-save"><i class="glyphicon glyphicon-save"></i>存檔</button>
                                <button type="reset" class="btn btn-danger btn-xs" id="btn-cancel">取消</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <div class="row">
                <div class="text-center">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">編號</th>
                                <th class="text-center">姓名</th>
                                <th class="text-center">使用者</th>
                                <th class="text-center">密碼</th>
                                <th class="text-center">連絡電話</th>
                                <th class="text-center">修改/刪除</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>