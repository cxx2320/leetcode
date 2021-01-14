<?php
/*
 * @lc app=leetcode.cn id=199 lang=php
 *
 * [199] 二叉树的右视图
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
     * @return Integer[]
     */
    function rightSideView($root)
    {
        $this->dfs($root, 0);
        return $this->res;
    }

    private function dfs($node, $level)
    {
        if ($node === null) {
            return;
        }

        //覆盖之前的数，最终每层都会落在最右边
        $this->res[$level] = $node->val;
        $this->dfs($node->left, $level + 1);
        $this->dfs($node->right, $level + 1);
    }
}
// @lc code=end

/**
 * 队列
 */
class Solution1
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function rightSideView($root)
    {
        $res = [];
        if ($root === null) {
            return $res;
        }
        $queue = new SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            // $res[] = $queue->top()->val;
            for ($i = 0; $i < $size; $i++) {
                $node = $queue->dequeue();
                if ($i === $size - 1) {
                    $res[] = $node->val;
                }
                if ($node->left !== null) {
                    $queue->enqueue($node->left);
                }
                if ($node->right !== null) {
                    $queue->enqueue($node->right);
                }
            }
        }
        return $res;
    }
}
