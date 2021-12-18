<?php
/**
 * @file Barb.php
 * @author John Glasser
 * @date 8 Dec 2021
 * @brief File Creating graph of Barbeline
 *
 * Creates of Barbeline hall to use with Dijkstra to implement path finding functionality
 */

include_once "Vertex.php";
include_once "mapBarb.php";

//create vertexes
//rooms
$R221 = new Vertex('R221');
$R225 = new Vertex('R225');
$R226 = new Vertex('R226');
$R264 = new Vertex('R264');
$R265 = new Vertex('R265');
$R303 = new Vertex('R303');
$R306 = new Vertex('R306');
//staircases
//central stair case from floor 2 to 3 ("Stair Central")
$SC2 = new Vertex('SC2');
$SC3 = new Vertex('SC3');

//stairs outside room 264 leading up to 265 ("Stair Room")
$SR2 = new Vertex('SR2');
$SR25 = new Vertex('SR25');


//stairs outside math department
$SNE2 = new Vertex('SNE2');
$SNE1 = new Vertex('SNE1');

//stairs between philosophy dept
$SNW2 = new Vertex('SNW2');
$SNW1 = new Vertex('SNW1');

//western stairs that go from 1 to 2 to 2.5 (R265) to 3 (exclude 1 for our map) ("Stair West")
$SW1 = new Vertex('SW1');
$SW2 = new Vertex('SW2');
$SW25 = new Vertex('SW25');
$SW3 = new Vertex('SW3');

//doors
//east arcade
$DEA = new Vertex('DEA');
//west arcade
$DWA = new Vertex('DWA');
//central by bathrooms
$DC = new Vertex('DC');
//at base of west stairs
$DW = new Vertex('DW');

$R221->addEdge($R225, 4);

$R225->addEdge($R221, 4); //*
$R225->addEdge($R226, 1);

$R226->addEdge($R225, 1); //*
$R226->addEdge($SNE2, 5);

$SNE2->addEdge($R226, 5);
$SNE2->addEdge($SNE1, 8);
$SNE2->addEdge($SNW2, 5);

$SNW2->addEdge($SNE2, 5);
$SNW2->addEdge($SNW1, 8);
$SNW2->addEdge($SC2, 4);

$SC2->addEdge($SNW2, 4); //*
$SC2->addEdge($R264, 2);
$SC2->addEdge($SC3, 8);

$R264->addEdge($SC2, 2); //*
$R264->addEdge($SR2, 1);

$SR2->addEdge($R264, 1); //*
$SR2->addEdge($SW2, 10);
$SR2->addEdge($SR25, 6);

$SR25->addEdge($SR2, 6);
$SR25->addEdge($R265, 1);

$R265->addEdge($SR25, 1); //*
$R265->addEdge($SW25, 1);

$SW2->addEdge($SR2, 10);
$SW2->addEdge($SW1, 8);
$SW2->addEdge($SW25, 8);

$SW25->addEdge($SW2, 8);
$SW25->addEdge($R265, 1);
$SW25->addEdge($SW3, 8);

$SW3->addEdge($SW25, 8);
$SW3->addEdge($R306, 5);

$R306->addEdge($SW3, 5); //*
$R306->addEdge($R303, 3);

$R303->addEdge($R306, 3); //*
$R303->addEdge($SC3, 4);

$SC3->addEdge($R303, 4); //*
$SC3->addEdge($SC2, 8);

$SNE1->addEdge($SNE2, 8);
$SNE1->addEdge($DEA, 7);

$DEA->addEdge($SNE1, 7);
$DEA->addEdge($DWA, 2);

$SNW1->addEdge($SNW2, 8);
$SNW1->addEdge($DC, 4);
$SNW1->addEdge($DWA, 4);

$DWA->addEdge($SNW1, 4);
$DWA->addEdge($DEA, 2);

$DC->addEdge($SNW1, 4);
$DC->addEdge($DW, 10);

$DW->addEdge($DC, 10);
$DW->addEdge($SW1, 1);

$SW1->addEdge($DW, 1);
$SW1->addEdge($SW2, 8);



//create graph
$g = new graph();

$g->addNode($R221);
$g->addNode($R225);
$g->addNode($R226);
$g->addNode($SNE2);
$g->addNode($SNE1);
$g->addNode($SNW2);
$g->addNode($SNW1);
$g->addNode($R264);
$g->addNode($R265);
$g->addNode($R303);
$g->addNode($R306);
$g->addNode($SC2);
$g->addNode($SC3);
$g->addNode($SR2);
$g->addNode($SR25);
$g->addNode($SW1);
$g->addNode($SW2);
$g->addNode($SW25);
$g->addNode($SW3);
$g->addNode($DEA);
$g->addNode($DWA);
$g->addNode($DC);
$g->addNode($DW);

//create list of nodes
$nodes = array("221"=>$R221, "225"=>$R225, "226"=>$R226, "264"=>$R264, "265"=>$R265, "303"=>$R303, "306"=>$R306,
"DEA"=>$DEA, "DWA"=>$DWA,
"DC"=>$DC, "DW"=>$DW);
createKey();
?>


<html>
<div class = "title">Barbelin Hall</div>
<div class = "background">
<img id = "barbFloorPlan" src="https://github.com/JGlass25/TeamC/blob/main/BarbHall1_2_3.jpeg?raw=true" alt="Barbelin" height="500">
<div class = "EDWA">DWA</div>
<div class = "EDEA">DEA</div>
<div class = "button_right"> Enter desired room below
<form method="post">
    <label>Start: </label>
    <input type="text" name="start"/>
    <br>
    <label>Dest: </label>
    <input type="text" name="end"/>
    <br>
	<input type="submit" name="go" value="Go!"/>
</form>
<br>
</div>
<br>
<?php

//error handling
set_error_handler('exceptions_error_handler');

function exceptions_error_handler($severity, $message, $filename, $lineno) {
  if (error_reporting() == 0) {
    return;
  }
  if (error_reporting() & $severity) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
  }
}

if (isset($_POST['go'])) {
    if (!empty($_POST['start']) && !empty($_POST['end'])) {

        //declare start and end nodes
        try{
            $start = $nodes[$_POST['start']];
            $end = $nodes[$_POST['end']];
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            exit();
        }

        //populate vertex info from start node
        $g->runDijkstra($start);

        //find path from start to end
        $path = $g->getPath($start, $end);

        //parse found path
        foreach ($path as $x) {
            $pathNames[] = $x->name;
        }


        //print path
        echo '<br>';
        echo '<div class="boxed">Path from ' . $start->name . " to " . $end->name . '<br>Time = ' . $end->distanceFromStart * 2 . ' seconds</div>';
        ///echo '<div class="boxed">Time = ' . $end->distanceFromStart * 2 . ' seconds<br></div>';
        //echo $g;

        drawPath($pathNames);
    } else {
        echo "Missing Location";
    }
}
//mark west enterance on the map


// checks where the user selected to start and marks it w/ *
switch ($_POST['start']) {
  case "221":
    echo '<div class = "StartR221">*</div>';
    break;
  case "225":
    echo '<div class = "StartR225">*</div>';
    break;
  case "226":
    echo '<div class = "StartR226">*</div>';
    break;
 case "264":
    echo '<div class = "StartR264">*</div>';
    break;
  case "265":
    echo '<div class = "StartR265">*</div>';
    break;
  case "303":
    echo '<div class = "StartR303">*</div>';
    break;
  case "306":
    echo '<div class = "StartR306">*</div>';
    break;
}
// checks were the user selected to end and marks it w/ *
switch ($_POST['end']) {
  case "221":
    echo '<div class = "StartR221">*</div>';
    break;
  case "225":
    echo '<div class = "StartR225">*</div>';
    break;
  case "226":
    echo '<div class = "StartR226">*</div>';
    break;
 case "264":
    echo '<div class = "StartR264">*</div>';
    break;
  case "265":
    echo '<div class = "StartR265">*</div>';
    break;
  case "303":
    echo '<div class = "StartR303">*</div>';
    break;
  case "306":
    echo '<div class = "StartR306">*</div>';
    break;
}

?>
<br> <br>
</div>
</html>
?>
<br> <br>
</div>
</html>
