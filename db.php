<?php
$host = 'localhost'; // имя хоста
$user = 'root';      // имя пользователя
$pass = '';          // пароль
$name = 'Kamaz';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);

// if (!$link) {
//     die('<p style="color:red">'.mysqli_connect_errno().' - '.mysqli_connect_error().'</p>');
// }
    
