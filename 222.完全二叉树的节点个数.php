<?php
/*
 * @lc app=leetcode.cn id=222 lang=php
 *
 * [222] 完全二叉树的节点个数
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
    function countNodes($root)
    {
        if ($root === null) {
            return 0;
        }
        $h = $this->cheng_num($root);
        var_dump($h);
    }

    function cheng_num($root)
    {
        if ($root === null) {
            return 0;
        }
        return $this->cheng_num($root->left) + 1;
    }
}
// @lc code=end
