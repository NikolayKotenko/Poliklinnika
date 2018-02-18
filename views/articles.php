<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Мой первый блог</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Мой первый бложик</h1>
    <a href="../admin-panel/index.php">Панель администратора</a> <!-- Ссылка именно на index.php потому что в начале
    мы сформировали таблицу статей, потом инклюдили файл table_articles_admin-panel.php в котором отображали все -->
    <div>
        <?php foreach ($articles as $a): ?> <!-- Проходимся по каждому элементу массива $articles(index.php)
        и при каждой итерации элемент массива будет присвоен переменной $a -->

        <div class="article">

            <h3>
                <a href="../get_article.php?id= <?=$a['id']?> "> <!-- При нажатии на тайтл переходим на get_article.php
                 где id берется из $a -->
                <?=$a['title']?> </a>
            </h3>

            <em> Опубликовано: <?=$a['date']?> </em>
            <p> <?=articles_intro($a['content'])?> </p> <!-- посылаем в функцию articles_intro (файл с логикой)
            полученный контент, она обратно возвращает обрезанный в 500 символов текст для главной страницы -->

        </div>

       <?php endforeach; ?>
    </div>
    <footer>
        <p>Мой первый блог<br>Copyright &copy; 2015</p>
    </footer>
</div>
</body>
</html>