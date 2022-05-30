<!-- 管理者介面－帳戶管理(模板3) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/people.svg" />
    <title>會員資料</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-3.3.1.js"></script>

    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/localization/messages_zh_TW.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/member_table.js"></script>
    <style>
        @import url("//cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
        @import url("//bootswatch.com/_vendor/font-awesome/css/font-awesome.min.css");
        @import url("//bootswatch.com/5/litera/bootstrap.css");

        #nav {
            min-width: 90vw;
        }

        th {
            /* display: inline; */
            word-break: keep-all;
        }

        #act {
            display: inline-flex;
            align-content: space-around;
            justify-content: space-evenly;
            word-break: keep-all;
            width: 200pt;
        }

        #edit {
            margin-top: 1em;
            margin-bottom: 3em;
        }

        button[type="submit"],
        button[type="reset"] {
            padding: inherit;
            display: inline-flex;
            justify-content: space-around;
        }
        button[type="button"]{
            padding: inherit;
        }

        .table-responsive-md {
            width: 100%;
        }
        .form-inline{
            flex-direction: column;
        }
        .dataTables_scroll{
            width:100%;
        }
        .dataTables_filter{
            margin: 10px 0;
            float:right;
        }
    </style>
</head>

<body>
    <div class="mt-3 m-align-center">
        <iframe src="nav.php" id="nav" name="top1" frameborder="0"></iframe>
    </div>
    
</body>

</html>