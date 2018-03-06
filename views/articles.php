<?php
//require_once ("../database.php"); /* подключение к базе */
//require_once ("../models/articles.php"); /* сама логика, выборка (MVC модель)*/
//$link = db_connect(); /* непонял зачем делать это еще раз */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <a href="../admin-panel/index.php">Сводная таблица</a> <!-- Ссылка именно на index.php потому что в начале
    мы сформировали таблицу статей, потом инклюдили файл table_articles_admin-panel.php в котором отображали все -->
    <div>

        <pre>
            <?php

            var_dump(articles_all_not_fetch($link));
            $array = articles_all_not_fetch($link);
            ?>

            <?php
            $query2 = "SELECT
    FIO_pacienta.id,
    FIO_pacienta.fio_pacienta AS 'ФИО Пациента',
    Strahovoi_polis.Nomer_polisa AS 'Страховой полис',
    Pasport.nomer_pasporta AS 'Паспорт',
    Palata.nomer_palati AS 'Палата',
    Otdelenie.nazvanie_otdelenia_specialnost AS 'Отделение',
    Palata.fio_vracha AS 'ФИО Лечащего врача',
    Palata.doljnost AS 'Должность',
    Diagnoz.diagnoz AS 'Диагноз',
    Simptom.simptom AS 'Симптом',
    Palata.data_postuplenia AS 'Дата поступления',
    Palata.data_vipiski AS 'Дата выписки',
    allergia_k_preparatam.alergia_k_preparatam AS 'Аллергия к препаратам',
    Naznachenie_preparati.naznachenie_preparati AS 'Назначенные препараты'

    FROM
    FIO_pacienta

    LEFT JOIN Palata USING (fio_pacienta)

    JOIN Strahovoi_polis ON FIO_pacienta.fio_pacienta = Strahovoi_polis.fio_pacienta
    JOIN Pasport ON FIO_pacienta.fio_pacienta = Pasport.fio_pacienta
    JOIN Otdelenie ON FIO_pacienta.fio_pacienta = Otdelenie.fio_pacienta
    JOIN Diagnoz ON FIO_pacienta.fio_pacienta = Diagnoz.fio_pacienta
    JOIN Simptom ON FIO_pacienta.fio_pacienta = Simptom.fio_pacienta
    JOIN allergia_k_preparatam ON FIO_pacienta.fio_pacienta = allergia_k_preparatam.fio_pacienta
    JOIN Naznachenie_preparati ON FIO_pacienta.fio_pacienta = Naznachenie_preparati.fio_pacienta
    ORDER BY `id` ASC";

            $result2 = mysqli_query($link, $query2); /* Все что мы отобрали (САМ ЗАПРОС) записываем в переменную $result */
            //
//            error_reporting(0);

            ?>
        </pre>

        <br><br><br><br><br>
        <select name="book">
            <option value="0">Выберите книгу</option>
        <?
            while($row = mysqli_fetch_assoc($array)){
                ?>
                <option value=""><?=$row['Должность']?></option>
                <?
            }
        ?>
<pre>
       <?php
        foreach ( $result2 as $array_name => $array_value ) {
            print_r($array_value); // отладка
            print("<b>".$array_name."</b><br>");

            foreach ( $array_value as $index => $value )
            {
            print("".$array_name." => ".$index." => ".$value."<br>");
            if ($value == $_GET['id'])
            echo $array_id = $array_value;
            }
        }
        ?>
</pre>



</div>
<footer>
</footer>
</div>
</body>
</html>