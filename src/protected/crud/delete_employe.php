<?php
$link = new mysqli("db", "user", "password", "appDB");

if($link->connect_error){
    die("Ошибка: " . $link->connect_error);
}
$employeid = $link->real_escape_string($_POST["id"]);
$sql = "DELETE FROM staff WHERE id = $employeid";
if($link->query($sql)){
    header("Location: ../staff.php");
}
else{
    echo "Ошибка: " . $link->error;
}
$link->close();