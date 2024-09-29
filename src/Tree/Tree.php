<?php

namespace Mohamed\Alg\Tree;

class Tree
{
    protected $node;
    public $root = null;


    function insert($data)
    {
        $newNode = new Node($data);

        if ($this->root == null) {
            $this->root = $newNode;
        } else {
            $this->insertRecursively($this->root, $newNode);
        }

    }

    private function insertRecursively($current, $newNode)
    {
        if ($newNode->data < $current->data) {
            if ($current->left === null) {
                $current->left = $newNode;
            } else {
                $this->insertRecursively($current->left, $newNode);
            }
        } else {
            if ($current->right === null) {
                $current->right = $newNode;
            } else {
                $this->insertRecursively($current->right, $newNode);
            }
        }
    }

    public function inOrderTraversal($node) {
        if ($node !== null) {
            $this->inOrderTraversal($node->left);
            echo $node->data . ' ' . PHP_EOL;
            $this->inOrderTraversal($node->right);
        }
    }
}