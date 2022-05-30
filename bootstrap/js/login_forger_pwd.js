$(document).ready(function($) {
    $(".out-window").css('display', 'none'); //預設忘記密碼的視窗是看不到的
    $("#is_you").css('display', 'none'); //尋找用戶的內容也是空的
    //"忘記密碼"被點擊
    $(".forget-a").click(function() {
        $(".out-window").fadeIn(); //顯示視窗
        $("#inputEmail").val(''); //顯示清空輸入信箱的欄位
        $("#find_user").css('display', 'block'); //輸入信箱的部分顯示
        $("#is_you").css('display', 'none'); //尋找用戶的內容隱形
        $("#send_mail").css('display', 'none'); //送出信件的提示訊息隱形
    });
    //"關閉"忘記密碼視窗被點擊
    $(".forger-window-close").click(function() {
        $(".out-window").css('display', 'none'); //視窗全體隱形
        $("#is_you").css('display', 'none');
        $("#send_mail").css('display', 'none');
    });
    //送出mail搜尋
    $("#mail_s").click(function() {
        // if ($('#inputEmail').val()) {}
        $('#is_you').append('<h6>為您搜尋中...</h6>'); //loading文字
        $.ajax({
            url: "check_mail_ajax.php",
            data: {
                'email': $('#inputEmail').val()
            },
            type: 'POST',
            dataType: "json",
            success: function(JData) {
                $('#is_you').empty();
                for (var i = 0; i < JData.name.length; i++) {
                    var row = JData.name[i];
                    $('#is_you').append(row);
                }
                $("#send_mail").css('display', 'none'); //隱形提示文字
                //選擇帳戶
                $("[name='groupu[]']").change(function() {
                    $("[name='groupu[]']").closest($('label')).css('background-color', 'white');
                    $("[name='groupu[]']:checked").closest($('label')).css('background-color', '#e8f0fe');
                });
                //選擇上一頁
                $("#re").click(function() {
                    $("#find_user").css('display', 'block');
                    $('#is_you').empty();
                    $("#is_you").css('display', 'none');
                    $("#send_mail").css('display', 'none');
                });
                //選擇確認並送信(如果有先選帳戶的話才送信，不然跳警告)
                $("#s_mail").click(function() {
                    if ($("[name='groupu[]']:checked").attr('value') == null) {
                        $("#send_mail").remove();
                        $('#is_you').append('<div id="send_mail"><h6 style="color:red;">請選擇帳號！<h6></div>');
                    } else
                        $.ajax({
                            url: "check_mail_ajax.php",
                            data: {
                                'email': $('#inputEmail').val(),
                                'send_op': $("[name='groupu[]']:checked").attr('value')
                            },
                            type: 'POST',
                            dataType: "json",
                            success: function(JData) {
                                $("#send_mail").remove();
                                $('#is_you').append(JData);
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                                alert(xhr.responseText);
                            }
                        });
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(xhr.responseText);
                alert(xhr.responseText);
            }
        });
        $("#find_user").css('display', 'none'); //輸入信箱隱形
        $("#is_you").css('display', 'block'); //選擇帳戶顯示
        $("#send_mail").css('display', 'none'); //提示隱形
    });
}); //尋找用戶的內容也是空的//尋找用戶的內容也是空的ㄒㄧㄢ//顯示是//芋ㄙㄨi//loading文字$('#inputEmail').val()==""{ㄑㄧㄥ""