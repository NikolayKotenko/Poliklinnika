<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Мой первый блог</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
     <style>
         html, body { font-size: 8pt; }
         th, table {text-align: center;}
         td { padding: 5px;}
    </style>
</head>
<body>
<div class="container">
    <h1>Мой первый бложик</h1>
    <div>
<!--        <pre>-->
<!--        --><?php //print_r($articles_table)  ?>
<!--        </pre>-->
        <a href="../views/form_add_new_article_admin-panel.php">Добавить статью</a> <!-- Ссылка скрытого пула) в файле admin-panel
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
                <th>Диагноз</th>
                <th>Симптом</th>
                <th>Дата поступления</th>
                <th>Дата выписки</th>
                <th>Аллергия к препаратам</th>
                <th>Назначенные препараты</th>
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
                <td><?=$a['Диагноз']?></td>
                <td><?=$a['Симптом']?></td>
                <td><?php echo DateTime::createFromFormat('Y-m-d',$a['Дата поступления'])->format('d/m/Y');?></td>
                <td><?php echo DateTime::createFromFormat('Y-m-d',$a['Дата выписки'])->format('d/m/Y');?></td>
                <td><?=$a['Аллергия к препаратам']?></td>
                <td><?=$a['Назначенные препараты']?></td>

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
    <footer>
        <p>Мой первый блог<br>Copyright &copy; 2015</p>
    </footer>
</div>
</body>
</html>