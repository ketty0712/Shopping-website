var tbl;
$(function() {
    //查詢
    tbl = $('#example').DataTable({
        "scrollX": false,
        "scrollY": false,
        "scrollCollapse": false, //當筆數小於scrillY高度時,自動縮小
        "displayLength": 10,
        "paginate": true, //是否分頁
        "lengthChange": true,
        "ajax": {
            url: "datatable4_ajax.php",
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
        $('#order_id').val(data[0]);
        $('#member_id').val(data[1]);
        $('#member_name').text(data[2]);
        // $('#member_id').attr('disabled', 'disabled');
        $('#member_id').attr('readonly', 'readonly');
        $('[name="product_id"]').val(data[4]);
        $('[name="product_name"]').val(data[3]);
        $('#product_quantity').val(data[5]);
    });
    // $('#order_id').keyup(function() {
    //     if ($(this).val().length > 0) $('#member_id').attr('readonly', 'readonly');
    //     else $('#member_id').removeAttr('readonly');
    // })
    $('#member_id').keyup(function() {
        // console.log('Enter');
        var re = /^[0-9] .?[0-9]*/; //正規
        if (!re.test($(this).val()) && ($(this).val()).length > 0)
            $.ajax({
                url: "search_mem_product_ajax.php",
                data: $("#form1").serialize() + "&oper=search_mem",
                type: 'POST',
                dataType: "json",
                success: function(JData) {
                    // if (JData.code)
                    //     toastr["error"](JData.message);
                    // else {
                    //     $("#oper").val("insert");
                    //     toastr["success"](JData.message);
                    //     tbl.ajax.reload();
                    //     // location.reload("modify_order.php ")
                    //     console.log(JData)
                    // }
                    if (JData.code) {
                        $('#member_name').text(JData.message);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    alert(xhr.responseText);
                }
            });
        else $('#member_name').text('');
    });
    $('#product_id').change(function() {
        if ($('#product_id').val() == 0) {
            $('[name="product_name"]').val('');
        }
        // alert($('#product_id').val());
        var re = /^[0-9] .?[0-9]*/; //正規
        if (!re.test($('#member_id').val()) && $('#member_id').length > 0 && $('#product_id').val() != 0) {
            $.ajax({
                url: "search_mem_product_ajax.php",
                data: $("#form1").serialize() + "&oper=search_product",
                type: 'POST',
                dataType: "json",
                success: function(JData) {
                    // if (JData.code)
                    //     toastr["error"](JData.message);
                    // else {
                    //     $("#oper").val("insert");
                    //     toastr["success"](JData.message);
                    //     tbl.ajax.reload();
                    //     // location.reload("modify_order.php ")
                    //     console.log(JData)
                    // }
                    if (JData.code) {
                        $('[name="product_name"]').val(JData.message);

                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    alert(xhr.responseText);
                }
            });
        }
    });
    //取消
    $('tbody').on('click', '#btn_cancel', function() {
        $("#oper").val("insert");
    });
    $('[type="reset"]').click(function() {
        $('#no').html('');
        $('#member_id').removeAttr('readonly');
    });
    //刪除
    $('tbody').on('click', '#btn_delete', function() {
        var data = tbl.row($(this).closest('tr')).data();
        if (!confirm('是否確定要刪除?'))
            return false;
        $("#old_no").val(data[0]);
        $('[name="product_id"]').val(data[4]);
        $("#oper").val("delete"); //刪除
        CRUD();
    });
    $('.pagination').find('a').addClass('page-link');
    //送出表單 (儲存)
    $("#form1").validate({
        submitHandler: function(form) {
            CRUD();
        },
        rules: {
            order_id: {
                required: true
            },
            member_id: {
                required: true
            },
            product_id: {
                required: true,
                min: 1
            },
            product_quantity: {
                required: true
            },
        },
        messages: {
            product_id: {
                required: "必選",
                min: "必選"
            },
        }
    });

    function CRUD() {
        $.ajax({
            url: "datatable4_ajax.php",
            data: $("#form1").serialize(),
            type: 'POST',
            dataType: "json",
            success: function(JData) {
                if (JData.code)
                    toastr["error"](JData.message);
                else {
                    $("#oper").val("insert");
                    toastr["success"](JData.message);
                    // setTimeOut(function() {
                    //     // tbl.ajax.reload();
                    // }, 500);
                    location.reload("modify_order.php ")
                        // tbl.ajax.reload();
                    console.log(JData);
                }
                $('#member_id').removeAttr('disabled');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
                // alert(xhr.responseText);
            }
        });
    }

});