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
<!--            <form method="post" action="../admin-panel/index.php?action=add&id=--><?//=$_GET['id']-1?><!-- ">-->
        <form action="../models/update_res.php?id=<?php echo $_GET['id'] ?>"  method="POST" >

                <!-- Метод post посылает на сервер данные в запросе браузера, в отличие от get передает не отображая в url -->
                <!-- Ссылка именно на index.php потому что в начале мы добавили/редактировали статью, потом инклюдили файл
                        table_articles_admin-panel.php в котором отображалось все новое -->
                <!-- $_GET['action'] - позвояет в зависимости от того редактируем мы или создаем статью изменять параметр action
                т.е считываем значение action из url если он = edit - отправ будет по адресу action=edit. add по аналогии -->
                <!-- $_GET['id'] - считывает id c url -->

            <?php
//                    echo '<br>'."ид массива" . '<br>';
//                    echo $_GET['id']-1 . '<br>';
//                    echo "ид чувака" . '<br>';
////                    echo $post_null_get_article[$_GET['id']]['id'] . '<br>';
//
//                    echo "wwww" . '<br>';
////                    echo $post_null_get_article['id']['id']['ФИО Пациента'] . '<br>';
//                    echo "wwww";
//                    ?>


            </pre>
            <br><br>

                <label> ФИО Пациента
                <input type="text" name="fio" value="<?=$post_null_get_article[$_GET['id']-1]['ФИО Пациента']?>" class="form-item" autofocus required>
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