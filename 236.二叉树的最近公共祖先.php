<?php
/*
 * @lc app=leetcode.cn id=236 lang=php
 *
 * [236] 二叉树的最近公共祖先
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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q)
    {
        if ($root === null) {
            return null;
        }
        if ($root->val === $p->val || $root->val === $q->val) {
            return $root;
        }
        $res1 = $this->lowestCommonAncestor($root->left, $p, $q);
        $res2 = $this->lowestCommonAncestor($root->right, $p, $q);
        if ($res1 && $res2) {
            return $root;
        }
        return $res1 ? $res1 : $res2;
    }
}
// @lc code=end
