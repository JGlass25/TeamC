<html>
<img src="examplegraph.png" alt="Graph" width="500">
<br>
</html>
<?php
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

//echo $g;
//-----------------------------
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
?>
