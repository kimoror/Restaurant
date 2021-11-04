<?php
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $post = $_POST['post'];
    $salary = $_POST['salary'];
    $age = $_POST['age'];

    $link = new mysqli("db", "user", "password", "appDB");

    $link->query("UPDATE staff SET firstname ='".$firstname."', surname ='".$surname."', post = '".$post."', salary = '".$salary."', age = '".$age."' WHERE id = " . $id);
    header('Location: ../staff.php');