<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Мой первый блог</title>
    <link rel="stylesheet" href="../source/style.css">
    <link rel="stylesheet" href="../source/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Мой первый бложик</h1>
    <div>
        <div class="article">
            <h3> <?=$article['title']?> </h3> <!-- Выводим переменную $article которая является массивом с
            ключом title -->
            <em>Опубликовано: <?= $article['date'] ?> </em>
            <p> <?= $article['content'] ?> </p>
        </div>
    </div>
    <footer>
        <p>Мой первый блог<br>Copyright &copy; 2015</p>
    </footer>
</div>
</body>
</html>