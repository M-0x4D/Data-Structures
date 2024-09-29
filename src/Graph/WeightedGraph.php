<?php

namespace Mohamed\Alg\Graph;

class WeightedGraph
{
    public $adjacencyMatrix = [];

    // Add a vertex
    public function addVertex($vertex)
    {
        if (!isset($this->adjacencyMatrix[$vertex])) {
            $this->adjacencyMatrix[$vertex] = [];
        }
    }

    // Add an edge with a weight
    public function addEdge($from, $to, $weight)
    {
        $this->addVertex($from);
        $this->addVertex($to);
        $this->adjacencyMatrix[$from][$to] = $weight;
        $this->adjacencyMatrix[$to][$from] = $weight; // For undirected graph
    }

    // Display the graph
    public function display()
    {
        foreach ($this->adjacencyMatrix as $vertex => $edges) {
            echo "$vertex: ";
            foreach ($edges as $adjacent => $weight) {
                echo "($adjacent, $weight) ";
            }
            echo PHP_EOL;
        }
    }

    // Dijkstra's algorithm
    public function dijkstra($start)
    {
        $distances = [];
        $visited = [];
        $priorityQueue = new \SplPriorityQueue();

        foreach (array_keys($this->adjacencyMatrix) as $vertex) {
            $distances[$vertex] = INF;
            $visited[$vertex] = false;
        }

        $distances[$start] = 0;
        $priorityQueue->insert($start, 0);

        while (!$priorityQueue->isEmpty()) {
            $currentVertex = $priorityQueue->extract();

            if ($visited[$currentVertex]) {
                continue;
            }

            $visited[$currentVertex] = true;

            foreach ($this->adjacencyMatrix[$currentVertex] as $neighbor => $weight) {
                if (!isset($distances[$neighbor])) {
                    continue; // Skip undefined neighbors
                }

                $newDistance = $distances[$currentVertex] + $weight;

                if ($newDistance < $distances[$neighbor]) {
                    $distances[$neighbor] = $newDistance;
                    $priorityQueue->insert($neighbor, -$newDistance); // Min-heap, use negative
                }
            }
        }
        return $distances;
    }
}