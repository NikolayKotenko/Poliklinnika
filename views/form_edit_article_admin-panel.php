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

            var_dump($_GET['id']);
            var_dump ($post_null_get_article['all']['id']);
            echo "= tut";
            ?>
            <?php
                foreach ( $post_null_get_article as $array_name => $array_value ) {
                    print_r($array_value); // отладка
                    print("<b>".$array_name."</b><br>");

                    foreach ( $array_value as $index => $value )
                    {
                        print("".$array_name." => ".$index." => ".$value."<br>");
                        if ($value == $_GET['id'])
                        echo $array_id = $array_value;
                    }
                }
                var_dump($array_id);
                echo $array_id['id'];
                echo $array_id['ФИО Пациента'];
            ?>



            <br><br>

                <label> ФИО Пациента
                <input type="text" name="fio_pacienta" value="<?=$array_id['ФИО Пациента']?>" class="form-item" autofocus required>
                <!-- required применяет стилевые правила к тегу <input>,  Он позволяет выделять поля
                обязательные к заполнению перед отправкой формы. -->
                <!-- Атрибут autofocus устанавливает, что кнопка получает фокус после загрузки страницы. -->
            </label><br>
            <label>Страховой полис
                <input type="text" name="strahovoi_polis" value="<?=$array_id['Страховой полис']?>" class="form-item" autofocus required>
            </label> <br>
            <label>Паспорт
                <input type="text" name="Паспорт" value="<?=$array_id['Паспорт']?>" class="form-item" autofocus required>
            </label><br>
            <label>Палата
                <input type="text" name="Палата" value="<?=$array_id['Палата']?>" class="form-item" autofocus required>
            </label><br>
            <label>Отделение
                <input type="text" name="Отделение" value="<?=$array_id['Отделение']?>" class="form-item" autofocus required>
            </label><br>
            <label>ФИО Лечащего врача
                <input type="text" name="ФИО_Лечащего_врача" value="<?=$array_id['ФИО Лечащего врача']?>" class="form-item" autofocus required>
            </label><br>
            <label>Диагноз
                <input type="text" name="Диагноз" value="<?=$array_id['Диагноз']?>" class="form-item" autofocus required>
            </label><br>
            <label>Симптом
                <input type="text" name="Симптом" value="<?=$array_id['Симптом']?>" class="form-item" autofocus required>
            </label><br>
            <label>Дата поступления
                <input type="date" name="Дата_поступления" value="<?=$array_id['Дата поступления']?>" class="form-item" autofocus required>
            </label><br>
            <label>Дата выписки
                <input type="date" name="Дата_выписки" value="<?=$array_id['Дата выписки']?>" class="form-item" autofocus required>
            </label><br>
            <label>Аллергия к препаратам
                <input type="text" name="Аллергия_к_препаратам" value="<?=$array_id['Аллергия к препаратам']?>" class="form-item" autofocus >
            </label><br>
            <label>Назначенные препараты
                <input type="text" name="Назначенные_препараты" value="<?=$array_id['Назначенные препараты']?>" class="form-item" autofocus required>
            </label><br>
            <input type="submit" value="Сохранить" class="btn">
        </form>
    </div>
</div>
</body>
</html>