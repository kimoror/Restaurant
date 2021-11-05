<?php
session_start();
// соединение с БД redis
$redis = new Redis();
$redis->pconnect('redis', 6379);

$user = hash('MD5', $_SERVER['PHP_AUTH_USER']);

// создание папки для файлов, если её нет
if (!is_dir('files')) {
    mkdir("files");
}

// проверка, поступили ли изменения данных
if (isset($_POST['name'])) {
    $redis->set($user . ':name', $_POST['name']);
    $_SESSION["name"] = $redis->get($user . ':name');
}
if (isset($_POST['status'])) {
    $redis->set($user . ':status', $_POST['status']);
    $_SESSION["status"] = $redis->get($user . ':status');
}
if (isset($_POST['style'])) {
    $redis->set($user . ':style', $_POST['style']);
    $_SESSION["style"] = $redis->get($user . ':style');
}

?>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <?php
    if ($_SESSION["style"] == 1)
        echo '<link rel="stylesheet" href="themes.css" type="text/css" />';
    ?>
</head>

<body>


<h1>Меня зовут: <?php echo $_SESSION["name"] ?></h1>
<h2>Кто я: <?php echo $_SESSION["status"] ?></h2>

<!-- загрузка файлов -->
<h1>Личные документы:</h1>
<table>
    <?php
    // используется вместо $files = scandir('files'), чтобы убрать . и .. из linux
    $files = array_diff(scandir('files'), array('..', '.'));
    foreach ($files as $file)
        echo "<tr><td>$file</td>
            <td><form method='get' action='download.php'> <input type='hidden' name='file_name' value=$file> <input type='submit' value='Скачать' > </form> </td></tr>";
    ?>
</table>

<!-- выгрузка файлов -->
<h1>Загрузка pdf</h1>
<form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <p>
        <input type="submit" value="Загрузить файл">
    </p>
</form>

<!-- ссылка назад -->
<h1><a href=<?php echo $_SERVER['HTTP_REFERER'] ?>>Назад</a></h1>

<!-- формы для изменения данных -->
<hr>
<h1>Изменить данные</h1>
<form method="POST">
    <input name="name" type="text" value="<?php echo $_SESSION["name"] ?>">
    <input type="submit" value="Изменить имя">
</form>
<form method="POST">
    <textarea name="status" cols="40" rows="3"><?php echo $_SESSION["status"] ?></textarea>
    <p>
        <input type="submit" value="Изменить статус">
        <input type="reset" value="Очистить">
    </p>
</form>
<form method="POST">
    <input type="radio" name="style" value=1> Темная тема
    <Br>
    <input type="radio" name="style" value=0> Светлая тема
    <Br>
    <input type="submit" value="Установить стиль">
</form>

</body>