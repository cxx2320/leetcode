<?php
/*
 * @lc app=leetcode.cn id=129 lang=php
 *
 * [129] 求根到叶子节点数字之和
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

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumNumbers($root)
    {
        return $this->dfs($root, 0);
    }
    
    function dfs($root, $num)
    {
        if ($root === null) {
            return 0;
        }
        $num = ($num * 10) + $root->val;
        if ($root->left === null && $root->right === null) {
            return $num;
        }
        return $this->dfs($root->left, $num) + $this->dfs($root->right, $num);
    }
}
// @lc code=end
