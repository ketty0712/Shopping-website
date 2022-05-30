<?php
$href = 2;
include('nav.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品資料管理</title>
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
    <script src="../bootstrap/js/datatable3.js"></script>
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

        /* #example{
            table-layout: fixed;
        } */
    </style>
</head>
<script>
    function checksize() {
        var Arrtd = $("#example").find("td");
        Arrtd.each(function() {
            if ($(this).height() > 300) {
                $(this).height(300);
                $(this).addClass("max-height", "300px");
            }
        })
        // $('#example').find('tr td:eq(7)').css("min-width","200px");
    }
</script>

<body onload="checksize();">
    <div class="container">

        <form name="form1" id="form1" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>商品資訊</legend>
                <input type="hidden" name="oper" id="oper" value="insert">
                <input type="hidden" name="old_no" id="old_no" value="">
                <table id="edit" align="center" class="table table-striped table-bordered table-responsive-sm">
                    <tbody>
                        <tr>
                            <th class="div_title">商品名稱：</th>
                            <td>
                                <input type="text" name="product_name" id="product_name" class="form-control div_texbox">
                            </td>
                            <th class="div_title">單價：</th>
                            <td>
                                <input type="text" name="product_price" id="product_price" class="form-control div_texbox" />
                            </td>
                            <th class="div_title">商品庫存：</th>
                            <td>
                                <input type="text" name="product_stock" id="product_stock" size="10" class="form-control div_texbox" />
                            </td>
                        </tr>
                        <tr>
                            <th class="div_title">上傳商品照：</th>
                            <td>
                                <!-- <input type='hidden' name='MAX_FILE_SIZE' value='1024000'> -->
                                <input type='file' name='product_picture' id="product_picture" />
                            </td>
                            <th>商品快照：</th>
                            <td colspan="3" style="text-align: center; padding: 5pt;">
                                <input type="hidden" name="old_file" id="old_file" value="">

                                <span name='product_picture2' id="product_picture2">

                                </span>
                                <!-- <input type="hidden" name="file_name" id="file_name" value=""> -->
                            </td>
                        </tr>
                        <tr>
                            <th class="div_title">簡介：</th>
                            <td colspan="5">
                                <textarea class="form-control" name="intro" id="intro" rows="3"></textarea>
                                <!-- <input type="text" name="moderator" id="moderator" class="div_texbox" /> -->
                            </td>
                        </tr>
                        <tr>
                            <th class="div_title">詳介：</th>
                            <td colspan="5">
                                <textarea class="form-control" id="intro_long" name="intro_long" rows="6"></textarea>
                                <!-- <input type="text" name="moderator" id="moderator" class="div_texbox" /> -->
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" align="center">
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                <button type="submit" id="btn-save" class="btn btn-primary"><i class="bi bi-save2"></i>&nbsp;存檔</button>
                                <button type="reset" id="btn-cancel" class="btn btn-secondary"><i class="bi bi-folder-x"></i>&nbsp;取消</button><br>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </fieldset>
            <div class="container">
                <!-- <div class="col-md-1"></div> -->
                <div class="text-center">

                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">編號</th>
                                <th class="text-center">商品名稱</th>
                                <th class="text-center">商品單價</th>
                                <th class="text-center">商品庫存</th>
                                <th class="text-center">商品圖片</th>
                                <th class="text-center">商品簡介</th>
                                <th class="text-center">商品詳介</th>
                                <th class="text-center">修改/刪除</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- <div class="col-md-1"></div> -->
            </div>
        </form>


    </div>
    </div>
</body>

</html>