<?php

namespace Mohamed\Alg\Graph;

class Graph
{
    private $adjacencyMatrix = [];

    // Add a vertex to the graph
    public function addVertex($vertex)
    {
        if (!array_key_exists($vertex, $this->adjacencyMatrix)) {
            $this->adjacencyMatrix[$vertex] = [];
        }
    }

    // Add an edge between two vertices
    public function addEdge($vertex1, $vertex2)
    {
        $this->addVertex($vertex1);
        $this->addVertex($vertex2);
        $this->adjacencyMatrix[$vertex1][] = $vertex2;
        $this->adjacencyMatrix[$vertex2][] = $vertex1; // For undirected graph
    }

    // Display the graph
    public function display()
    {
        foreach ($this->adjacencyMatrix as $vertex => $edges) {
            echo $vertex . ' -> ' . implode(', ', $edges) . "\n";
        }
    }

    // Perform DFS
    public function dfs($start, &$visited)
    {
        // Mark the current node as visited
        $visited[$start] = true;
        echo $start . " ";

        // Recur for all the vertices adjacent to this vertex
        foreach ($this->adjacencyMatrix[$start] as $neighbor) {
            if (!isset($visited[$neighbor])) {
                $this->dfs($neighbor, $visited);
            }
        }
    }

    // Method to initiate DFS
    public function performDFS($start)
    {
        $visited = [];
        echo "DFS Traversal starting from vertex $start:\n";
        $this->dfs($start, $visited);
        echo "\n";
    }


    // Perform BFS
    public function bfs($start)
    {
        $visited = [];
        $queue = [];

        // Mark the starting vertex as visited and enqueue it
        $visited[$start] = true;
        $queue[] = $start;

        while (!empty($queue)) {
            // Dequeue a vertex and print it
            $current = array_shift($queue);
            echo $current . " ";

            // Get all adjacent vertices of the dequeued vertex
            foreach ($this->adjacencyMatrix[$current] as $neighbor) {
                if (!isset($visited[$neighbor])) {
                    $visited[$neighbor] = true; // Mark as visited
                    $queue[] = $neighbor; // Enqueue
                }
            }
        }
    }

    // Method to initiate BFS
    public function performBFS($start)
    {
        echo "BFS Traversal starting from vertex $start:\n";
        $this->bfs($start);
        echo "\n";
    }
}