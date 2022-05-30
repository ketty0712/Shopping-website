function checksize() {
    var height = 0;

    $(".card-text").each(function() {
        if (height < $(this).height()) height = $(this).height();
    });
    $(".card-img-top").each(function() {
        $(this).height($(this).width());
    });
    $(".card-text").each(function() {
        $(this).height(height);
    })
    $(":button[name='view[]']").each(function() {
        $(this).height($(this).next().height());
    });
    // console.log(height2);
}

function cart_aj(id) {
    $.ajax({
        url: 'Cart/cart_ajax.php',
        data: {
            oper: 1,
            add: 1, //1:add 2:remove
            id: id //商品id
        },
        type: 'POST',
        dataType: "json",
        success: function(Jdata) {},
        error: function(xhr, ajaxOptions, thrownError) {}
    })
}

function load_items() {
    $.ajax({
        url: 'load_search_ajax.php',
        data: {
            'keyw': $('[placeholder="Search"]').val()
        },
        type: 'POST',
        dataType: "json",
        success: function(data) {
            var old_last = $('#main').find('.col:last').index() + 1;
            $('#main').find('.col').css('animation-name', 'print_block_back');
            setTimeout(function() {
                $('#main').find('.col').css('display', 'none');
            }, 699); //避免螢幕跳動
            setTimeout(function() {
                $('#main').append(data);
            }, 701);
            setTimeout(function() {
                $('#main').find('.col:lt(' + old_last + ')').remove();
            }, 702); //移除舊的
            setTimeout(function() {
                checksize();
            }, 701);
        },
        error: function(xhr, ajaxOptions, thrownError) {}
    });
}

function tologin() {
    alert('請登入帳戶!!');
    location.href = "login.php";
}
$(function() {

    window.onload = function() {
        checksize();
        // $('.loading').fadeOut();
        setTimeout(function() {
            $('.loader_constant svg').css('animation-name', 'load_ani2');
        }, 500);
        setTimeout(function() {
            $('.loading').css('animation-name', 'load_ani2');
        }, 800);
        setTimeout(function() {
            $('.loader').fadeOut();
        }, 800); //淡出
        // setTimeout( function(){$('.loader').slideToggle("slow");},800);//上拉
        setTimeout(function() {
            $('.loader').remove();
        }, 1500);
    };
    // setTimeout( function(){$('.loader').remove();},1500);
    $(window).resize(function() {
        checksize();
        $(":button[name='view[]']").each(function() {
            $(this).height($(this).next().height());
        });
    });
    $(".text-body").css({
        "margin-bottom": "1rem"
    });
    $('#search_b').click(function() {
        load_items();
        // $(function() {
        //     // $('[name="cart[]"]').click(function(){
        //     //     cart_aj($(this).attr('id'));
        //     // })
        // });
    });
    $('nav').find('.form-control').keyup(function(e) {
        if (e.keyCode == 13) load_items();
    });
    $('#main').on('click', '[name="cart[]"]', function(e) {
        cart_aj($(this).attr('id'));
        id = $(this).attr('id');
        if ($("[name='" + id + "']").html() == undefined) {
            alert('新加入購物車!');
            var price = parseInt($(this).closest('.card-body').find('.text-body').html().substr(4));
            var new_data = '<div class="item_box"><!-- 商品本體 --><div class="item"><!--商品外層容器 --><div class="item_box_contaner"><!--商品內層容器 --><div class="p_img">';
            new_data += '<!-- 商品圖片 --><img src="product_pic/no' + id + '.svg"></div>';
            new_data += '<div class="p_function" width="100%"><div class="p_title">';
            new_data += '<h6>' + $(this).closest('.card-body').find('p').html() + '</h6><div style="width: 20px;height: 20px;cursor: pointer;" name="del"><svg width="18px" height="18px" viewBox="0 0 32 34"><title>刪除</title><g transform="translate(-4 -2)" fill="none" fill-rule="evenodd"><rect width="39" height="39" rx="5"></rect><path d="M34.968 7.865a.689.689 0 0 0-.508-.199h-6.842l-1.55-3.696c-.22-.546-.618-1.01-1.193-1.394-.576-.383-1.16-.576-1.75-.576h-7.083c-.59 0-1.173.193-1.749.576-.576.383-.974.848-1.195 1.394l-1.55 3.696h-6.84a.69.69 0 0 0-.509.2.693.693 0 0 0-.199.509V9.79a.69.69 0 0 0 .199.51.691.691 0 0 0 .51.199h2.125v21.073c0 1.225.346 2.269 1.04 3.132C8.567 35.57 9.4 36 10.374 36h18.418c.974 0 1.808-.447 2.502-1.338.692-.895 1.04-1.953 1.04-3.178V10.5h2.126a.69.69 0 0 0 .508-.2.691.691 0 0 0 .199-.509V8.375a.694.694 0 0 0-.2-.51zM15.71 5.077a.627.627 0 0 1 .376-.245h7.017c.148.031.274.112.376.245l1.062 2.59h-9.916l1.085-2.59zM29.5 31.484c0 .325-.051.624-.155.897-.103.273-.21.472-.32.597-.111.126-.188.189-.233.189H10.375c-.044 0-.121-.063-.233-.189-.11-.125-.217-.324-.32-.597a2.507 2.507 0 0 1-.154-.897V10.5H29.5v20.984zm-16.292-2.567h1.417a.689.689 0 0 0 .51-.199.691.691 0 0 0 .198-.51v-12.75a.69.69 0 0 0-.199-.509.689.689 0 0 0-.51-.199h-1.416a.692.692 0 0 0-.51.2.696.696 0 0 0-.198.509v12.75c0 .207.066.375.199.51a.692.692 0 0 0 .509.198zm5.668 0h1.416a.689.689 0 0 0 .508-.199.687.687 0 0 0 .2-.51v-12.75a.686.686 0 0 0-.2-.509.689.689 0 0 0-.508-.199h-1.416a.689.689 0 0 0-.51.2.69.69 0 0 0-.199.509v12.75c0 .207.066.375.2.51a.689.689 0 0 0 .509.198zm5.665 0h1.417a.689.689 0 0 0 .51-.199.691.691 0 0 0 .199-.51v-12.75a.69.69 0 0 0-.2-.509.689.689 0 0 0-.509-.199h-1.417a.687.687 0 0 0-.508.2.687.687 0 0 0-.2.509v12.75c0 .207.066.375.2.51a.687.687 0 0 0 .508.198z" fill="#34240d"></path></g></svg></div><!-- 移除紐 --></div><div class="p_body"><div class="quentity"><button name="reduce" class="btn btn-outline-dark">-</button><div style="width: 65px;padding:0 10px;">';
            new_data += '<h7 name="p_q" style="display:none">' + $(this).closest('.card-body').find('#stock').html() + '</h7>';
            new_data += '<input type="number" name=' + id + ' style="width: 100%; text-align: center;" value="1" class="form-control form-control-sm"></div><button name="add" class="btn btn-outline-dark">+</button></div>';
            new_data += '<p style="margin-top:1rem; line-height: 1.375rem" name="subtotal">NT ';
            new_data += price.toLocaleString();
            new_data += '</p></div></div></div></div></div><hr><!-- 分隔商品線 -->';
            $('.items_boxes').append(new_data);
            var q = 0;
            if ($('.tit').find('h6').html() != undefined)
                q = parseInt($('.tit').find('h6').text().replace(/[^\d]/g, ''));
            else {
                $('.tit').find('h5').after('<h6 name="tot_q">已加入了項商品</h6>')
            }
            if (isNaN(q)) q = 0;
            $('.tit').find('h6').text("已加入了" + (q + 1) + "項商品");
            var tmp_tot = $('#price').text();
            if (tmp_tot == '')
                tmp_tot = '0';
            tmp_tot = parseInt(tmp_tot.replace(/[^\d]/g, ''));
            tmp_tot += price;
            tmp_tot = tmp_tot.toLocaleString();
            $('#price').text("NT " + tmp_tot);
        } else {
            var price = parseInt($(this).closest('.card-body').find('.text-body').html().substr(4));
            var this_item_cnt = $("[name='" + id + "']"); //數量框
            var count = parseInt(this_item_cnt.val());
            var max = parseInt(this_item_cnt.closest(".quentity").find('[name="p_q"]').html());
            if (count <= max) {
                count++;
                this_item_cnt.val(count);
                this_item_cnt.attr('value', count);
                var tmp_tot = $('#price').text();
                if (tmp_tot == '')
                    tmp_tot = '0';
                tmp_tot = parseInt(tmp_tot.replace(/[^\d]/g, ''));
                tmp_tot += price;
                tmp_tot = tmp_tot.toLocaleString();
                $('#price').text("NT " + tmp_tot);
                var q = parseInt($('.tit').find('h6').text().replace(/[^\d]/g, ''));
                $('.tit').find('h6').text("已加入了" + (q + 1) + "項商品");
                var new_tot = count * price;
                new_tot = new_tot.toLocaleString(); //千分位逗號
                this_item_cnt.closest('.p_body').find('p').html("NT$" + new_tot);
            }
        }
    });
});
$(function() {
    var counter = 0, // 一開始要顯示的圖，0 的話就是顯示第一張
        slide = document.querySelector('#slide'),
        items = slide.querySelectorAll('label'), // 抓取所有 img
        items_line = slide.querySelectorAll('#line_ind'),
        itemsCount = items.length, // 圖片總數 
        prevCnt = document.createElement('a'), // 上一張按鈕容器
        nextCnt = document.createElement('a'), // 下一張按鈕容器
        prevBtn = document.createElement('span'), // 上一張按鈕
        nextBtn = document.createElement('span'), // 下一張按鈕
        timer = 3000, // 3 秒換圖
        interval = window.setInterval(showNext, timer); // 設定循環
    prevCnt.classList.add('carousel-control-prev'); // 幫上一張按鈕加 class＝"prev" 給 CSS 指定樣式用
    nextCnt.classList.add('carousel-control-next'); // 給 CSS 指定樣式用
    prevCnt.classList.add('prev'); // 幫上一張按鈕加 class＝"prev" 給 CSS 指定樣式用
    nextCnt.classList.add('next'); // 幫下一張按鈕加 class＝"next" 給 CSS 指定樣式用
    prevBtn.classList.add('carousel-control-prev-icon'); // 給 CSS 指定樣式用
    nextBtn.classList.add('carousel-control-next-icon'); // 給 CSS 指定樣式用
    prevCnt.appendChild(prevBtn);
    nextCnt.appendChild(nextBtn);
    $('#slide').append(prevCnt); // 將按鈕加到 #slide 裡
    $('#slide').append(nextCnt);
    // 帶入目前要顯示第幾張圖 
    var showCurrent = function() {
        var itemToShow = Math.abs(counter % itemsCount); // 取餘數才能無限循環
        [].forEach.call(items, function(el) {
            el.classList.remove('show'); // 將所有 img 的 class="show" 移除
        });
        [].forEach.call(items_line, function(el) {
            el.classList.remove('active'); // 將所有 img 的 class="show" 移除
        });
        items[itemToShow].classList.add('show'); // 將要顯示的 img 加入 class="show"
        items_line[itemToShow].classList.add('active'); // 將要顯示的 跑條 加入 class="active"

    };

    function showNext() {
        counter++; // 將 counter+1 指定下一張圖
        showCurrent();
    }

    function showPrev() {
        counter--; // 將 counter－1 指定上一張圖
        showCurrent();
    }
    // 滑鼠移到 #slider 上方時，停止循環計時
    slide.addEventListener('mouseover', function() {
        interval = clearInterval(interval);
    });
    // 滑鼠離開 #slider 時，重新開始循環計時
    slide.addEventListener('mouseout', function() {
        interval = window.setInterval(showNext, timer);
    });
    // 綁定點擊上一張，下一張按鈕的事件
    nextBtn.addEventListener('click', showNext, false);
    prevBtn.addEventListener('click', showPrev, false);
    // 一開始秀出第一張圖，也可以在 HTML 的第一個 img 裡加上 class="show"
    items[0].classList.add('show');
});