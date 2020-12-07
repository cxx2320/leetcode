<?php
/*
 * @lc app=leetcode.cn id=104 lang=php
 *
 * [104] 二叉树的最大深度
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

    public $count = 0;
    public $max_res = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root)
    {
        if ($root === null) {
            return 0;
        }
        return max($this->maxDepth($root->left), $this->maxDepth($root->right)) + 1;
    }
}
// @lc code=end
