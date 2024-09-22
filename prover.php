<?php

$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'Kamaz';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");


$res = mysqli_query($link, "SELECT * FROM users WHERE `name` = '" . $_POST['login'] . "'") or die(mysqli_error($link));
$row = mysqli_fetch_assoc($res);

?>
<?php
$response = ['message' => $row];
header('Content-type:application/json');
header("Access-Control-Allow-Origin: http://kamaz");
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Authorization");
echo json_encode($response);
?>
<?php
// } 
// else {
// // если ошибка!
// }
?>