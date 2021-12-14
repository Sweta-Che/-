<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=    , initial-scale=1.0">
    <title>Доска объявлений</title>
    <link rel="stylesheet" href="css.css">    
</head>
<p class="z">Доска объвлений</p>

<div class="блок1">
<form action="add.php" method='POST'>
<label for="text">Введите описание объявления</label>
<input type="text" name="text"> <br>
<label for="cena">Цена</label>
<input type="integer" name="cena">  Руб. <br>
<label for="date">Введите дату</label>
<input type="date" name="date"> <br>
<label for="file">Загрузите фотографию</label>
<input type="file" name="file"> <br><br>
<button type="submit" class="knopka">Выложить объявление</button> <br>
</form>
<br>
<a href="Возрастание.php"><button class="knopka2">Цена по возрастанию</button></a>
<a href="Объявления.php"><button class="knopka2">Цена по убыванию</button></a>
</div>

<body>
<div class="блок2">
<?php
$user='root';
$password='root';
$db='objavlenie';//название базы данных
$host='127.0.0.1';

$dsn="mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn,$user,$password);

echo '<ul>';

$stmt = $pdo->query('SELECT opisanie,cena,data,file FROM `obv` ORDER BY `obv`.`cena` DESC');//здесь содержатся все данные по имени? DESK -ПО УБЫВАНИЮ
while ($row = $stmt->fetch(PDO::FETCH_OBJ)) { //в ров содержится один ряд из таблицы
    echo $row->opisanie.' '.$row->cena.' Руб. '.'<span class="date">'. $row->data. '</span>'. '<br>';
}

echo '</ul>';
?>
</div>
</body>
</html>