<?php
/*
 * @lc app=leetcode.cn id=61 lang=php
 *
 * [61] 旋转链表
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
     * @param int $k
     * @return ListNode
     */
    function rotateRight($head, $k)
    {
        if ($head === null || $k === 0) {
            return $head;
        }
        // 先组成一个环形链表
        $start = $head;
        $length = 0;
        while ($head) {
            $length++;
            if ($head->next === null) {
                $head->next = $start;
                $head = $head->next;
                break;
            }
            $head = $head->next;
        }

        // 通过计算的到需要跑多步的到结尾的节点
        $num = $length - ($k % $length);
        $new_end = $head;
        $step = 1;
        while ($new_end) {
            if ($step === $num) {
                break;
            }
            $step++;
            $new_end = $new_end->next;
        }
        // 获取头节点
        $new_head = $new_end->next;
        // 断开尾节点
        $new_end->next = null;
        return $new_head;
    }
}
// @lc code=end
