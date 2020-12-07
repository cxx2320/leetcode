<?php
/*
 * @lc app=leetcode.cn id=437 lang=php
 *
 * [437] 路径总和 III
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
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer
     */
    function pathSum($root, $sum)
    {
        return $this->dfs($root, $sum, []);
    }

    /**
     * 获取指定节点路径的和等于给定数的路径次数
     * @param TreeNode $node
     * @param Integer $sum
     * @return Integer
     */
    function dfs($node, $sum, $list = [])
    {
        $count = 0;
        if ($node === null) {
            return 0;
        }
        if ($node->val === $sum) {
            $count++;
        }
        for ($i = 0; $i < count($list); $i++) {
            $list[$i] = $list[$i] + $node->val;
            if ($list[$i] === $sum) {
                $count++;
            }
        }
        $list[] = $node->val;
        return $count
            +
            $this->dfs($node->left, $sum, $list)
            +
            $this->dfs($node->right, $sum, $list);
    }
}
// @lc code=end
