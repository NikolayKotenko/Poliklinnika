<?php
require_once ("../database.php"); /* подключение к базе */
require_once ("../models/articles.php"); /* сама логика, выборка (MVC модель)*/
$link = db_connect(); /* непонял зачем делать это еще раз */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Добавление статьи</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1>Добавление статьи</h1>
    <div>
        <?php
        $query2 = "SELECT
    FIO_pacienta.id,
    FIO_pacienta.fio_pacienta AS 'ФИО Пациента',
    Strahovoi_polis.Nomer_polisa AS 'Страховой полис',
    Pasport.nomer_pasporta AS 'Паспорт',
    Palata.nomer_palati AS 'Палата',
    Otdelenie.nazvanie_otdelenia_specialnost AS 'Отделение',
    Palata.fio_vracha AS 'ФИО Лечащего врача',
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

        ?>
        <pre>
            <?php var_dump($result2);?>
        </pre>

        <!-- Атрибут action - говорит о том что данные передавать скрипту -->
        <!-- Method - каким способом будут передаваться параметры.-->
<!--            <form method="post" action="../admin-panel/index.php?action=add&id=--><?//=$_GET['id']?><!-- ">-->
        <form action="../admin-panel/index.php?action=<?=$_GET['action']?>&id=<?php echo $_GET['id'] ?>"  method="POST" >

                <!-- Метод post посылает на сервер данные в запросе браузера, в отличие от get передает не отображая в url -->
                <!-- Ссылка именно на index.php потому что в начале мы добавили/редактировали статью, потом инклюдили файл
                        table_articles_admin-panel.php в котором отображалось все новое -->
                <!-- $_GET['action'] - позвояет в зависимости от того редактируем мы или создаем статью изменять параметр action
                т.е считываем значение action из url если он = edit - отправ будет по адресу action=edit. add по аналогии -->
                <!-- $_GET['id'] - считывает id c url -->

            <pre>
            <?php


            var_dump($_GET['action']);
            var_dump(articles_all($link));?>
            </pre>
            <?php
            $post_null_get_article = articles_all($link);


//            while ($row = mysqli_fetch_array($post_null_get_article)){
//                echo "<option value=' ".$row['id']." '>".$row['ФИО Пациента']."</option>";
//            }

            ?>


            </pre>
            <br><br>

                <label> ФИО Пациента
                    <select> <?php echo "<option value=' ".$a['id']." '>".$a['ФИО Пациента']."</option>";?>
                    </select>
                    <select name="book">
                        <option value="0">Выберите книгу</option>
                        <?
                        while($row = mysqli_fetch_assoc($result2)){
                            ?>
                            <option value="<?=$row['id']?>"><?=$row['ФИО Пациента']?></option>
                            <?
                        }
                        ?>
                    </select>
                    </select>
                    <!-- required применяет стилевые правила к тегу <input>,  Он позволяет выделять поля
                    обязательные к заполнению перед отправкой формы. -->
                <!-- Атрибут autofocus устанавливает, что кнопка получает фокус после загрузки страницы. -->
            </label><br>
            <label>Страховой полис
                <input type="text" name="strahovoi_polis" value="<?=$post_null_get_article[$_GET['id']-1]['Страховой полис']?>" class="form-item" autofocus required>
            </label> <br>
            <label>Паспорт
                <input type="text" name="Паспорт" value="<?=$post_null_get_article[$_GET['id']-1]['Паспорт']?>" class="form-item" autofocus required>
            </label><br>
            <label>Палата
                <input type="text" name="Палата" value="<?=$post_null_get_article[$_GET['id']-1]['Палата']?>" class="form-item" autofocus required>
            </label><br>
            <label>Отделение
                <input type="text" name="Отделение" value="<?=$post_null_get_article[$_GET['id']-1]['Отделение']?>" class="form-item" autofocus required>
            </label><br>
            <label>ФИО Лечащего врача
                <input type="text" name="ФИО_Лечащего_врача" value="<?=$post_null_get_article[$_GET['id']-1]['ФИО Лечащего врача']?>" class="form-item" autofocus required>
            </label><br>
            <label>Диагноз
                <input type="text" name="Диагноз" value="<?=$post_null_get_article[$_GET['id']-1]['Диагноз']?>" class="form-item" autofocus required>
            </label><br>
            <label>Симптом
                <input type="text" name="Симптом" value="<?=$post_null_get_article[$_GET['id']-1]['Симптом']?>" class="form-item" autofocus required>
            </label><br>
            <label>Дата поступления
                <input type="date" name="Дата_поступления" value="<?=$post_null_get_article[$_GET['id']-1]['Дата поступления']?>" class="form-item" autofocus required>
            </label><br>
            <label>Дата выписки
                <input type="date" name="Дата_выписки" value="<?=$post_null_get_article[$_GET['id']-1]['Дата выписки']?>" class="form-item" autofocus required>
            </label><br>
            <label>Аллергия к препаратам
                <input type="text" name="Аллергия_к_препаратам" value="<?=$post_null_get_article[$_GET['id']-1]['Аллергия к препаратам']?>" class="form-item" autofocus >
            </label><br>
            <label>Назначенные препараты
                <input type="text" name="Назначенные_препараты" value="<?=$post_null_get_article[$_GET['id']-1]['Назначенные препараты']?>" class="form-item" autofocus required>
            </label><br>
            <input type="submit" value="Сохранить" class="btn">
        </form>
    </div>
</div>
</body>
</html>