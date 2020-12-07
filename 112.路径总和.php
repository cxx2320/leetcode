<?php
/*
 * @lc app=leetcode.cn id=112 lang=php
 *
 * [112] 路径总和
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
     * @param Integer $sum
     * @return Boolean
     */
    function hasPathSum($root, $sum)
    {
        if ($root === null) {
            return false;
        }
        // 如果当前是叶子节点并且$sum减去叶子节点的值为0则满足条件
        if ($root->left === null && $root->right === null && $sum - $root->val === 0) {
            return true;
        }
        $res1 = $this->hasPathSum($root->left, $sum - $root->val);
        $res2 = $this->hasPathSum($root->right, $sum - $root->val);
        return $res1 || $res2;
    }
}
// @lc code=end
