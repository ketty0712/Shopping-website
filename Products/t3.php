<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="icon" type="image/x-icon" href="../assets/cart3.svg" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->

    <style>
        body {
            background-color: #F5F5F5;
        }

        .btn-default {
            color: #333;
            background-color: #fff;
            border-color: #ccc;
        }

        img {
            width: 100pt;
        }

        .table td,
        .table th {
            vertical-align: middle !important;
            border-top: 1px solid transparent;
        }

        .count {
            width: 40pt;
            margin: 0 3pt;
            border: 1px solid #878787;
            border-radius: 4pt;
        }

        .amount {
            display: inline-flex;
            margin-top: 20%;
            border: 0px;
        }

      
        .btn-warning {
            background-color: #6387ae;
            border-color: #6387ae;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <nav>

    </nav>
    <div class="container mt-3">
        <main>
            <h4 class="text-muted">Cart</h4>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">#</th>
                        <th scope="col">商品編號</th>
                        <th scope="col">商品圖片</th>
                        <th scope="col">商品名稱</th>
                        <th scope="col">價格</th>
                        <th scope="col" style="width:150pt;">數量</th>
                        <th scope="col">刪除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" v-model="checkAll" @click="selectAll"></td>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td><img src="../product_pic/no3.svg"></td>
                        <td><a href="#">蛋糕</a> </td>
                        <td>Price</td>
                        <td style="width: 100pt;" class="amount">
                            <button class="btn btn-default" onclick="reduce(index)">-</button>
                            <input type="text " class="count" value="1" />
                            <button class="btn btn-default" onclick="add(index)">+</button>
                        </td>
                        <td><button class="btn btn-warning" onclick="del(index)">刪除</button></td>
                    </tr>
                    
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>