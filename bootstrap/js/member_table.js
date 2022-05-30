var tbl;
$(function() {
    //Search
    tbl = $('#example').DataTable({
        "scrollX": false,
        "scrollY": false,
        "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
        "displayLength": 10,
        "paginate": true, //是否分頁
        "lengthChange": true,
        "ajax": {
            url: "member_table_ajax.php",
            data: function(d) {
                return $('#form1').serialize() + "&oper=query";
            },
            type: 'POST',
            dataType: 'json'
        },
        "dom": 'frtip'
    });
    //modify
    $('.tbody').on('click', '#btn_update', function() {
        var data = tbl.row($(this).closest('tr')).data();
        $('#name').val(data[1]);
        $('#username').val(data[2]);
        $('#password').val(data[3]);
        $('#mobile').val(data[4]);
        $('#email').val(data[6]);
        $('#address').val(data[7]);
        // if (data[2] == "男")
        //     $('input[name="stud_sex"][value=M]').prop('checked', true);
        // else
        //     $('input[name="stud_sex"][value=F]').prop('checked', true);

        // $('#stud_addr').val(data[3]);
        $("#no_old").val(data[0]);
        $("#oper").val("update");
    });
    //取消
    $('tbody').on('click', '#btn_cancel', function() {
        $("#oper").val("insert");
    });
    //刪除
    $('tbody').on('click', '#btn_delete', function() {
        var data = tbl.row($(this).closest('tr')).data();
        if (!confirm('是否確定要刪除?'))
            return false;

        $("#no_old").text(data[0]);
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
                required: true,
                minlength: 3,
                maxlength: 8
            },
            username: {
                required: true
            },
            password: {
                required: true
            }
        }
    });

    function CRUD() {
        $.ajax({
            url: "member_table_ajax.php",
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
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
                alert(xhr.responseText);
            }
        });
    }
});