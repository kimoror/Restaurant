<?php
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $post = $_POST['post'];
    $salary = $_POST['salary'];
    $age = $_POST['age'];

    $link = new mysqli("db", "user", "password", "appDB");
    $link->query("INSERT IGNORE INTO staff (firstName, surname, post, salary, age) VALUES ('".$firstname."', '".$surname."', '".$post."', '".$salary."', '".$age."')");
    header('Location: ../staff.php');
?>