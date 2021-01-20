<?php
/*
 * @lc app=leetcode.cn id=116 lang=php
 *
 * [116] 填充每个节点的下一个右侧节点指针
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
     * 迭代解法
     * @param Node $root
     * @return Node
     */
    public function connect($root)
    {
        if ($root === null) {
            return null;
        }
        $queue = new SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $pre = null;
            $size = $queue->count();
            while ($size--) {
                $current_node = $queue->dequeue();
                if ($current_node->left !== null) {
                    $queue->enqueue($current_node->left);
                }
                if ($current_node->right !== null) {
                    $queue->enqueue($current_node->right);
                }
                if ($pre !== null) {
                    $pre->next = $current_node;
                }
                $pre = $current_node;
            }
        }
        return $root;
    }
}
// @lc code=end

/**
 * 递归解法
 */
class Solution1
{
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root)
    {
        if ($root === null) {
            return null;
        }
        $this->two($root->left, $root->right);
        return $root;
    }

    public function two($node1, $node2)
    {
        if ($node1 === null || $node2 === null) {
            return null;
        }
        $node1->next = $node2;
        $this->two($node1->left, $node1->right);
        $this->two($node2->left, $node2->right);
        $this->two($node1->right, $node2->left);
    }
}
