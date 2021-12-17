<?php
/**
 * @file Vertex.php
 * @author John Glasser
 * @date 20 Nov 2021
 * @brief File Implementing Dijkstra's Algorithm
 *
 * Vertex Class used in conjunction with Graph class to implement Dijkstra's alogithm
 */

/**
 * Vertex class to act as nodes within a graph.
 */
class Vertex {
    public $name;                       ///< name of Vertex
    public $adjacencyList = array();    ///< list of edges
    public $distanceFromStart;          ///< integer distance from start used by runDijkstra
    public $previousVertex;             ///< previous vertex in shortest path

    //! Vertex constructor.
    /*!
      Takes a name of vertex and sets distance to start to max
    */
    public function __construct($name) {
        $this->name = $name;
        $this->distanceFromStart = PHP_INT_MAX;
        $previousVertex = null;
    }

    /*!
      Function to add and edge
      \param v the vertex being connected to.
      \param weight the distance to vector.
    */
    public function addEdge($v, $weight) {
        $this->adjacencyList[$v->name] = $weight;
    }

    /*!
      Getter for name
      /return name
    */
    public function getName() {
        return $this->name;
    }

    /*!
      Overrides toString
      Prints name of vertex, distance to start, previous vertex in shortest path, and all edges
    */
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

/**
 * Graph class containing Vetexs to explore using Dijkstra.
 */
class Graph {
    public $list = array();     ///< list of vertexes in graph
    public $size;               ///< integer number of vertexes in graph

    //! Constructor.
    /*!
      Creates empyt graph of size 0
    */
    public function __construct() {
        $this->size = 0;
    }

    /*!
      Function to add node to graph
      \param v the vertex being added.
    */
    public function addNode($v) {
        $this->list[$v->name] = $v;
        $this->size++;
    }

    /*!
      Overrides toString
      Prints each vertex in graph
    */
    public function __toString() {
        $s = '';
        foreach($this->list as $x) {
            $s .= $x;
            $s .= "<br>";
        }
        return $s;
    }

    /*!
      Function to get path from v to w after Dijkstra has been run for graph using previous vertex
      Typically used after runDijkstra() has been run for v
      \param v the start vertex.
      \param w the ending vertex.
      \return array of path from v to w
    */
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

    /*!
      Function to fill out information for each vertex in graph finding shortest path, and previous vertex
      \param s the vertex at start of graph.
    */
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
