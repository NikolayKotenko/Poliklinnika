<?php
//include ("test_logic.php");
//?>
<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!--    <pre>-->
<!--        --><?php
//        var_dump($ebal);
//        ?>
<!--    </pre>-->
<!---->
<!--    <form action="models/update_res.php?id=--><?php //echo $_GET['id'] ?><!--"  method="post" >-->
<!--        <input type="text" name="fio2" value="--><?//=$ebal[2]['ФИО Пациента']?><!--" class="form-item" autofocus required>-->
<!---->
<!--        <input type="text" name="fio_send" value=" " class="form-item" autofocus required>-->
<!--        <br>-->
<!--        <input type="submit" name="Submit" value="Отправить">-->
<!--        --><?php //echo $_POST['fio_send']; ?>
<!--    </form>-->
<!---->
<!---->
<!--</body>-->
<!--</html>-->
<!---->
<!---->
<!---->


INSERT IGNORE INTO `FIO_pacienta`(`id`, `fio_pacienta`)
VALUES (NULL,'Самойлова');
INSERT IGNORE INTO `Strahovoi_polis`(`id`, `Nomer_polisa`, `fio_pacienta`) VALUES
(LAST_INSERT_ID(),'44444444444', 'Самойлова');
INSERT IGNORE INTO `Pasport`(`id`, `nomer_pasporta`, `fio_pacienta`)
VALUES (LAST_INSERT_ID(),'4444444444', 'Самойлова');
INSERT IGNORE INTO `Palata`(`id`, `nomer_palati`, `fio_pacienta`, `fio_vracha`, `doljnost`, `data_postuplenia`, `data_vipiski`)
VALUES (LAST_INSERT_ID(),'4', 'Самойлова', 'Панкина', 'Отолларинголог', '2018-02-04', '2018-02-25');
INSERT IGNORE INTO `Otdelenie`(`id`, `nazvanie_otdelenia_specialnost`, `fio_pacienta`)
VALUES (LAST_INSERT_ID(),'Терапевтическое', 'Самойлова');
INSERT IGNORE INTO `fio_vracha`(`id`, `fio_vracha`, `nazvanie_otdelenia_specialnost`)
VALUES (LAST_INSERT_ID(),'Панкина','Терапевтическое');
INSERT IGNORE INTO `Diagnoz`(`id`, `diagnoz`, `fio_pacienta`, `fio_vracha_postavivshego_diagnoz`)
VALUES (LAST_INSERT_ID(),'Вазомоторный ринит','Самойлова','Панкина');
INSERT IGNORE INTO `Simptom`(`id`, `simptom`, `fio_pacienta`)
VALUES (LAST_INSERT_ID(),'Заложенность носа','Самойлова');
INSERT IGNORE INTO `data_postuplenia`(`id`, `data_postuplenia`, `fio_pacienta`)
VALUES (LAST_INSERT_ID(),'2018-02-04','Самойлова');
INSERT IGNORE INTO `data_vipiski`(`id`, `data_vipiski`, `fio_pacienta`)
VALUES (LAST_INSERT_ID(),'2018-02-25','Самойлова');
INSERT IGNORE INTO `allergia_k_preparatam`(`id`, `alergia_k_preparatam`, `fio_pacienta`)
VALUES (LAST_INSERT_ID(),'нет','Самойлова');
INSERT IGNORE INTO `Naznachenie_preparati`(`id`, `naznachenie_preparati`, `fio_pacienta`, `fio_vracha_naznachivzhego_preparati`)
VALUES (LAST_INSERT_ID(),'Ринорин','Самойлова','Панкина');
