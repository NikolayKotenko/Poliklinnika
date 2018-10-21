<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Мой первый блог</title>
    <link rel="stylesheet" href="../source/style.css">
    <link rel="stylesheet" href="../source/bootstrap.min.css">
     <style>
         html, body {
             font-size: 8pt;
         }

         th, table {
             text-align: center;
         }

         th, td {
             padding: 5px;
         }
    </style>
</head>
<body>
<div class="container">
    <h1>Разработка базы данных для предметной области <br> «Поликлиника»</h1>
    <div class="main_div">

        <pre>
                    <?php print_r(articles_all($link))  ?>
                    <?php print_r(articles_all_not_fetch($link))  ?>
                    <?php print_r(mysqli_affected_rows($link))  ?>
        </pre>

        <a href="../views/form_add_new_article_admin-panel.php?action=add">Добавить статью</a> <!-- Ссылка скрытого пула) в файле admin-panel
        /index.php в обработке добавления статей - header("Location: index.php") - грубо говоря спец лейбл с параметром add -->
        <a href="../index.php">Главная страница со статьями</a>
        <table class="admin-table" border="1">
            <tr>
                <th>ФИО Пациента</th>
                <th>Страховой полис</th>
                <th>Паспорт</th>
                <th>Палата</th>
                <th>Отделение</th>
                <th>ФИО лечащего врача</th>
                <th>Должность</th>
                <th>Диагноз</th>
                <th>Симптом</th>
                <th>Дата поступления</th>
                <th>Дата выписки</th>
                <th>Аллергия к препаратам</th>
                <th>Назначенные препараты</th>
                <th>Жалобы пациентов (ключевое слово)</th>
                <th></th>
                <th></th>
            </tr>

        <?php foreach ($articles_table as $a): ?> <!-- Проходимся по каждому элементу массива
        $articles_table(admin-panel/index.php) и при каждой итерации элемент массива будет присвоен переменной $a -->

            <tr>
                <td><?=$a['ФИО Пациента']?></td>
                <td><?=$a['Страховой полис']?></td>
                <td><?=$a['Паспорт']?></td>
                <td><?=$a['Палата']?></td>
                <td><?=$a['Отделение']?></td>
                <td><?=$a['ФИО Лечащего врача']?></td>
                <td><?=$a['Должность']?></td>
                <td><?=$a['Диагноз']?></td>
                <td><?=$a['Симптом']?></td>
                <td><?=DateTime::createFromFormat('Y-m-d',$a['Дата поступления'])->format('d/m/Y');?></td>
                <td><?=DateTime::createFromFormat('Y-m-d',$a['Дата выписки'])->format('d/m/Y');?></td>
                <td><?=$a['Аллергия к препаратам']?></td>
                <td><?=$a['Назначенные препараты']?></td>
                <td><?=$a['Жалобы пациентов']?></td>

               <td><a href="../admin-panel/index.php?action=edit&id=<?=$a['id']?>">Редактировать</a> <!-- будем редактировать статью
                    через параметр action=edit где id это идшник нашей статьи -->
                </td>
                <td>
                    <!-- модалка с подтверждением удаления -->
                    <a onclick = "return confirm('Вы уверены?')"
                       href="../admin-panel/index.php?action=delete&id=<?=$a['id']?>">Удалить</a>
                </td>
            </tr>

        <?php endforeach; ?>

        </table>

    </div>
    <br><br><br><br>
</div>
</body>
</html>