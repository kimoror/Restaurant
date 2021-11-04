<?php

$link = new mysqli("db", "user", "password", "appDB");

$method = $_SERVER["REQUEST_METHOD"];
switch ($method){

    case 'PUT':
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $post = $_POST['post'];
        $salary = $_POST['salary'];
        $age = $_POST['age'];
        $link = new mysqli("db", "user", "password", "appDB");
        $link->query("UPDATE staff SET firstname ='".$firstname."', surname ='".$surname."', post = '".$post."', salary = '".$salary."', age = '".$age."' WHERE id = " . $id);
        header('Location: ../staff.php');
        break;

    case 'POST':
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $post = $_POST['post'];
        $salary = $_POST['salary'];
        $age = $_POST['age'];
        $link = new mysqli("db", "user", "password", "appDB");
        $link->query("INSERT IGNORE INTO staff (firstName, surname, post, salary, age) VALUES ('".$firstname."', '".$surname."', '".$post."', '".$salary."', '".$age."')");

        break;

    case 'DELETE':
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

    default:
        echo $method;
        break;
}


?>