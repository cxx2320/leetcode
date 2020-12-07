<?php
/*
 * @lc app=leetcode.cn id=100 lang=php
 *
 * [100] 相同的树
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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q)
    {
        if ($p === null && $q === null) {
            return true;
        }

        return $this->isSameTree($p->left, $q->left)
            &&
            $this->isSameTree($p->right, $q->right)
            &&
            $p->val === $q->val;
    }
}
// @lc code=end
