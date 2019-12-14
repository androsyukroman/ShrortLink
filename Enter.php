<?php

    $login = $_POST['login'];
    $password = $_POST['password'];
    $connect = mysqli_connect('localhost', $login, $password, 'links');
    if(($connect))
    {
        header('Location: http://sl/db.php');
    }
    else{
        echo 'Error';
    }

?>