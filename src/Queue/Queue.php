<?php

namespace Mohamed\Alg\Queue;

class Queue
{
    private $items = [];

    // Add an item to the back of the queue
    public function enqueue($item)
    {
        $this->items[] = $item;
    }

    // Remove and return the item from the front of the queue
    public function dequeue()
    {
        if ($this->isEmpty()) {
            return null; // or throw an exception
        }
        return array_shift($this->items);
    }

    // Get the item at the front of the queue without removing it
    public function peek()
    {
        if ($this->isEmpty()) {
            return null; // or throw an exception
        }
        return $this->items[0];
    }

    // Check if the queue is empty
    public function isEmpty()
    {
        return empty($this->items);
    }

    // Get the size of the queue
    public function size()
    {
        return count($this->items);
    }
}