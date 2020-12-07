<?php
/*
 * @lc app=leetcode.cn id=21 lang=php
 *
 * [21] 合并两个有序链表
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        if ($l1 === null) {
            return $l2;
        }
        if ($l2 === null) {
            return $l1;
        }
        $root = new ListNode(0);
        $tmp = $root;
        while ($l1 !== null && $l2 !== null) {
            if($l1->val <= $l2->val){
                $tmp->next = $l1;
                $l1 = $l1->next;
            }else{
                $tmp->next = $l2;
                $l2 = $l2->next;
            }
            $tmp = $tmp->next;
        }

        if ($l1 !== null) {
            $tmp->next = $l1;
        } elseif ($l2 !== null) {
            $tmp->next = $l2;
        }

        return $root->next;
    }
}
// @lc code=end
