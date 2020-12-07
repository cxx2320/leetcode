<?php

/*
 * @lc app=leetcode.cn id=24 lang=php
 *
 * [24] 两两交换链表中的节点
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
    function swapPairs($head)
    {
        $root = new ListNode(0);
        $root->next = $head;
        $current = $root;
        while ($current->next !== null && $current->next->next !== null) {
            $node1 = $current->next;
            $node2 = $current->next->next;
            $current->next = $node2;
            $node1->next = $node2->next;
            $node2->next = $node1;
            $current = $current->next->next;
        }
        return $root->next;
    }
}
// @lc code=end
