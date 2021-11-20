<?php
require_once '/var/www/vendor/autoload.php';

use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

function create_bar_plot($data)
{
    $datay = array_values($data);

// Setup the graph.
    $__width = 600;
    $__height = 600;
    $graph = new Graph\Graph($__width, $__height);
    $graph->SetScale('textlin');
    $graph->SetMargin(30, 20, 60, 20);

    $graph->title->Set('Возраст посетителей');
    $graph->xaxis->SetTickLabels(array_keys($data));

// Create the bar pot
    $bplot = new Plot\BarPlot($datay);
    $graph->Add($bplot);
    $graph->Stroke("charts/bar_graph.jpg");
}
