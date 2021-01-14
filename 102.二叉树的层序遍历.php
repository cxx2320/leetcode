<?php
/*
 * @lc app=leetcode.cn id=102 lang=php
 *
 * [102] 二叉树的层序遍历
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{

    private $res = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        if ($root === null) {
            return $this->res;
        }
        $this->dfs($root, 0);
        return $this->res;
    }

    /**
     * dfs实现
     *
     * @param TreeNode $node
     * @param int $level
     * @return void
     */
    private function dfs($node, $level)
    {
        if($node === null) {
            return;
        }
        $this->res[$level][] = $node->val;
        $this->dfs($node->left, $level + 1);
        $this->dfs($node->right, $level + 1);
    }
}
// @lc code=end

/**
 * 队列实现
 */
class Solution1
{

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        $res = [];
        if ($root === null) {
            return $res;
        }
        $queue = new SplQueue();
        $queue->enqueue([$root, 0]);
        while (!$queue->isEmpty()) {
            [$node, $level] = $queue->dequeue();
            $res[$level][] = $node->val;
            if ($node->left) {
                $queue->enqueue([$node->left, $level - 1]);
            }
            if ($node->right) {
                $queue->enqueue([$node->right, $level - 1]);
            }
        }
        return $res;
    }
}
