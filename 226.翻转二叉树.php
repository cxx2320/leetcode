<?php
/*
 * @lc app=leetcode.cn id=226 lang=php
 *
 * [226] 翻转二叉树
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
     * @return TreeNode
     */
    function invertTree($root)
    {
        if ($root === null) {
            return null;
        }
        // 前序遍历解法
        // [$root->left, $root->right] = [$root->right, $root->left];
        $this->invertTree($root->left);
        $this->invertTree($root->right);
        // 后序遍历写法
        // [$root->left, $root->right] = [$root->right, $root->left];
        return $root;
    }
}
// @lc code=end
