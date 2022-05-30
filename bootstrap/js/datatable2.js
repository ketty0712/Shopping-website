var tbl;
$(function() {
    //查詢
    tbl = $('#example').DataTable({
        "scrollX": false,
        "scrollY": false,
        "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
        "displayLength": 10,
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        "paginate": true, //是否分頁
        "lengthChange": true,
        "ajax": {
            url: "datatable2_ajax.php",
            data: function(d) {
                return $('#form1').serialize() + "&oper=query";
            },
            type: 'POST',
            dataType: 'json'
        },
        "dom": 'frtip'
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
$