<?php
include_once "Vertex.php";

//create vertexes
$R221 = new Vertex('R221');
$R225 = new Vertex('R225');
$R226 = new Vertex('R226');
$R264 = new Vertex('R264');
$R265 = new Vertex('R265');
$R303 = new Vertex('R303');
$R306 = new Vertex('R306');
$SC2 = new Vertex('SC2');
$SC3 = new Vertex('SC3');
$SR2 = new Vertex('SR2');
$SR25 = new Vertex('SR25');
$SW2 = new Vertex('SW2');
$SW25 = new Vertex('SW25');
$SW3 = new Vertex('SW3');

$R221->addEdge($R225, 4);

$R225->addEdge($R221, 4);
$R225->addEdge($R226, 1);

$R226->addEdge($R225, 1);
$R226->addEdge($SC2, 10);

$SC2->addEdge($R226, 10);
$SC2->addEdge($R264, 2);
$SC2->addEdge($SC3, 8);

$R264->addEdge($SC2, 2);
$R264->addEdge($SR2, 1);

$SR2->addEdge($R264, 1);
$SR2->addEdge($SW2, 10);
$SR2->addEdge($SR25, 6);

$SR25->addEdge($SR2, 6);
$SR25->addEdge($R265, 1);

$R265->addEdge($SR25, 1);
$R265->addEdge($SW25, 1);

$SW2->addEdge($SR2, 10);
$SW2->addEdge($SW25, 8);

$SW25->addEdge($SW2, 8);
$SW25->addEdge($R265, 1);
$SW25->addEdge($SW3, 8);

$SW3->addEdge($SW25, 8);
$SW3->addEdge($R306, 5);

$R306->addEdge($SW3, 5);
$R306->addEdge($R303, 3);

$R303->addEdge($R306, 3);
$R303->addEdge($SC3, 4);

$SC3->addEdge($R303, 4);
$SC3->addEdge($SC2, 8);

//create graph
$g = new graph();

$g->addNode($R221);
$g->addNode($R225);
$g->addNode($R226);
$g->addNode($R264);
$g->addNode($R265);
$g->addNode($R303);
$g->addNode($R306);
$g->addNode($SC2);
$g->addNode($SC3);
$g->addNode($SR2);
$g->addNode($SR25);
$g->addNode($SW2);
$g->addNode($SW25);
$g->addNode($SW3);

//create list of nodes
$nodes = array("221"=>$R221, "225"=>$R225, "226"=>$R226, "264"=>$R264, "265"=>$R265, "303"=>$R303, "306"=>$R306);
?>


<html>
<h2>Barbeline</h2>
<img src="blankBarb.jpeg" alt="Graph" width="500">
<br> <br>
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
        echo 'Path from ' . $start->name . " to " . $end->name . "<br>";
        echo 'distance = ' . $end->distanceFromStart;
        echo '<pre>'; print_r($pathNames); echo '</pre>';
        //echo $g;
    } else {
        echo "Missing Location";
    }
}
?>
</html>
