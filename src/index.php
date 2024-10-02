<?php

namespace Mohamed\Alg;
use Mohamed\Alg\Graph\Dijkstra;
use Mohamed\Alg\Graph\Graph;
use Mohamed\Alg\Graph\WeightedGraph;
use Mohamed\Alg\LinkedList\LinkedList;
use Mohamed\Alg\Tree\Tree;

require_once __DIR__ . '/../vendor/autoload.php';

//***************************** Linked List *********************************************

$list = new LinkedList();

// Append data to the list
$list->append(10);
$list->append(20);
$list->append(30);

// Display the list
$list->display(); // Output: 10 -> 20 -> 30 -> null

// Delete a node
$list->delete(20);

// Display the list again
$list->display();
//***************************** Linked List *********************************************


//***************************** Tree *********************************************
//$tree = new Tree();
//$tree->insert(10);
//$tree->insert(5);
//$tree->insert(15);
//$tree->insert(3);
//$tree->insert(7);
//
//echo "In-Order Traversal: " . PHP_EOL;
//$tree->inOrderTraversal($tree->root);
//***************************** Tree *********************************************

//***************************** Graph *********************************************
//$graph = new Graph();
//$graph->addEdge('A', 'B');
//$graph->addEdge('A', 'C');
//$graph->addEdge('B', 'D');
//$graph->addEdge('C', 'D');
//
//$graph->performBFS('A');

//echo "Graph representation:\n";
//$graph->display();

//***************************** Graph *********************************************


//***************************** Weighted Graph *********************************************
//$graph = new WeightedGraph();
//$graph->addEdge('A', 'B', 1);
//$graph->addEdge('A', 'C', 0);
//$graph->addEdge('B', 'C', 8);
//$graph->addEdge('B', 'D', 6);
//$graph->addEdge('C', 'D', 1);
//$res = $graph->dijkstra('B');
//foreach ($res as $i => $node) {
//    echo $node . ' ';
//}

// Shortest Path Algorithm
//$dijkstra = new Dijkstra();
//$start = 'A';
//$end = 'D';
//$result =$dijkstra->dijkstra($graph->adjacencyMatrix,$start, $end );
//echo "Shortest path: " . implode(" -> ", $result['path']) . "\n";
//echo "Distance: " . $result['distance'] . "\n";

//***************************** Weighted Graph *********************************************