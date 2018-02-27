<?php
    /* Вывод всех статей (2)*/
    function articles_all($link) /* на вход функция articles_all будет принимать подключение к базе $link */
{
//Запрос.
$query = "SELECT
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
/* Выбрать все колонки из таблицы articles и
отсортировать по колонке id в убывающем порядке. * - обозначается все колонки */
$result = mysqli_query($link, $query); /* Все что мы отобрали (САМ ЗАПРОС) записываем в переменную $result */

if (!$result) /* Если произошла ошибка, восклицательный знак - логическая инверсия */
die(mysqli_error($link)); /* приостанавливаем работу скрипта и выводим ошибку. В $link содержится инфа
дескриптора */
/* Если все прошло успешно мы получаем количество строк которое нам вернула база */

/* Функция fetch_all преобразует массив в который у нас в $result
в правильный(ключ - значение) массив */
/* Второй параметр делает именно НАШИ ключи точкой отсчета и приравнивает данные
к ключам, Ежели без параметра будут приравниватся к отсчету с нуля */
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

return $articles; /* возвращаем результат в название функции */
}

    /* Получение определенной статьи по id */
    function articles_get($link, $id_article) /* вторая переменная действует только внутри функции */
    {

    /* sprintf — Возвращает отформатированную строку */
    $query = sprintf("SELECT
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
    ", (int)$id_article); /* Выборка из таблицы по всем
    столбцам из таблицы articles где id равняется входящей в параметры переменной $id_article КОТОРАЯ является
    параметром $_GET['id'] (из get_article.php) который получил идшник нужной статьи из url'a  */

    $result = mysqli_query($link, $query); /* Все что мы отобрали (САМ ЗАПРОС) записываем в переменную $result */

    if (!$result) /* если запрос не выополнился */
    die(mysqli_fetch_assoc($link)); /* сообщаем о ошибке */

    $article = mysqli_fetch_assoc($result); /* Получаем результат в виде ассоциативного массива */

    return $article; /* возращаем в функцию */
    }

    /* Создание новой статьи через админку */
    function articles_new($link, $fio_pacienta, $strahovoi_polis, $pasport, $palata, $otdelenie,
                          $fio_vracha, $diagnoz, $simptom, $data_postuplenia, $data_vipiski, $allergia_k_preparatam, $naznachenie_preparati){
        for ($i=0; $i<=12; $i++) {
            mysqli_query($link, "INSERT IGNORE INTO `FIO_pacienta`(`id`, `fio_pacienta`) VALUES (NULL,'$fio_pacienta')");
            mysqli_query($link, "INSERT IGNORE INTO `Strahovoi_polis`(`id`, `Nomer_polisa`, `fio_pacienta`) VALUES (LAST_INSERT_ID(),'$strahovoi_polis', '$fio_pacienta')");
            mysqli_query($link, "INSERT IGNORE INTO `Pasport`(`id`, `nomer_pasporta`, `fio_pacienta`) VALUES (LAST_INSERT_ID(),'$pasport', '$fio_pacienta')");
            mysqli_query($link, "INSERT IGNORE INTO `Palata`(`id`, `nomer_palati`, `fio_pacienta`, `fio_vracha`, `data_postuplenia`, `data_vipiski`)
                                        VALUES (LAST_INSERT_ID(),'$palata', '$fio_pacienta', '$fio_vracha', '$data_postuplenia', '$data_vipiski')");
            mysqli_query($link, "INSERT IGNORE INTO `Otdelenie`(`id`, `nazvanie_otdelenia_specialnost`, `fio_pacienta`) VALUES (LAST_INSERT_ID(),'$otdelenie', '$fio_pacienta')");
            mysqli_query($link, "INSERT IGNORE INTO `fio_vracha`(`id`, `fio_vracha`, `nazvanie_otdelenia_specialnost`) VALUES (LAST_INSERT_ID(),'$fio_vracha','$otdelenie')");
            mysqli_query($link, "INSERT IGNORE INTO `Diagnoz`(`id`, `diagnoz`, `fio_pacienta`, `fio_vracha_postavivshego_diagnoz`) 
                                        VALUES (LAST_INSERT_ID(),'$diagnoz','$fio_pacienta','$fio_vracha')");
            mysqli_query($link, "INSERT IGNORE INTO `Simptom`(`id`, `simptom`, `fio_pacienta`) VALUES (LAST_INSERT_ID(),'$simptom','$fio_pacienta')");
            mysqli_query($link, "INSERT IGNORE INTO `data_postuplenia`(`id`, `data_postuplenia`, `fio_pacienta`) VALUES (LAST_INSERT_ID(),'$data_postuplenia','$fio_pacienta')");
            mysqli_query($link, "INSERT IGNORE INTO `data_vipiski`(`id`, `data_vipiski`, `fio_pacienta`) VALUES (LAST_INSERT_ID(),'$data_vipiski','$fio_pacienta')");
            mysqli_query($link, "INSERT IGNORE INTO `allergia_k_preparatam`(`id`, `alergia_k_preparatam`, `fio_pacienta`) VALUES (LAST_INSERT_ID(),'$allergia_k_preparatam','$fio_pacienta')");
            mysqli_query($link, "INSERT IGNORE INTO `Naznachenie_preparati`(`id`, `naznachenie_preparati`, `fio_pacienta`, `fio_vracha_naznachivzhego_preparati`) 
                                                  VALUES (LAST_INSERT_ID(),'$naznachenie_preparati','$fio_pacienta','$fio_vracha')");
        }
        return mysqli_affected_rows($link); /* Если все гуд, возвращаем кол-во статей которое было успешно отредактировано */
    }

    /* Обновляет содержимое уже существующей статьи */
    function articles_edit($link){

        $fio = $_POST['fio_pacienta'];

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
        }


    return mysqli_affected_rows($link); /* Если все гуд, возвращаем кол-во статей которое было успешно отредактировано */
    }


    /* Удаляет статью */
    function articles_delete($link, $id){

    $id = (int)$id; /* конвертируем в integer хз зачем */
    //Проверка
    if ($id == 0) return false;

    //Запрос
    $query = sprintf("DELETE FROM FIO_pacienta WHERE id='%d'", $id);
    /* удалить из табл articles строку в которой ид = $id  */
    $result = mysqli_query($link, $query);


    if (!$result)
    die (mysqli_error($link));

    return mysqli_affected_rows($link); /* Возвращает число строк, затронутых последним INSERT, UPDATE, REPLACE или
    DELETE запросом.*/
    }

    /*Обрезка статей на главной странице не больше 500 символов */
    function articles_intro ($text, $len = 500) /* $text - сам текст, $len - желаемая длинна */
    {
    return mb_substr($text, 0, $len); /* функция multibyte substr - копирует $text начиная с 0 позиции длинной $len */
    }
    ?>