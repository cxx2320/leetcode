<?php
/*
 * @lc app=leetcode.cn id=257 lang=php
 *
 * [257] 二叉树的所有路径
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
     * @return String[]
     */
    function binaryTreePaths($root)
    {
        return $this->dfs($root);
    }

    function dfs($root)
    {
        $arr = [];
        if ($root === null) {
            return [];
        }
        if ($root->left === null && $root->right === null) {
            return [$root->val];
        }
        if ($root->left !== null) {
            $res1 = $this->dfs($root->left);
            foreach ($res1 as &$value) {
                $arr[] = $root->val . '->' . $value;
            }
        }
        if ($root->right !== null) {
            $res2 = $this->dfs($root->right);
            foreach ($res2 as $value) {
                $arr[] =  $root->val . '->' . $value;
            }
        }

        return $arr;
    }
}
// @lc code=end
