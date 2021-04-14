<?php
/*
 * @lc app=leetcode.cn id=160 lang=php
 *
 * [160] 相交链表
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
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB)
    {
        $ans = null;
        if ($headA === null || $headB === null) {
            return null;
        }
        $newA = $headA;
        $newB = $headB;
        // 获取两个链表长度
        $a_len = 0;
        $b_len = 0;
        while ($newA !== null || $newB !== null) {
            if ($newA !== null) {
                $a_len++;
                $newA = $newA->next;
            }
            if ($newB !== null) {
                $b_len++;
                $newB = $newB->next;
            }
        }
        $long = $a_len > $b_len ? $headA : $headB;
        $short = $a_len > $b_len ? $headB : $headA;
        $step = 0;
        $diff = abs($a_len - $b_len);
        // 计算相差，长的先跑 $diff 步
        while ($long !== null || $short !== null) {
            if ($step < $diff) {
                $long = $long->next;
                $step++;
                continue;
            }
            if ($long === $short) {
                $ans = $long;
                break;
            } else {
                $long = $long->next;
                $short = $short->next;
            }
        }
        return $ans;
    }
}
// @lc code=end

/**
 * 借用了两个栈来操作
 */
class Solution1
{
    /**
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB)
    {
        if ($headA === null || $headB === null) {
            return null;
        }
        $headAStack = new SplStack();
        $headBStack = new SplStack();
        while ($headA !== null || $headB !== null) {
            if ($headA !== null) {
                $headAStack->push($headA);
                $headA = $headA->next;
            }
            if ($headB !== null) {
                $headBStack->push($headB);
                $headB = $headB->next;
            }
        }
        $ans = null;
        while (!$headAStack->isEmpty() && !$headBStack->isEmpty()) {
            $a = $headAStack->pop();
            $b = $headBStack->pop();
            if ($a === $b) {
                $ans = $a;
            } else {
                break;
            }
        }
        return $ans;
    }
}
