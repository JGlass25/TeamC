<?php
class Vertex {
    public $name;
    public $adjacencyList = array();
    public $distanceFromStart;
    public $previousVertex;

    public function __construct($name) {
        $this->name = $name;
        $this->distanceFromStart = PHP_INT_MAX;
        $previousVertex = null;
    }

    public function addEdge($v, $weight) {
        $this->adjacencyList[$v->name] = $weight;
    }

    public function getName() {
        return $this->name;
    }

    public function __toString() {
        $s = $this->name . ': ' . $this->distanceFromStart;
        if ($this->previousVertex != null) {
            $s .= '->' . $this->previousVertex->name;
        }
        $s .= '{<br>';
        foreach($this->adjacencyList as $x => $x_value) {
            $s .= "[" . $x . "] => " . $x_value;
            $s .= "<br>";
        }
        $s .= "} <br>";
        return $s;
    }

}

class Graph {
    public $list = array();
    public $size;

    public function __construct() {
        $this->size = 0;
    }

    public function addNode($v) {
        $this->list[$v->name] = $v;
        $this->size++;
    }

    public function __toString() {
        $s = '';
        foreach($this->list as $x) {
            $s .= $x;
            $s .= "<br>";
        }
        return $s;
    }

    public function getPath($v, $w) {
        $path = array();
        $path[] = $w;
        $currentNode = $w;
        while ($currentNode != $v) {
            $path[] = $currentNode->previousVertex;
            $currentNode = $currentNode->previousVertex;
        }
        return array_reverse($path);
    }

    public function runDijkstra($s){
        $visited = array();
        $unvisited = $this->list;

        $start = $s;
        $start->distanceFromStart = 0;

        $currentVertex;
        $childVertex;
        while (sizeof($unvisited) != 0) {

            //set current Vertex
            $bestValue = PHP_INT_MAX;
            $currentVertex;
            foreach ($unvisited as $x => $x_value){
                if ($x_value->distanceFromStart < $bestValue) {
                    $bestValue = $x_value->distanceFromStart;
                    $currentVertex = $x_value;
                }
            }
            unset($unvisited[$currentVertex->name]);

            //check adjacent nodes
            foreach($currentVertex->adjacencyList as $x => $x_value) {
                //echo $x;
                //is vertex unvisited?
                if (array_key_exists($x, $unvisited)) {
                    $childVertex = $this->list[$x];
                    //is new path distance shorter?
                    if ($currentVertex->distanceFromStart + $x_value < $childVertex->distanceFromStart) {
                        $childVertex->distanceFromStart = $currentVertex->distanceFromStart + $x_value;
                        $childVertex->previousVertex = $currentVertex;
                    }
                }
            }
            //add currentVertex to visited
            $visited[$currentVertex->name] = $currentVertex;
        }
    }
}

?>
