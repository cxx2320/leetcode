<?php
/*
 * @lc app=leetcode.cn id=83 lang=php
 *
 * [83] 删除排序链表中的重复元素
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
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head)
    {
        if ($head === null) {
            return $head;
        }
        $dummy = new ListNode(null);
        $dummy->next = $head;
        $pre = $dummy;
        while ($head !== null) {
            if ($pre->val === $head->val) {
                $pre->next = $head->next;
            } else {
                $pre = $pre->next;
            }
            $head = $head->next;
        }
        return $dummy->next;
    }
}
// @lc code=end
