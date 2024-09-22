<?php
if($_POST['submit'] && !$_POST['exit']){
    $user = $_POST['login'];
    $pass = $_POST['password'];
    
    $sql = "SELECT * FROM `users` WHERE name='$user' AND password='$pass'";
    $resault = $link->query($sql);
    $row = $resault->fetch_assoc();
    
    if ($resault->num_rows > 0) {
        setcookie("name", $user, time() + 3600 * 24 * 365);
        // $bn=$_SERVER['HTTP_REFERER'];
        header("Location:/?page=1");
    }
}


if($_POST['exit']){
    $resault = '';
    setcookie("name", $user, time() -3600 * 24 * 365);
    header("Location:/");
}