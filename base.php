<?php

    $connect = mysqli_connect('localhost', 'root', '', 'links');
    if ($connect == false)
    {
        echo 'Error<br>';
        echo mysqli_connect_error();
        exit();
    }

    $url = $_POST['base'];
    $abc = "AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpRrSsTtUuVvWWXxYyZz0123456789";
    $rand = substr(str_shuffle($abc),0, 5);
    $link = "http://sl/";
    $sql = $connect->query ("INSERT INTO links (ID, Link, ShortLink, NameLink) VALUES (NULL, '$url', '$link$rand.php', '$rand.php')");
    $f = fopen("$rand.php", "w");
	fwrite($f, "<?php header('Location: $url') ?>");
    fclose($f);
    
    $link = $link . $rand . '.php';
    echo $link;
    mysqli_close($connect);
?>