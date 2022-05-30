<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-3.3.1.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(function() {
            var tbl = $('#example').DataTable({
                "ajax": {
                    url: "datatable2_ajax.php",
                    data: function(d) {
                        return $('#form1').serialize() + "&oper=query";
                    },
                    type: 'POST',
                    dataType: 'json'
                },
                "scrollX": false,
                "scrollY": false,
                "scrollCollapse": true, //當筆數小於scrillY高度時,自動縮小
                "displayLength": 10,
                "paginate": true, //是否分頁
                "lengthChange": true,
            });
            //修改
            $('tbody').on('click', '#btn_update', function() {
                var data = tbl.row($(this).closest('tr')).data();
                $('#no').text(data[0]);
                $('#name').val(data[1]);
                $('#username').val(data[2]);
                // if (data[3] == "男")
                //     $('input[name="stud_sex"][value=M]').prop('checked', true);
                // else
                //     $('input[name="stud_sex"][value=F]').prop('checked', true);

                $('#password').val(data[3]);
                $('#mobile').val(data[4]);
                $("#old_no").val(data[0]);
                $("#oper").val("update");
            });
            //取消
            $('tbody').on('click', '#btn_cancel', function() {
                $("#oper").val("insert");
            });
            $('[type="reset"]').click(function() {
                $('#no').html('');
            });
            //刪除
            $('tbody').on('click', '#btn_delete', function() {
                var data = tbl.row($(this).closest('tr')).data();
                if (!confirm('是否確定要刪除?'))
                    return false;

                $("#old_no").val(data[0]);
                $("#oper").val("delete"); //刪除
                CRUD();
            });

            //送出表單 (儲存)
            $("#form1").validate({
                submitHandler: function(form) {
                    CRUD();
                },
                rules: {
                    name: {
                        required: true
                    },
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    },

                }
            });

            function CRUD() {
                $.ajax({
                    url: "datatable2_ajax.php",
                    data: $("#form1").serialize(),
                    type: 'POST',
                    dataType: "json",
                    success: function(JData) {
                        if (JData.code)
                            toastr["error"](JData.message);
                        else {
                            $("#oper").val("insert");
                            toastr["success"](JData.message);
                            tbl.ajax.reload();
                            location.reload("modify_member.php")
                            console.log(JData)
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.responseText);
                        alert(xhr.responseText);
                    }
                });
            }
        });
    </script>
</head>

<body>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 text-center">
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
        <div class="col-md-3"></div>
    </div>
    </div>
</body>

</html>