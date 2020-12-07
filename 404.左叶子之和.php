<?php
/*
 * @lc app=leetcode.cn id=404 lang=php
 *
 * [404] 左叶子之和
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

    public $res = 0;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumOfLeftLeaves($root)
    {
        $this->ssss($root, false);
        return $this->res;
    }

    function ssss($root, $is_left)
    {
        if ($root === null) {
            return 0;
        }
        if ($root->left === null && $root->right === null && $is_left) {
            $this->res += $root->val;
        }
        $this->ssss($root->left, true);
        $this->ssss($root->right, false);
    }
}
// @lc code=end
