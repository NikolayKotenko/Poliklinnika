<?php //include "menu.php"; ?>
<?php include "../database.php"; ?>
<?php include "../models/articles.php";
$link = db_connect();

//Направляем на основную таблицу
header('Location: ../admin-panel/index.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <script type="text/javascript" src="js/jquery-3.1.1.js"></script>-->
<!--        <link rel="stylesheet" href="css/bootstrap.css">-->
<!--        <link rel="stylesheet" href="css/main.css">-->
<!--        <script type="text/javascript" src="js/bootstrap.js"></script>-->
        <title></title>
    </head>
    <body>

    <!-- Скрипт, вызывающий модальное окно после загрузки страницы -->
    <script>
        $(document).ready(function() {
            // document.location.href = '../admin-panel/index.php';
            // $("#myModal").modal('show');

        });
    </script>

    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Заголовок модального окна -->
                <!--<div class="modal-header">-->
                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>-->
                <!--<h4 class="modal-title">Заголовок модального окна</h4>-->
                <!--</div>-->
                <!-- Основное содержимое модального окна -->
                <div class="modal-body">

                <?php

                /*Приняли данные с url'a методом Post, записали в переменные */

                $fio = $_POST['fio'];

//                $adress = $_POST['Страховой полис'];
//                $info = $_POST['Паспорт'];
                    /* Если хотябы одно поле пустое */
//                    if ((empty($fio)) or (empty($adress)) or (empty($info))) {
//                        echo "Поле пустое, информация не сохранена";
//                    }
                    /* Иначе записать данные в базу */
//                    else {


               echo "getID = ".($_GET['id'])."<br>";
               echo "fio_pacika = ".($_POST['fio'])."<br>";
               echo "polis_do = " . $_POST['strahovoi_polis'];
//               echo "link = ". var_dump($link) ."<br>";
//                print_r(articles_all($link));
//                "UPDATE FIO_pacienta SET fio_pacienta='$fio' WHERE id='$_GET[id]'"
//                $query = "UPDATE FIO_pacienta SET fio_pacienta='$fio' WHERE id='$_GET[id]'";
                for ($i=0; $i<=12; $i++) {
                    mysqli_query($link,"UPDATE FIO_pacienta SET fio_pacienta='$fio' WHERE id='$_GET[id]'");
                    mysqli_query($link,"UPDATE Strahovoi_polis SET Nomer_polisa='$_POST[strahovoi_polis]' WHERE fio_pacienta='$fio'");
                    mysqli_query($link,"UPDATE Pasport SET nomer_pasporta='$_POST[Паспорт]' WHERE fio_pacienta='$fio'");
                    mysqli_query($link,"UPDATE Palata SET nomer_palati='$_POST[Палата]' WHERE fio_pacienta='$fio'");
                    mysqli_query($link,"UPDATE Otdelenie SET nazvanie_otdelenia_specialnost='$_POST[Отделение]' WHERE fio_pacienta='$fio'");
                    mysqli_query($link,"UPDATE fio_vracha SET fio_vracha='$_POST[ФИО_Лечащего_врача]' WHERE id='$_GET[id]'");
                    mysqli_query($link,"UPDATE Diagnoz SET diagnoz='$_POST[Диагноз]' WHERE fio_pacienta='$fio'");
                    mysqli_query($link,"UPDATE Simptom SET simptom='$_POST[Симптом]' WHERE fio_pacienta='$fio'");
                    mysqli_query($link,"UPDATE data_postuplenia SET data_postuplenia='$_POST[Дата_поступления]' WHERE fio_pacienta='$fio'");
                    mysqli_query($link,"UPDATE data_vipiski SET data_vipiski='$_POST[Дата_выписки]' WHERE fio_pacienta='$fio'");
                    mysqli_query($link,"UPDATE allergia_k_preparatam SET alergia_k_preparatam='$_POST[Аллергия_к_препаратам]' WHERE fio_pacienta='$fio'");
                    mysqli_query($link,"UPDATE Naznachenie_preparati SET naznachenie_preparati='$_POST[Назначенные_препараты]' WHERE fio_pacienta='$fio'");
//                    $result = mysqli_query($link, $query2);
                }

//                $result_end = mysqli_fetch_assoc($result);
//                var_dump($result);
//                echo "polis_posle = " . $_POST['strahovoi_polis'];

//                    }
//
                ?>

                    <pre>
                        <?php
                        var_dump(articles_all($link));
                        ?>
                    </pre>

                </div>
                <!-- Футер модального окна -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-mfc1" data-dismiss="modal"
                            onclick="location.href = '../admin-panel/index.php';"">Закрыть</button>
                    <!--<button type="button" class="btn btn-primary">Сохранить изменения</button>-->
                </div>
            </div>
        </div>
    </div>

</body>
</html>