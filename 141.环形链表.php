<?php
/*
 * @lc app=leetcode.cn id=141 lang=php
 *
 * [141] 环形链表
 */

// @lc code=start
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */

class Solution
{
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head)
    {
        // 使用快慢指针
        $fast = $slow = $head;
        while ($fast->next !== null && $fast->next->next != null) {
            // 这里两个指针一开始是使用$head进行赋值的，导致永远无法进行重合
            // 应该各走各的，如果是环形链表一定回相遇
            $fast = $fast->next->next;
            $slow = $slow->next;
            if ($fast === $slow) {
                return true;
            }
        }
        return false;
    }
}
// @lc code=end
