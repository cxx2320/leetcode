<?php
/*
 * @lc app=leetcode.cn id=230 lang=php
 *
 * [230] 二叉搜索树中第K小的元素
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
    private $res = null;

    private $level = null;
    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($root, $k)
    {
        $this->dfs($root, $k);
        return $this->res;
    }

    function dfs($node, $k)
    {
        if ($node === null) {
            return null;
        }
        $this->dfs($node->left, $k);
        $this->level++;
        if ($this->level === $k) {
            $this->res = $node->val;
            return;
        }
        $this->dfs($node->right, $k);
    }
}
// @lc code=end
