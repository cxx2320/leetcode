<?php
/*
 * @lc app=leetcode.cn id=92 lang=php
 *
 * [92] 反转链表 II
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
     * @param int $m
     * @param int $n
     * @return ListNode
     */
    function reverseBetween($head, $m, $n)
    {
        if ($head === null) {
            return null;
        }
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $head = $dummy;
        $length = 0;
        // m位置的前一个指针
        $start = null;
        // 反转后的m到n的一段指针
        $tmp = null;
        // m位置的指针
        $end = null;
        while ($head !== null) {
            $next_node = $head->next;
            if ($length === ($m - 1)) {
                $start = $head;
            }
            if ($length === $m) {
                $end = $head;
            }
            if ($length >= $m && $length <= $n) {
                $head->next = $tmp;
                $tmp = $head;
            }
            if ($length === $n + 1) {
                $end->next = $head;
            }
            $head = $next_node;
            $length++;
        }
        $start->next = $tmp;
        return $dummy->next;
    }
}
// @lc code=end