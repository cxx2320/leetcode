<?php
/*
 * @lc app=leetcode.cn id=117 lang=php
 *
 * [117] 填充每个节点的下一个右侧节点指针 II
 */

// @lc code=start
/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Solution
{
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root)
    {
        $queue = new SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            $node = $queue->dequeue();
            if ($node->left !== null) {
                $queue->enqueue($node->left);
            }
            if ($node->right !== null) {
                $queue->enqueue($node->right);
            }
            for ($i = 1; $i < $size; $i++) {
                $tmp_node = $queue->dequeue();
                [$node->next, $node] = [$tmp_node, $tmp_node];
                if ($node->left !== null) {
                    $queue->enqueue($node->left);
                }
                if ($node->right !== null) {
                    $queue->enqueue($node->right);
                }
            }
        }
        return $root;
    }
}
// @lc code=end
