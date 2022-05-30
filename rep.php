<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="/open-iconic/font/css/open-iconic.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/5/litera/bootstrap.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        body {
            height: 120vh;
        }

        form {
            display: initial;
        }

        label {
            font-family: system-ui;
        }

        input[type="submit"] {
            margin-bottom: 3em;
        }

        .form-check-input {
            position: relative;
        }

        form input {
            width: auto;
        }

        form button {
            width: auto;
        }

        .row {
            margin-left: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Content here -->
        <form>
            <div class="form-group">
                <h3 style="line-height:1.5em">問題回報</h3>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                        </svg>&nbsp問題回報</div>
                    <div class="col-sm-10">
                        <div class="form-check form-row">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">
                                商品說明標示不清
                            </label>
                        </div>
                        <div class="form-check form-row">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">
                                未在預定期限內將獲送達
                            </label>
                        </div>
                        <div class="form-check form-row">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">
                                商品送達時有品質狀況不佳之問題
                            </label>
                        </div>
                        <div class="form-check form-row">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">
                                包裝有磨損、拆封過痕跡
                            </label>
                        </div>
                        <div class="form-check form-row ">
                            <div>
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    其他問題
                                </label>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" style="margin-left:-40px;" class="form-control" id="inputProblem" placeholder="其他問題">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                        </svg>&nbsp請問你對本次服務評價</div>
                    <small id="" class="form-text text-muted" style="margin-right:1em">(非常不滿意)</small>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">5</label>
                    </div>
                    <small id="" class="form-text text-muted">(非常滿意)</small>
                </div>
                <h3 style="line-height:1.5em; margin-top:2em;">回報人資訊</h3>
                <hr>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">姓名</label>
                    <div class="col">
                        <input type="text" id="name" class="form-control" placeholder="First name" required>
                    </div>
                    <div class="col">
                        <input type="text" id="name" class="form-control" placeholder="Last name"  required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for=""> 2. 請說明本次想回報的問題</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="Check1">
                        <label class="form-check-label" for="Check1">商品說明標示不清</label>

                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="Check2">
                        <label class="form-check-label" for="Check2">未在預定期限內將獲送達</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="Check3">
                        <label class="form-check-label" for="Check3">商品送達時有品質狀況不佳之問題</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="Check4">
                        <label class="form-check-label" for="Check4">包裝有磨損、拆封過痕跡</label>
                    </div>
                    <div class="row" style="margin-top:1pt;">
                        <div class="form-check form-group col-md-2" style="width:fit-content; margin-top: 0.5em;">
                            <input type="checkbox" class="form-check-input" id="Check5">
                            <label class="form-check-label" for="Check5">其他問題: </label>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="text" style="margin-left:-40px;" class="form-control" id="inputProblem" placeholder="其他問題">
                        </div>
                    </div>
                </div> -->
            </div>
            <input class="btn btn-lg btn-primary" type="submit" value="送出" name="send_rep"/>
        </form>
    </div>

</body>

</html>