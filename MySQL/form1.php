<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>查詢資料表的記錄資料</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<script>
    function AddOpt(form) {
        form.sql.focus();
        var leng = form.history.length;
        var cont = form.sql.value
        var val = cont;
        if (cont.length > 70) {
            val = cont.substring(0, 70) + "...";
        }
        flag = true;
        for (var i = 0; i < leng; i++) {
            if (cont == form.history.options[i].value) {
                flag = false;
                form.history.options[i].selected = true;
                break;
            }
        }
        if (flag) {
            var Opt = new Option(val, cont);
            form.history.options[leng] = Opt;
            form.history.options[leng].selected = true;
        }
        if (cont.toLowerCase().indexOf("drop table") != -1 || cont.toLowerCase().indexOf("create table") != -1) {
            top.top2.location.reload();
        }
        return true;
    }
</script>
<style>
    textarea {
        font-size: 16pt;
        color: blue!important;
        font-family: monospace;
    }

    select {
        width: 550pt;
        line-height: 1.5em;
        margin: 2pt 0;
    }

    center {
        width: fit-content;
        display: flex;
        justify-content: center;
        margin: 0 auto;
    }

    input[type="submit"] {
        margin-top: 1em;
        font-size: 16pt;
    }
</style>

<body>

    <form action="form3.php" name="query" method="post" target="top3" onsubmit="return(AddOpt(this));">
        <div class="form-group mt-3 m-align-center">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea name="sql" class="form-control" id="exampleFormControlTextarea1" rows="3">
            <?php if (isset($_SESSION['sql'])) echo $_SESSION['sql'] ?>
            </textarea><br>
            <option value=""></option>
            <center> <input type="submit" value="執行SQL"></center>
        </div>
    </form>

</body>

</html>