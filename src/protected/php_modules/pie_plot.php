<?php
require_once '/var/www/vendor/autoload.php';
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

function create_pie_plot($data){
    $values = array_values($data);
    $keys = array_keys($data);
    // Create the Pie Graph.
    $graph = new Graph\PieGraph(500, 500);
    // Create pie plot
    $graph->title->Set('Сумма чека');
    $p1 = new Plot\PiePlot($values);
    $p1->value->Show();
    $graph->Add($p1);
    $p1->SetLegends($keys);

    $graph->Stroke("charts/pie_graph.jpg");
}
?>