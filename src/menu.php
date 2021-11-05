<html lang="ru">

<head>
    <meta charset="UTF-8">
</head>

<body>
<table>
    <tr><th>Id</th><th>Название</th><th>Цена</th></tr>
<?php
$testVariable = "testText";
echo "<b>$testVariable</b>";
$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM dishes");
foreach ($result as $row){
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td></tr>";
}
?>
    <h1><a href=<?php echo $_SERVER['HTTP_REFERER'] ?>>Назад</a></h1>
</table>
</body>