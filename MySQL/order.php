<?php
$href = 3;
include('nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>訂單查詢</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="../bootstrap/js/datatable4.js"></script>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("https://bootswatch.com/5/litera/bootstrap.css");

        fieldset {
            display: block;
            margin-inline-start: 2px;
            margin-inline-end: 2px;
            padding-block-start: 0.35em;
            padding-inline-start: 0.75em;
            padding-inline-end: 0.75em;
            padding-block-end: 0.625em;
            min-inline-size: min-content;
            border-width: 2px;
            border-style: groove;
            border-color: threedface;
            border-image: initial;
            border-radius: 10pt;
        }

        .container {
            margin: 1em auto;
            /* width: 60%; */
            max-width: 100%;
            padding: 5em auto;
        }

        th,
        td {
            word-break: keep-all;
            vertical-align: middle !important;
        }

        body {
            font-size: 14pt !important;
        }

        .form-control {
            padding: 0.5em !important;
            font-size: 14pt !important;
            letter-spacing: 0.1em;
            margin-inline-end: 0px;
        }

        .dataTables_scroll {
            width: 100%;
        }

        /* #example{
            table-layout: fixed;
        } */
    </style>
</head>
<script>
    function checksize() {
        var table = $('#form1').find('td');
        table.each(function() {
            $(this).css('font-size', '14pt');
        });
        var Arrtd = $("#example").find("td");
        Arrtd.each(function() {
            if ($(this).height() > 300) {
                $(this).height(300);
                $(this).addClass("max-height", "300px");
            }
        })
    }
    // $(function() {
    //     $("#products").on('click', 'button.add', function() {
    //         $("#products").append($("#products>div").html());
    //         $("#quantity").append($("#quantity>p").html());
    //     });
    // });
</script>

<body onload="checksize();">
    <div class="container">
        <form name="form1" id="form1" method="POST">
            <fieldset>
                <legend>訂單資料</legend>
                <input type="hidden" name="oper" id="oper" value="insert">
                <input type="hidden" name="old_no" id="old_no" value="">
                <table id="edit" align="center" class="table table-striped table-bordered table-responsive-sm">
                    <tr>
                        <td class="div_title" style="width:30pt;">訂單編號</td>
                        <td class="div_title" style="width:90pt;">訂購人ID</td>
                        <td class="div_title">訂購人名稱</td>
                        <td class="div_title" style="width:400pt;">訂購商品</td>
                        <td class="div_title" style="width:100pt;">數量</td>
                    </tr>
                    <tr>
                        <td class="div_title">
                            <input type="text" name="order_id" id="order_id" class="div_texbox form-control" />

                            <!--  -->
                        </td>
                        <td class="div_title">
                            <input type="text" name="member_id" id="member_id" class="div_texbox form-control" placeholder="會員編號" />
                        </td>
                        <td class="div_title" name="member_name" id="member_name"></td>
                        <td>
                            <div id="products">
                                <div>
                                    <div style="display:flex; margin-bottom: 1rem;">
                                        <select name="product_id" id="product_id" class="form-control form-select" style="padding: 0.5rem 3.3rem 0.5rem 1.1rem !important; width:max-content; margin-right: 1rem">
                                            <option value="0">請選擇</option>
                                            <?php for ($i = 1; $i <= 12; $i++) {
                                                echo "<option value=\"$i\" name>$i</option>";
                                            } ?>
                                        </select>
                                        <!-- <button type="button" class="add btn btn-outline-success" style="margin-right: 1rem;"> <i class="bi bi-plus-lg"></i> </button> -->
                                        <input type="text" name="product_name" class="form-control" disabled style="padding: 0.5rem 3.3rem 0.5rem 1.1rem !important; width:max-content; margin-right: 1rem" />
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="div_title">
                            <div id="quantity">
                                <p><input type="text" name="product_quantity" id="product_quantity" class="div_texbox form-control" placeholder="數量" style="padding: 0.5rem 3.3rem 0.5rem 1.1rem !important; margin-right: 1rem; margin-bottom:1rem;"></p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center">
                            <button type="submit" id="btn-save" class="btn btn-primary"><i class="bi bi-save2"></i>&nbsp;存檔</button>
                            <button type="reset" id="btn-cancel" class="btn btn-secondary"><i class="bi bi-folder-x"></i>&nbsp;取消</button><br>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <div class="container">
                <!-- <div class="col-md-1"></div> -->
                <div class="text-center">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">訂單編號</th>
                                <th class="text-center">會員編號</th>
                                <th class="text-center">會員姓名</th>
                                <th class="text-center">訂購商品</th>
                                <th class="text-center">商品編號</th>
                                <th class="text-center">訂購數量</th>
                                <th class="text-center">修改/刪除</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- <div class="col-md-1"></div> -->
            </div>
        </form>

    </div>
</body>

</html>