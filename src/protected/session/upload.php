<?php

$file = $_FILES['file'];

if($file["type"] !== "application/pdf"){
    echo "<h1><a href='settings.php'>Назад</a></h1>";
    die('Неверный формат данных');
} else {

    $filename = pathinfo($file["name"], PATHINFO_FILENAME) . time() . "." . pathinfo($file["name"], PATHINFO_EXTENSION);

    move_uploaded_file($file["tmp_name"], "files/" . $filename);

    header('Location: settings.php');
}


?>