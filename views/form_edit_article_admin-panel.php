<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Добавление статьи</title>
    <link rel="stylesheet" href="../source/style.css">
    <link rel="stylesheet" href="../source/bootstrap.min.css">

    <script src="../source/jquery-3.3.1.min.js"></script>
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
    Palata.doljnost  AS 'Должность',
    Diagnoz.diagnoz AS 'Диагноз',
    Simptom.simptom AS 'Симптом',
    Palata.data_postuplenia AS 'Дата поступления',
    Palata.data_vipiski AS 'Дата выписки',
    allergia_k_preparatam.alergia_k_preparatam AS 'Аллергия к препаратам',
    Naznachenie_preparati.naznachenie_preparati AS 'Назначенные препараты',
    Jalobi_pacientov.Jaloba AS 'Жалобы пациентов'

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
    JOIN Jalobi_pacientov ON FIO_pacienta.fio_pacienta = Jalobi_pacientov.fio_pacienta
    ORDER BY `id` ASC";

        $result2 = mysqli_query($link, $query2); /* Все что мы отобрали (САМ ЗАПРОС) записываем в переменную $result */
        $result_all = mysqli_fetch_all(($result2), MYSQLI_ASSOC);

        ?>

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
<!--    --><?php //var_dump(articles_all($link));?>
</pre>
            <?php
//
//            require_once ("../database.php"); /* подключение к базе */
//            require_once ("../models/articles.php"); /* сама логика, выборка (MVC модель)*/
//            $link = db_connect(); /* непонял зачем делать это еще раз */
//            var_dump($_GET['action']);
//            var_dump(articles_all($link));

//            var_dump($_GET['id']);
//            var_dump ($post_null_get_article['all']['id']);
//            echo "= tut";
            ?>
            <?php
                foreach ( $post_null_get_article as $array_name => $array_value ) {
//                    print_r($array_value); // отладка
//                    print("<b>".$array_name."</b><br>");

                    foreach ( $array_value as $index => $value )
                    {
                        ("".$array_name." => ".$index." => ".$value."<br>");
                        if ($value == $_GET['id'])
                         $array_id = $array_value;
                    }
                }
//                var_dump($array_id);
//                echo $array_id['id'];
//                echo $array_id['ФИО Пациента'];
            ?>


            <a href="../admin-panel/index.php">Сводная таблица</a>
            <br><br>

            <label>ФИО Пациента<br>
                <input type="text" list="fio_pacienta" name="fio_pacienta" class="form-item" value="<?=$array_id['ФИО Пациента']?>" placeholder="Введите ФИО Пациента" autofocus required/>
            </label> <br>
            <datalist id="fio_pacienta">
                <?php foreach ($result_all as $row): ?>
                    <option value="<?=$row['ФИО Пациента']?>"></option>
                <?php endforeach; ?>
            </datalist>


            <label>Страховой полис
                <input type="text" minlength="11" maxlength="11" name="strahovoi_polis" value="<?=$array_id['Страховой полис']?>" class="form-item" placeholder="Введите 11 цифр" autofocus required>
            </label> <br>
            <label>Паспорт
                <input type="text" minlength="10" maxlength="10" name="Паспорт" value="<?=$array_id['Паспорт']?>" class="form-item" placeholder="Введите 10 цифр" autofocus required>
            </label><br>
            <label>Палата
                <input type="number" pattern="[0-9]" name="Палата" value="<?=$array_id['Палата']?>" class="form-item" placeholder="Введите одно число" autofocus required>
            </label><br>


            <label>Отделение<br>
                <input type="text" list="Отделение" name="Отделение" class="form-item" value="<?=$array_id['Отделение']?>" placeholder="Введите название отделения" autofocus required/>
            </label> <br>
            <datalist id="Отделение">
                <?php foreach ($result_all as $row): ?>
                    <option value="<?=$row['Отделение']?>"></option>
                <?php endforeach; ?>
            </datalist>

            <label>ФИО Лечащего врача<br>
                <input type="text" list="ФИО_Лечащего_врача" name="ФИО_Лечащего_врача" value="<?=$array_id['ФИО Лечащего врача']?>" class="form-item" placeholder="Введите ФИО Лечащего врача" autofocus required/>
            </label> <br>
            <datalist id="ФИО_Лечащего_врача">
                <?php foreach ($result_all as $row): ?>
                    <option value="<?=$row['ФИО Лечащего врача']?>"></option>
                <?php endforeach; ?>
            </datalist>

            <label>Должность<br>
                <input type="text" list="Должность" name="Должность" class="form-item" value="<?=$array_id['Должность']?>" placeholder="Введите должность врача" autofocus required/>
            </label> <br>
            <datalist id="Должность">
                <?php foreach ($result_all as $row): ?>
                    <option value="<?=$row['Должность']?>"></option>
                <?php endforeach; ?>
            </datalist>

            <label>Диагноз<br>
                <input type="text" list="Диагноз" name="Диагноз" class="form-item" value="<?=$array_id['Диагноз']?>" placeholder="Введите Диагноз" autofocus required/>
            </label> <br>
            <datalist id="Диагноз">
                <?php foreach ($result_all as $row): ?>
                    <option value="<?=$row['Диагноз']?>"></option>
                <?php endforeach; ?>
            </datalist>

            <label>Симптом<br>
                <input type="text" list="Симптом" name="Симптом" class="form-item" value="<?=$array_id['Симптом']?>" placeholder="Введите Симптом" autofocus required/>
            </label> <br>
            <datalist id="Симптом">
                <?php foreach ($result_all as $row): ?>
                    <option value="<?=$row['Симптом']?>"></option>
                <?php endforeach; ?>
            </datalist>

            <label>Дата поступления
                <input type="date" name="Дата_поступления" value="<?=$array_id['Дата поступления']?>" class="form-item"  placeholder="Введите Дату поступления пациента" autofocus required>
            </label><br>
            <label>Дата выписки
                <input type="date" name="Дата_выписки" value="<?=$array_id['Дата выписки']?>" class="form-item" placeholder="Введите Дату выписки" autofocus required>
            </label><br>

            <label>Аллергия к препаратам<br>
                <input type="text" list="Аллергия_к_препаратам" name="Аллергия_к_препаратам" value="<?=$array_id['Аллергия к препаратам']?>" class="form-item" placeholder="Введите на какие препараты может быть аллергия" autofocus/>
            </label> <br>
            <datalist id="Аллергия_к_препаратам">
                <?php foreach ($result_all as $row): ?>
                    <option value="<?=$row['Аллергия к препаратам']?>"></option>
                <?php endforeach; ?>
            </datalist>

            <label>Назначенные препараты<br>
                <input type="text" list="Назначенные_препараты" name="Назначенные_препараты" value="<?=$array_id['Назначенные препараты']?>" class="form-item" placeholder="Введите препараты назначенные врачом" autofocus required/>
            </label> <br>
            <datalist id="Назначенные_препараты">
                <?php foreach ($result_all as $row): ?>
                    <option value="<?=$row['Назначенные препараты']?>"></option>
                <?php endforeach; ?>
            </datalist>

            <label>Жалобы пациентов<br>
                <input type="text" list="Жалобы_пациентов" name="Жалобы_пациентов" value="<?=$array_id['Жалобы пациентов']?>" class="form-item" placeholder="Введите Жалобы пациентов" autofocus required/>
            </label> <br>
            <datalist id="Жалобы_пациентов">
                <?php foreach ($result_all as $row): ?>
                    <option value="<?=$row['Жалобы пациентов']?>"></option>
                <?php endforeach; ?>
            </datalist>

<!--                <label> ФИО Пациента-->
<!--                <input type="text" name="fio_pacienta" value="--><?//=$array_id['ФИО Пациента']?><!--" class="form-item" placeholder="Введите ФИО Пациента"  autofocus required>-->
<!--                <!-- required применяет стилевые правила к тегу <input>,  Он позволяет выделять поля-->
<!--                обязательные к заполнению перед отправкой формы. -->-->
<!--                <!-- Атрибут autofocus устанавливает, что кнопка получает фокус после загрузки страницы. -->-->
<!--            </label><br>-->
<!---->
<!--            <label>Страховой полис-->
<!--                <input type="number" minlength="11" maxlength="11" name="strahovoi_polis" value="--><?//=$array_id['Страховой полис']?><!--" class="form-item" placeholder="Введите 11 цифр" autofocus required>-->
<!--            </label> <br>-->
<!--            <label>Паспорт-->
<!--                <input type="number" minlength="10" maxlength="10" name="Паспорт" value="--><?//=$array_id['Паспорт']?><!--" class="form-item" placeholder="Введите 10 цифр" autofocus required>-->
<!--            </label><br>-->
<!--            <label>Палата-->
<!--                <input type="number" pattern="\d{1}" name="Палата" value="--><?//=$array_id['Палата']?><!--" class="form-item" placeholder="Введите одно число" autofocus required>-->
<!--            </label><br>-->
<!--            <label>Отделение-->
<!--                <input type="text" name="Отделение" value="--><?//=$array_id['Отделение']?><!--" class="form-item" placeholder="Введите название отделения" autofocus required>-->
<!--            </label><br>-->
<!--            <label>ФИО Лечащего врача-->
<!--                <input type="text" name="ФИО_Лечащего_врача" value="--><?//=$array_id['ФИО Лечащего врача']?><!--" class="form-item" placeholder="Введите ФИО Лечащего врача" autofocus required>-->
<!--            </label><br>-->
<!--            <label>Должность-->
<!--                <input type="text" name="Должность" value="--><?//=$array_id['Должность']?><!--" class="form-item" placeholder="Введите должность врача" autofocus required>-->
<!--            </label><br>-->
<!--            <label>Диагноз-->
<!--                <input type="text" name="Диагноз" value="--><?//=$array_id['Диагноз']?><!--" class="form-item" placeholder="Введите Диагноз" autofocus required>-->
<!--            </label><br>-->
<!--            <label>Симптом-->
<!--                <input type="text" name="Симптом" value="--><?//=$array_id['Симптом']?><!--" class="form-item" placeholder="Введите Симптом" autofocus required>-->
<!--            </label><br>-->
<!--            <label>Дата поступления-->
<!--                <input type="date" name="Дата_поступления" value="--><?//=$array_id['Дата поступления']?><!--" class="form-item" placeholder="Введите Дату поступления пациента" autofocus required>-->
<!--            </label><br>-->
<!--            <label>Дата выписки-->
<!--                <input type="date" name="Дата_выписки" value="--><?//=$array_id['Дата выписки']?><!--" class="form-item" placeholder="Введите Дату выписки" autofocus required>-->
<!--            </label><br>-->
<!--            <label>Аллергия к препаратам-->
<!--                <input type="text" name="Аллергия_к_препаратам" value="--><?//=$array_id['Аллергия к препаратам']?><!--" class="form-item" placeholder="Введите на какие препараты может быть аллергия" autofocus >-->
<!--            </label><br>-->
<!--            <label>Назначенные препараты-->
<!--                <input type="text" name="Назначенные_препараты" value="--><?//=$array_id['Назначенные препараты']?><!--" class="form-item" placeholder="Введите препараты назначенные врачом" autofocus required>-->
<!--            </label><br>-->
<!--            <label>Жалобы пациентов-->
<!--                <input type="text" name="Жалобы_пациентов" value="--><?//=$array_id['Жалобы пациентов']?><!--" class="form-item" placeholder="Введите Жалобы пациентов" autofocus required>-->
<!--            </label><br>-->
            <input type="submit" value="Сохранить" class="btn">


        </form>
    </div>
</div>
</body>
</html>