<?php
//error_reporting(0);

//$result_distinct_doljnost = mysqli_query($link, $query_distinct_doljnost);

//$fetch_distinct_doljnost = mysqli_fetch_assoc($result_distinct_doljnost);

//while ($row = mysqli_fetch_array($distinct_doljnost))
//{
//    print_r($row);
//}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <style>
        th, table {
            text-align: center; }
        th, td {
            padding: 5px;  }
    </style>
</head>
<body>

<!--Отчет первый, 10 пациентов которые чаще всего обращаются к врачам -->
<div class="container">
    <br><br>
    <a class="btn btn-primary" href="../admin-panel/index.php">Сводная таблица</a> <!-- Ссылка именно на index.php потому что в начале
    мы сформировали таблицу статей, потом инклюдили файл table_articles_admin-panel.php в котором отображали все -->
    <div>
        <br><br>
        <h4 class="">Отчёт №2</h4>
        <label>10 пациентов которые чаще всего обращаются к врачам</label>
        <br>
        <form action="" method="post">
        <select name="doljnost" id="doljnost" onchange="document.getElementById('spisok_10_pacietnov').value=value">
            <option value="0">Выберите должность врача</option>
        <?php
        $query_distinct_doljnost = "SELECT DISTINCT `doljnost` FROM `Palata`";
        $distinct_doljnost = mysqli_query($link, $query_distinct_doljnost);

            while($row = mysqli_fetch_assoc($distinct_doljnost)){
                ?>
                <option value="<?=$row['doljnost']?>"><?=$row['doljnost']?></option>
                <?
            }
        ?>
        </select>
        <input type="submit"  class="btn" value="Отфильтровать"> </input>
        </form>

        <?php
        error_reporting(0);
            $doljnost = $_POST['doljnost'];
            echo "10 последних пациентов по фильтру = ".$_POST['doljnost']."<br>";

            $query = "SELECT fio_pacienta FROM `Palata` WHERE doljnost = '$doljnost' ORDER BY id DESC LIMIT 10 ";

            $result = mysqli_query($link, $query);
            $fetch_all = mysqli_fetch_all($result);
//            var_dump($query).'<br>';
//            var_dump($fetch_all)."<br>";
//            echo $fetch_all."<br>";
        ?>

        <table border="1">
            <?php
            foreach ( $result as $array_name => $array_value ) {
                foreach ( $array_value as $index => $value ) {
                    echo '
                      <tr>
                      <td>'.$value.'<br></td>
                      </tr>
                    ';
                }
            }?>
        </table>


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
<div class="container">
        <br><br>
    <form action="" method="post">
    <h4 class="">Отчёт №3</h4>
    <label>Вывести палаты, в которых лежат пациенты не более количества дней, заданного пользователем.</label>
    <br><br>
    <label>Введите дату поступления
        <input type="date" name="Дата_поступления" value="" class="form-item" placeholder="Введите Дату поступления пациента" autofocus>
    </label><br>
    <label>Введите дату выписки
        <input type="date" name="Дата_выписки" value="" class="form-item" placeholder="Введите Дату выписки" autofocus>
    </label><br>
    <input type="submit"  class="btn" value="Отфильтровать" onclick="openbox('table_date_pacientov'); return false" > </input>
    </form>

    <?php
    $data_postuplenia = $_POST['Дата_поступления'];
    $data_vipiski = $_POST['Дата_выписки'];

    $query_date = "SELECT fio_pacienta AS 'ФИО Пациента', nomer_palati AS 'Номер палаты', 
                          data_postuplenia AS 'Дата поступления', data_vipiski AS 'Дата выписки'
                    FROM `Palata` WHERE (data_postuplenia BETWEEN '$data_postuplenia' AND '$data_vipiski') 
                                                      AND (data_vipiski BETWEEN '$data_postuplenia' AND '$data_vipiski')";
//    $query_date_vipiski = "SELECT * FROM `Palata` WHERE datadata_postuplenia = '$data_postuplenia'  ";

    $result_date = mysqli_query($link, $query_date);
    $result2_date = mysqli_query($link, $query_date);
//    $result_date_vipiski = mysqli_query($link, $query_date_postuplenia);
//    var_dump($query_date);
?>
    <table border="1"  style="font-size: 10pt;" id="table_date_pacientov" >
        <th>ФИО Пациента</th>
        <th>Палата</th>
        <th>Дата поступления</th>
        <th>Дата выписки</th>
        <?php foreach ($result_date as $a): ?>
        <tr>
            <td><?=$a['ФИО Пациента']?></td>
            <td><?=$a['Номер палаты']?></td>
            <td><?php echo DateTime::createFromFormat('Y-m-d',$a['Дата поступления'])->format('d/m/Y');?></td>
            <td><?php echo DateTime::createFromFormat('Y-m-d',$a['Дата выписки'])->format('d/m/Y');?></td>
        </tr>
        <?php endforeach; ?>
    </table>


<!--    <pre>-->
<!--    --><?//
//          while ($row = mysqli_fetch_array($result2_date))
//    {
//        print_r($row);
//    }
//    ?>
<!--    </pre>-->
</div>


</body>
</html>