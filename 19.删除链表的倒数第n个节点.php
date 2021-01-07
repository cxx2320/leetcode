<?php
/*
 * @lc app=leetcode.cn id=19 lang=php
 *
 * [19] 删除链表的倒数第N个节点
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
     * 递归实现
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        // 使用dummy利于操作
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $this->delNextNode($dummy, $n + 1);
        return $dummy->next;
    }

    /**
     * 删除下一个节点   
     *
     * @param ListNode $node
     * @param int $last_rank
     * @return int
     */
    function delNextNode($node, $last_rank)
    {
        if ($node === null) {
            return 1;
        }
        /** @var int $rank 当前节点是倒是第几个节点 */
        $rank = $this->delNextNode($node->next, $last_rank);
        if ($rank === $last_rank) {
            $node->next = $node->next->next ?? null;
        }
        return $rank + 1;
    }
}
// @lc code=end

/**
 * 迭代实现
 */
class Solution1
{

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        // 快慢指针 $fast比$slow多走一个节点
        $fast = $head; // 要删除的节点
        $slow = new ListNode(0); // 慢指针也代表了删除节点的前一个节点

        $dummy = new ListNode(0);
        $dummy->next = $head;
        $length = 0;
        while ($head !== null) {
            $length++;
            if ($n < $length) {
                $slow->next = $fast;
                $slow = $slow->next;
                $fast = $fast->next;
            }
            $head = $head->next;
        }
        if ($length === $n) { // 这里如果相等就等于删除第一个节点
            return $dummy->next->next;
        }
        $slow->next = $slow->next->next ?? null;
        return $dummy->next;
    }
}
