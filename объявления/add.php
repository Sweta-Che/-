<?php
$text=$_POST['text'];
$cena=$_POST['cena'];
$date=$_POST['date'];
$file=$_POST['file'];
if (($text=='') or ($cena=='') or ($date=='') or ($file=='')) {
    echo 'Заполните форму';
    exit();
}

$user='root';
$password='root';
$db='objavlenie';//название базы данных 
$host='127.0.0.1';

$dsn="mysql:host=$host;dbname=$db";
$pdo = new PDO($dsn,$user,$password);

$sql="INSERT INTO `obv`(`opisanie`, `cena`, `data`, `file`) VALUES (:text, :cena, :date, :file)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['text'=>$text,'cena'=>$cena,'date'=>$date,'file'=>$file]);




header('location:http://portf/%d0%be%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f/%d0%9e%d0%b1%d1%8a%d1%8f%d0%b2%d0%bb%d0%b5%d0%bd%d0%b8%d1%8f.php'); //переадресация на другую страницу
?>