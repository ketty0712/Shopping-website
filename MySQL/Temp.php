<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action='upload.php' method='POST' enctype='multipart/form-data'>
        <input type='hidden' name='MAX_FILE_SIZE' value='1024000'>
        請選擇要上傳的檔案：
        <input type='file' name='my_file'><br>
        <input type='submit' value='上傳檔案'>
    </form>
    <?php
    
    ?>
</body>

</html>