var tbl;
$(function() {
    tbl = $('#example').DataTable({
        "scrollX": false,
        "scrollY": false,
        "scrollCollapse": true, //當筆數小於scrillY高度時,自動縮小
        "displayLength": 10,
        "paginate": true, //是否分頁
        "pagingType": "simple_numbers",
        "lengthChange": true,
        "ajax": {
            url: 'datatable3_ajax.php',
            data: function(d) {
                return $('#form1').serialize() + "&oper=query";
            },
            type: 'POST',
            dataType: 'json'
        },
        "dom": 'frtip'
    });
    $(".pagination").find("li").addClass("page-item");
    $(".pagination").find("li a").addClass("page-link");
    $(".pagination").find("li:first a").html('<span aria-hidden="true">&laquo;</span>');
    $(".pagination").find("li:last a").html('<span aria-hidden="true">&raquo;</span>');
    $('.dataTables_length').addClass('bs-select');
    tbl.columns.adjust();
    //修改
    $('tbody').on('click', '#btn_update', function() {
        var data = tbl.row($(this).closest('tr')).data();
        // $('#id').text(data[0]);
        $('#product_name').val(data[1]);
        $('#product_price').val(data[2]);
        $('#product_stock').val(data[3]);
        if (data[4] != "") {
            // here!!
            $('#product_picture2').html("<img src='../" + data[4] + "' height='200'/>");
        }
        var reTag = /<(?:.|\s)*?>/g;
        var a = data[5].replace(/<br>/g, "\n"),
            b = data[6].replace(/<br>/g, "\n");
        $('#intro').text(a.replace(reTag, ""));
        $('#intro_long').text(b.replace(reTag, ""));
        $("#old_no").val(data[0]);
        $('#old_file').val(data[4]);
        $("#oper").val("update");
    });
    //取消
    $('tbody').on('click', '#btn_cancel', function() {
        $("#oper").val("insert");
        // $('#product_picture2').attr('src', ''); //我在f12是可以跑的
    });
    $('[type="reset"]').click(function() {
        // alert('?');
        $('span').html('');
        $('textarea').text('');
        // if ($('#product_picture2').html() != '') {
        //     console.log('掛掉了');
        // } else {
        //     console.log('掛掉了!');
        // }
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
            product_name: {
                required: true
            },
            product_price: {
                required: true
            },
            product_stock: {
                required: true
            },
            intro: {
                required: true
            },
            intro_long: {
                required: true
            },
        }
    });

    function CRUD() {
        // let form_data = new FormData($('#form1').serialize());
        // form_data.append('product_picture', getElementById('product_picture').files[0]);
        var data = new FormData($("#form1")[0]);
        readURL(document.getElementById('product_picture'));
        $.ajax({
            url: "datatable3_ajax.php",
            // data: $('#form1').serialize() + '&producct_picture=' + $('[name="product_picture"]')[0].files[0],
            data: data,
            type: 'POST',
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(JData) {
                if (JData.code)
                    toastr["error"](JData.message);
                else {
                    $("#oper").val("insert");
                    toastr["success"](JData.message);
                    tbl.ajax.reload();
                    location.reload("modify_product.php");
                    console.log(JData);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
                alert(xhr.responseText);
            }
        });
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#product_picture2').html("<img src='" + e.target.result + "' height='200'/>");
                // return e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

});