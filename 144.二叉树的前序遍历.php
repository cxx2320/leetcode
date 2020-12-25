<?php
/*
 * @lc app=leetcode.cn id=144 lang=php
 *
 * [144] 二叉树的前序遍历
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
     * @return Integer[]
     */
    function preorderTraversal($root)
    {
        $ans = [];
        if ($root === null) {
            return $ans;
        }
        $stack = new SplStack();
        $stack->push($root);
        while (!$stack->isEmpty()){
            $node = $stack->pop();
            $ans[] = $node->val;
            if($node->right !== null){
                $stack->push($node->right);
            }
            // 根据栈的定义，先进后出，下次循环会先处理left
            if($node->left !== null){
                $stack->push($node->left);
            }
        }
        return $ans;
    }
}
// @lc code=end

// 递归实现
// class Solution
// {

//     private $res = [];

//     /**
//      * @param TreeNode $root
//      * @return Integer[]
//      */
//     function preorderTraversal($root)
//     {
//         if ($root === null) {
//             return [];
//         }
//         $this->res[] = $root->val;
//         $this->preorderTraversal($root->left);
//         $this->preorderTraversal($root->right);
//         return $this->res;
//     }
// }