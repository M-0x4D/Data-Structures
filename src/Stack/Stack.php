<?php

namespace Mohamed\Alg\Stack;

class Stack
{
    private $items = [];

    // Push an item onto the stack
    public function push($item)
    {
        $this->items[] = $item;
    }

    // Pop an item from the stack
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new \Exception("Stack is empty");
        }
        return array_pop($this->items);
    }

    // Peek at the top item of the stack without removing it
    public function peek()
    {
        if ($this->isEmpty()) {
            throw new \Exception("Stack is empty");
        }
        return end($this->items);
    }

    // Check if the stack is empty
    public function isEmpty()
    {
        return empty($this->items);
    }

    // Get the size of the stack
    public function size()
    {
        return count($this->items);
    }
}