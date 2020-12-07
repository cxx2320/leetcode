<?php
/*
 * @lc app=leetcode.cn id=617 lang=php
 *
 * [617] 合并二叉树
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
class Solution {

    /**
     * @param TreeNode $t1
     * @param TreeNode $t2
     * @return TreeNode
     */
    function mergeTrees($t1, $t2) {
    }

    function preTraverse(TreeNode $node) {
        if(!$node) {
            return;
        }
        $this->preTraverse($node->left);
        $this->preTraverse($node->right);
    }
}
// @lc code=end

