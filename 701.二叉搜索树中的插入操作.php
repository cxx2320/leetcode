<?php
/*
 * @lc app=leetcode.cn id=701 lang=php
 *
 * [701] 二叉搜索树中的插入操作
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
class Solution {

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function insertIntoBST($root, $val) {
        if($root === null) {
            return new TreeNode($val);
        }
        if($root->val > $val){
            $root->left = $this->insertIntoBST($root->left, $val);
        }else{
            $root->right = $this->insertIntoBST($root->right, $val);
        }
        return $root;
    }
}
// @lc code=end

/**
 * 循环
 */
class Solution1 {

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function insertIntoBST($root, $val) {
        if($root === null) {
            return new TreeNode($val);
        }
        $parent = $root;
        $current = $root;

        while($current !== null){
            $parent = $current;
            if($current->val > $val){
                $current = $current->left;
            }else{
                $current = $current->right;
            }
        }
        if($parent->val > $val){
            $parent->left = new TreeNode($val);
        }else{
            $parent->right = new TreeNode($val);
        }
        return $root;
    }
}
