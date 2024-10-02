<?php

namespace Mohamed\Alg\LinkedList;

class LinkedList
{
    private $head;

    public function __construct()
    {
        $this->head = null;
    }

    // Add a node at the end of the list
    public function append($data)
    {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $newNode;
            return;
        }

        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }
        $current->next = $newNode;
    }

    // Display the list
    public function display()
    {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "null" . PHP_EOL;
    }

    // Delete a node by value
    public function delete($data)
    {
        if ($this->head === null) {
            return;
        }

        // If the head needs to be removed
        if ($this->head->data === $data) {
            $this->head = $this->head->next;
            return;
        }

        $current = $this->head;
        while ($current->next !== null) {
            if ($current->next->data === $data) {
                $current->next = $current->next->next;
                return;
            }
            $current = $current->next;
        }
    }
}