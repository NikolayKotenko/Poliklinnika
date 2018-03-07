<?php
$array_not_fetch_assoc = articles_all_not_fetch($link);

//error_reporting(0);
$query_distinct_doljnost = "SELECT DISTINCT `doljnost` FROM `Palata`";
//$result_distinct_doljnost = mysqli_query($link, $query_distinct_doljnost);
$distinct_doljnost = mysqli_query($link, $query_distinct_doljnost);
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
</head>
<body>
<div class="container">
    <a href="../admin-panel/index.php">Сводная таблица</a> <!-- Ссылка именно на index.php потому что в начале
    мы сформировали таблицу статей, потом инклюдили файл table_articles_admin-panel.php в котором отображали все -->
    <div>
        <br><br><br><br>
        <label>10 пациентов которые чаще всего обращаются к врачам</label>
        <br>
        <form action="" method="post">
        <select name="doljnost" id="doljnost" onchange="document.getElementById('spisok_10_pacietnov').value=value">
            <option value="0">Выберите должность врача</option>
        <?php
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
</body>
</html>