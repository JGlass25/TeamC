<?php
/**
 * @file Barb.php
 * @author John Glasser
 * @date 20 Nov 2021
 * @brief File Creating demo of Dijkstra's Alogorithm
 *
 * Implements simple test graph to demo disjkstra for shortest path finding
 */

include_once "Vertex.php";
/*
$adjacencyMat = [
    [0,6,0,1,0],
    [6,0,5,2,2],
    [0,5,0,0,5],
    [1,2,0,0,1],
    [0,2,5,1,0]
];
*/
//Test graph declaration
//-----------------------------
$g = new graph();

$A = new Vertex('A');
$B = new Vertex('B');
$C = new Vertex('C');
$D = new Vertex('D');
$E = new Vertex('E');

$A->addEdge($B, 6);
$A->addEdge($D, 1);

$B->addEdge($A, 6);
$B->addEdge($C, 5);
$B->addEdge($D, 2);
$B->addEdge($E, 2);

$C->addEdge($B, 5);
$C->addEdge($E, 5);

$D->addEdge($A, 1);
$D->addEdge($B, 2);
$D->addEdge($E, 1);

$E->addEdge($B, 2);
$E->addEdge($C, 5);
$E->addEdge($D, 1);

$g->addNode($A);
$g->addNode($B);
$g->addNode($C);
$g->addNode($D);
$g->addNode($E);

$nodes = array("A"=>$A, "B"=>$B, "C"=>$C, "D"=>$D, "E"=>$E);
//echo $g;
//-----------------------------
/*
$start = $A;
$end = $C;
$g->runDijkstra($start);

$path = $g->getPath($start, $end);

foreach ($path as $x) {
    $pathNames[] = $x->name;
}
echo 'Path from ' . $start->name . " to " . $end->name . "<br>";
echo 'distance = ' . $end->distanceFromStart;
echo '<pre>'; print_r($pathNames); echo '</pre>';

echo $g;
*/
?>

<html>
<h2>Basic Dijkstra Pathfinding Example</h2>
<img src="examplegraph.png" alt="Graph" width="500">
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
