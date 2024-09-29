<?php

namespace Mohamed\Alg\Graph;

class Dijkstra
{
    function dijkstra($graph, $start, $end)
    {
        // Check if start and end vertices exist in the graph
        if (!isset($graph[$start]) || !isset($graph[$end])) {
            return ['path' => [], 'distance' => INF, 'error' => 'Start or end vertex not found in the graph.'];
        }

        $distances = [];
        $previous = [];
        $queue = [];

        // Initialize distances and previous vertices
        foreach ($graph as $vertex => $edges) {
            $distances[$vertex] = INF; // Start with infinity distance
            $previous[$vertex] = null; // No previous vertex
            $queue[$vertex] = $vertex; // Add vertex to the queue
        }

        $distances[$start] = 0; // Distance from start to itself is 0

        while (!empty($queue)) {
            // Get the vertex with the smallest distance
            $minVertex = array_reduce(array_keys($queue), function ($a, $b) use ($distances, $queue) {
                return $distances[$a] < $distances[$b] ? $a : $b;
            });

            // If the smallest distance is infinity, the remaining vertices are unreachable
            if ($distances[$minVertex] === INF) {
                break;
            }

            // Remove the vertex from the queue
            unset($queue[$minVertex]);

            // Update distances for neighboring vertices
            foreach ($graph[$minVertex] as $neighbor => $weight) {
                $alt = $distances[$minVertex] + $weight;
                if ($alt < $distances[$neighbor]) {
                    $distances[$neighbor] = $alt;
                    $previous[$neighbor] = $minVertex;
                }
            }
        }

        // Build the shortest path
        $path = [];
        for ($at = $end; $at !== null; $at = $previous[$at]) {
            $path[] = $at;
        }
        $path = array_reverse($path);

        // If the end vertex is not reachable, return an empty path
        if ($distances[$end] === INF) {
            return ['path' => [], 'distance' => INF, 'error' => 'No path found.'];
        }

        return [
            'path' => $path,
            'distance' => $distances[$end],
            'error' => null
        ];
    }
}