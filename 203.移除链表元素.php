<?php
/*
 * @lc app=leetcode.cn id=203 lang=php
 *
 * [203] 移除链表元素
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
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val)
    {
        if ($head === null) {
            return null;
        }
        $dummy = new ListNode(null);
        $dummy->next = $head;
        // 定义从头节点到pre都是不等于val的节点
        $pre = $dummy;
        while ($head !== null) {
            if ($head->val === $val) {
                $pre->next = $head->next;
                $head = $pre->next;
            } else {
                $pre = $pre->next;
                $head = $head->next;
            }
        }
        return $dummy->next;
    }
}
// @lc code=end

/**
 * 递归
 */
class Solution1
{

    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val)
    {
        if ($head === null) {
            return null;
        }
        if ($head->val === $val) {
            $head = $this->removeElements($head->next, $val);
        } else {
            $head->next = $this->removeElements($head->next, $val);
        }
        return $head;
    }
}
