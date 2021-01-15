<?php
/*
 * @lc app=leetcode.cn id=107 lang=php
 *
 * [107] 二叉树的层序遍历 II
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

    private $result = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrderBottom($root)
    {
        if ($root === null) {
            return $this->result;
        }
        $stack = new SplStack();
        $queue = new SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $size = $queue->count();
            $tmp = [];
            while ($size--) {
                $node = $queue->dequeue();
                $tmp[] = $node->val;
                if($node->left !== null){
                    $queue->enqueue($node->left);
                }
                if($node->right !== null){
                    $queue->enqueue($node->right);
                }
            }
            $stack->push($tmp);
        }
        while (!$stack->isEmpty()){
            $this->result[] = $stack->pop();
        }
        return $this->result;
    }
}
// @lc code=end
