<?php
/*
 * @lc app=leetcode.cn id=111 lang=php
 *
 * [111] 二叉树的最小深度
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root)
    {
        if ($root === null) {
            return 0;
        }

        // 使用队列进行层次遍历，遇到的第一个叶子节点就是最短路径
        $queue = new SplQueue();
        $queue->enqueue([$root, 1]);
        while (!$queue->isEmpty()) {
            [$node, $level] = $queue->dequeue();
            if ($node->left !== null) {
                $queue->enqueue([$node->left, $level + 1]);
            }
            if ($node->right !== null) {
                $queue->enqueue([$node->right, $level + 1]);
            }
            if ($node->left === null && $node->right === null) {
                return $level;
            }
        }
    }
}
// @lc code=end
