<?php
include "pie_plot.php";
include "line_plot.php";
include "bar_plot.php";
include "fixtures.php";
include_once "watermark.php";

// сгенерировать фикстуры
$data = generate_data();

// выделить нужные данные
$cheque_amount = ["0-1000" => 0, "1000-2000" => 0, "2000-5000" => 0, "5000+" => 0];
$zero_percent = ["Monday" => 0, "Tuesday" => 0, "Wednesday" => 0, "Thursday" => 0, "Friday" => 0, "Saturday" => 0, "Sunday" => 0];
$ten_percent = ["Monday" => 0, "Tuesday" => 0, "Wednesday" => 0, "Thursday" => 0, "Friday" => 0, "Saturday" => 0, "Sunday" => 0];
$ten_plus_percentage = ["Monday" => 0, "Tuesday" => 0, "Wednesday" => 0, "Thursday" => 0, "Friday" => 0, "Saturday" => 0, "Sunday" => 0];
$ages = ["10-25" => 0, "26-39" => 0, "40-52" => 0, "53-79" => 0];

foreach ($data as $person) {
    $cheque_amount[$person['cheque']] +=1;
    switch ($person["tips"]){
        case "0%":
            $zero_percent[$person['day']] +=1;
            break;
        case "0%-10%":
            $ten_percent[$person['day']] +=1;
            break;
        case "10%+":
            $ten_plus_percentage[$person['day']] +=1;
            break;
    }
    if ($person['age'] >10 and  $person['age'] <= 25)
        $ages["10-25"] +=1;
    if ($person['age'] >25 and  $person['age'] <= 39)
        $ages["26-39"] +=1;
    if ($person['age'] >40 and  $person['age'] <= 52)
        $ages["40-52"] +=1;
    if ($person['age'] >53 and  $person['age'] <= 79)
        $ages["53-79"] +=1;
}


// сгенерировать графики
create_pie_plot($cheque_amount);
create_line_plot($zero_percent, $ten_percent, $ten_plus_percentage);
create_bar_plot($ages);



// добавить на графики водный знак
create_watermark('charts/line_graph.jpg');
create_watermark('charts/bar_graph.jpg');
create_watermark('charts/pie_graph.jpg');
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="../style.css" type="text/css" /> -->
</head>
<body>

<p><img src="charts/pie_graph.jpg"> </p>
<p><img src="charts/bar_graph.jpg"> </p>
<p><img src="charts/line_graph.jpg"> </p>
<?php
if ( !empty($_SERVER['HTTP_REFERER']) ) {
    echo '<h1><a href="' . $_SERVER['HTTP_REFERER'] . '"">Назад</a></h1>';
}
?>

<table>
    <tr>
        <th>Имя</th>
        <th>Возраст</th>
        <th>Cумма чека</th>
        <th>Процент чаевых</th>
        <th>День недели</th>
    </tr>
    <?php
    foreach ($data as $person) {
        echo "<tr><td>{$person['name']}</td>
            <td>{$person['age']}</td>
            <td>{$person['cheque']}</td>
            <td>{$person['tips']}</td>
            <td>{$person['day']}</td>
            </tr>";
    }
    ?>
</table>
</body>
</html>