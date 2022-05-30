<!-- 以下範例主要說明加入購物車的基本做法，商品資料要改成從資料庫擷取 -->
<?php
session_start();
error_reporting(0);
$arr_cart = array_filter(explode(",", $_SESSION['cart']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購物車</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
  

    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>訂單搜尋頁面</title>
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("https://bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("https://bootswatch.com/5/litera/bootstrap.css");

        .input-group {
            flex-wrap: nowrap;
        }

        .add,
        .reduce {
            width: 2pt;
            padding: 0.5rem 1rem;
        }

        /* .form-control {
                text-align: center;
        } */
        @media (max-width: 1400px) {
            .form-control {
                text-align: center;
                padding-left: 0;
                padding-right: 0;
            }

            .add,
            .reduce {
                text-align: center;
                padding-left: 7pt;
            }
        }
    </style>
    <script>
        function cart(add_remove, id) {
            $.ajax({
                url: 'cart_ajax.php',
                data: {
                    oper: add_remove, //1:add 2:remove
                    id: id
                },
                type: 'POST',
                dataType: "json",
                success: function(Jdata) {
                    for (var i = 1; i <= 3; i++) {
                        if (jQuery.inArray(i.toString(), Jdata) >= 0) //物品已在購物車
                        {
                            $("#p" + i).text("取消購物車");
                            $("#p" + i).attr("onclick", "cart(2," + i + ")");
                        } else {
                            $("#p" + i).text("加入購物車");
                            $("#p" + i).attr("onclick", "cart(1," + i + ")");
                        }
                    }
                    $("#cart_cnt").html(Jdata.length); //顯示購物車物品數量
                },
                error: function(xhr, ajaxOptions, thrownError) {}
            });
        }
    </script>
</head>
<style>
    img {
        width: 100pt;
    }

    .count {
        width: 30pt;
    }
</style>


<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills pull-right">
                    <li role="presentation"><a href="#">購物車<span id="cart_cnt" class="badge alert-danger"></span></a></li>
                    <li role="presentation"><a href="#">登出</a></li>
                </ul>
            </nav>
            <h3 class="text-muted">線上購物網站</h3>
            <hr>
        </div>
        <div id="app">
            <div class="row">
                <div class="col-md-offset-2 col-md-10 col-md-offset-1">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td><input type="checkbox" v-model="checkAll" @click="selectAll"></td>
                            <th>商品編號</th>
                            <th>商品名稱</th>
                            <th>商品圖片</th>
                            <th>購物車</th>
                            <th>操作</th>
                        </tr>
                        <tr v-for="(item,index) in listInfo">
                            <td><input type="checkbox" :value="item.id" v-model="checkItem" @change="selectOne" /></td>
                            <td>{{item.id}}</td>
                            <td>{{item.pName}}</span></td>
                            <td><img :src="item.url"></td>
                            <td style="width: 100pt;">
                                <!-- <button id="p1" onclick="cart(1,1)">加入購物車</button> -->
                                <button class="btn btn-default" @click="reduce(index)">-</button>
                                <input type="text " class="count" v-model="item.shopCount" />
                                <button class="btn btn-default" @click="add(index)">+</button>
                            </td>
                            <td>
                                <button class="btn btn-warning" @click="del(index)">刪除</button>
                            </td>

                        </tr>
                    </table>
                    <p class="text-right">金額：{{sum}}</p>
                    <p class="text-right">商品數量：{{count}}</p>
                </div>
            </div>
        </div>

        <footer class="footer">
            <p></p>
        </footer>
        <script>
            const vm = new Vue({
                el: "#app",
                data: {
                    listInfo: [{
                            id: 1,
                            pName: "跑者之道：一趟追索日本跑步文化的旅程",
                            shopPrice: 1000,
                            shopCount: 0,
                            url: "../product_pic/no1.svg"
                        },
                        {
                            id: 2,
                            pName: "跑馬拉松絕對不能做的35件事",
                            shopPrice: 2000,
                            shopCount: 0,
                            url: "../product_pic/no2.svg"
                        },
                        {
                            id: 3,
                            pName: "就是愛挑戰！最強的鐵人三項訓練書",
                            shopPrice: 3000,
                            shopCount: 0,
                            url: "../product_pic/no3.svg"
                        }
                    ],
                    pName: "",
                    shopPrice: "",
                    url: "",
                    checkItem: [],
                    checkAll: false
                },
                methods: {
                    add: function(index) {
                        this.listInfo[index].shopCount++;
                    },
                    reduce: function(index) {
                        if (this.listInfo[index].shopCount > 0) this.listInfo[index].shopCount--;
                        else this.listInfo[index].shopCount = 0;
                    }, 
                    del: function(index) {
                        this.listInfo.splice(index, 1);
                    },
                    addInfo: function() {
                        var obj = {
                            id: this.listInfo.length + 1,
                            pName: this.pName,
                            shopPrice: this.shopPrice,
                            shopCount: 1
                        }
                        console.log(obj);
                        this.listInfo.push(obj)
                    },
                    selectAll: function() {
                        this.checkItem = []
                        if (!this.checkAll) {
                            for (var i = 0; i < this.listInfo.length; i++) {
                                this.checkItem.push(this.listInfo[i].id)
                            }
                        } else {
                            this.checkItem = []
                            this.checkAll = false
                        }
                    },
                    selectOne() {
                        console.log(this.checkItem)
                        if (this.checkItem.length == this.listInfo.length) {
                            this.checkAll = true
                        } else this.checkAll = false
                    },
                },
                computed: {
                    sum() {
                        var total = 0
                        for (var i = 0; i < this.listInfo.length; i++) {
                            total += parseFloat(this.listInfo[i].shopPrice) * parseFloat(this.listInfo[i].shopCount)
                        }
                        return total
                    },
                    count: function() {
                        var total = 0
                        for (var i = 0; i < this.listInfo.length; i++) {
                            total += parseInt(this.listInfo[i].shopCount)
                        }
                        return total
                    }
                }
            });
            // vm.$mount(el);
        </script>
    </div>
    
    <!-- <div class="open_grepper_editor" title="Edit & Save To Grepper"></div> -->

</body>


</html>