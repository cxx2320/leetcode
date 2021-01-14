<?php
/*
 * @lc app=leetcode.cn id=103 lang=php
 *
 * [103] 二叉树的锯齿形层序遍历
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
     * @return Integer[][]
     */
    function zigzagLevelOrder($root)
    {
        $res = [];
        if ($root === null) {
            return $res;
        }
        $queue = new SplQueue();
        $queue->enqueue($root);
        $lor = true;
        while (!$queue->isEmpty()) {
            // 每层每层的操作
            $size = $queue->count();
            // 这里一定要初始化一个size长度的数组，具体值无所谓，因为下面会被替换掉
            $arr = range(1, $size);
            for ($i = 0; $i < $size; $i++) {
                $node = $queue->dequeue();
                $index = $lor ? $i : $size - $i - 1;
                // 否则顺序不是按照index进行排序的
                $arr[$index] = $node->val;
                if ($node->left !== null) {
                    $queue->enqueue($node->left);
                }
                if ($node->right !== null) {
                    $queue->enqueue($node->right);
                }
            }
            $lor = !$lor;
            $res[] = $arr;
        }
        return $res;
    }
}
// @lc code=end

/**
 * dfs实现
 */
class Solution1
{

    private $res = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function zigzagLevelOrder($root)
    {
        if ($root === null) {
            return $this->res;
        }
        $this->dfs($root, 0);
        return $this->res;
    }

    private function dfs($node, $level)
    {
        if ($node === null) {
            return;
        }
        if (!isset($this->res[$level])) {
            $this->res[$level] = [];
        }
        // 根据等级计算从头部还是尾部插入
        if ($level % 2 === 1) {
            array_unshift($this->res[$level], $node->val);
        } else {
            array_push($this->res[$level], $node->val);
        }
        $this->dfs($node->left, $level + 1);
        $this->dfs($node->right, $level + 1);
    }
}
