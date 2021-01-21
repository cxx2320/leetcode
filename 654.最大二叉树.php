<?php
/*
 * @lc app=leetcode.cn id=654 lang=php
 *
 * [654] 最大二叉树
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

    private $nums = [];

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function constructMaximumBinaryTree($nums)
    {
        $this->nums = $nums;
        if (empty($nums)) {
            return null;
        }
        return $this->createTree(0, count($nums) - 1);
    }

    /**
     * 创建一个树
     *
     * @param int $start
     * @param int $end
     * @return TreeNode
     */
    private function createTree($start, $end)
    {
        if ($start > $end) {
            return null;
        }
        $max = $this->findMax($start, $end);
        $root = new TreeNode($this->nums[$max]);
        $root->left = $this->createTree($start, $max - 1);
        $root->right = $this->createTree($max + 1, $end);
        return $root;
    }

    /**
     * 寻找开始和结束之间最大值
     *
     * @param int $start
     * @param int $end
     * @return int
     */
    private function findMax($start, $end)
    {
        $max_index = $start;
        for ($i = $start + 1; $i <= $end; $i++) {
            if ($this->nums[$i] > $this->nums[$max_index]) {
                $max_index = $i;
            }
        }
        return $max_index;
    }
}
// @lc code=end


