<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>20190304</title>
    <style>
        @media screen and (max-width: 1000px){
            body{
                font-size: 70px;
            }
        }
    </style>
</head>
<body>
    <?php
        print_r('input text 輸入了... ');
        if(isset($_POST['ID']))print_r(htmlspecialchars($_POST['ID']) . '<br>');
        else print_r('無<br>');

        print_r('input radio 選擇了... ');
        if(isset($_POST['sex']))print_r($_POST['sex']. '<br>');
        else print_r('無<br>');

        print_r('input select 選擇了... ');
        if(isset($_POST['num']))print_r($_POST['num']. '<br>');
        else print_r('無<br>');
    ?>
    <form method="POST">
        <input type="text" name="ID"/><br>
        <input type="radio" name="sex" value="M"/>男<br>
        <input type="radio" name="sex" value="W"/>女<br>
        <select name="num">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <input type="submit" value="送出"/>
    </form>
</body>
</html>