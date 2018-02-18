<?php
include ("test_logic.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
        var_dump($ebal);
        ?>
    </pre>

    <form action="models/update_res.php?id=<?php echo $_GET['id'] ?>"  method="post" >
        <input type="text" name="fio2" value="<?=$ebal[2]['ФИО Пациента']?>" class="form-item" autofocus required>

        <input type="text" name="fio_send" value=" " class="form-item" autofocus required>
        <br>
        <input type="submit" name="Submit" value="Отправить">
        <?php echo $_POST['fio_send']; ?>
    </form>


</body>
</html>



