<?php
require_once '/var/www/vendor/autoload.php';
// include "watermark.php";
use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;

function create_line_plot($S, $M, $L){
    $datay1 = array_values($S);
    $datay2 = array_values($M);
    $datay3 = array_values($L);
    // Setup the graph
    $__width  = 600;
    $__height = 600;
    $graph = new Graph\Graph($__width, $__height);
    $graph->SetMargin(30, 20, 60, 20);
    $graph->SetScale('textlin');
    $graph->xaxis->SetTickLabels(array_keys($S));

    // Setup title
    $graph->title->Set('Размеры чаевых по дням недели');
    $graph->xgrid->Show();
    $graph->legend->SetLineWeight(1);
    // Create the line plots
    $p1 = new Plot\LinePlot($datay1);
    // $p1->SetWeight(2);
    $p1->SetColor('red');
    $p1->SetLegend('0%');
    $graph->Add($p1);
    $p2 = new Plot\LinePlot($datay2);
    $p2->SetColor('darkgreen');
    // $p2->SetWeight(2);
    $p2->SetLegend('0%-10%');
    $graph->Add($p2);
    $p3 = new Plot\LinePlot($datay3);
    $p3->SetColor('blue');
    // $p3->SetWeight(2);
    $p3->SetLegend('10%+');
    $graph->Add($p3);
    // Add a vertical line at the end scale position '7'
    $l1 = new Plot\PlotLine(VERTICAL, 10);
    $graph->Add($l1);
    // Output the graph
    $graph->Stroke("charts/line_graph.jpg");
}
?>