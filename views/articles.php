<?php
$array_not_fetch_assoc = articles_all_not_fetch($link);
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


        </pre>

        <br><br><br><br>
        <label>10 пациентов которые чаще всего обращаются к врачам</label>
        <br>

        <select name="book">
            <option value="0">Выберите книгу</option>
        <?php
            while($row = mysqli_fetch_assoc($array_not_fetch_assoc)){
                ?>
                <option value=""><?=$row['Должность']?></option>
                <?
            }
        ?>
        </select>
        <input type="button"  class="btn" value="Отфильтровать"> </input>


        <?php
            $query = "SELECT id, fio_pacienta FROM `Palata` WHERE doljnost = '$row[Должность]' ORDER BY id DESC LIMIT 10 "


        ?>


<!--<pre>-->
<!--       --><?php
//        foreach ( articles_all($link) as $array_name => $array_value ) {
//            print_r($array_value); // отладка
//            print("<b>".$array_name."</b><br>");
//
//            foreach ( $array_value as $index => $value )
//            {
//            print("".$array_name." => ".$index." => ".$value."<br>");
//            if ($value == $_GET['id'])
//            echo $array_id = $array_value;
//            }
//        }
//        ?>
<!--</pre>-->



</div>
<footer>
</footer>
</div>
</body>
</html>