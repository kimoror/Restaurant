<html lang="en">

<head>
    <link rel="stylesheet" href="../style.css" type="text/css" />
</head>

<body>
<h1>Изменить данные</h1>
<?php
$id = $_GET['id'];
$link = new mysqli("db", "user", "password", "appDB");
$result = $link->query("SELECT * FROM person WHERE id ='" . $id . "'");
?>

<form method="post" action="update_employe.php">
    <p>Имя: <input type="text" name="firstname" required /></p>
    <p>Фамилия: <input type="text" name="surname" required /></p>
    <p>Должность: <input type="text" name="post" required /></p>
    <p>Зарплата: <input type="text" name="salary" required /></p>
    <p>Возраст: <input type="text" name="age" required /></p>
    <input type="hidden" name="id" value=<?php echo $id ?> >
    <p><input type="submit" /></p>
</form>

<br>
<h1><a href="../staff.php">Назад</a></h1>
</body>

</html>