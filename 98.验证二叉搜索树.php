<?php
/*
 * @lc app=leetcode.cn id=98 lang=php
 *
 * [98] 验证二叉搜索树
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
     * @return Boolean
     */
    function isValidBST($root)
    {
        $stack = new SplStack();
        $min = null;
        while (!$stack->isEmpty() || $root !== null) {
            while ($root !== null) {
                $stack->push($root);
                $root = $root->left;
            }
            $root = $stack->pop();
            if($min !== null && $root->val <= $min){
                return false;
            }
            $min = $root->val;
            $root = $root->right;
        }
        return true;
    }
}
// @lc code=end
