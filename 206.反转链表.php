<?php
/*
 * @lc app=leetcode.cn id=206 lang=php
 *
 * [206] 反转链表
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
     * 递归实现
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head)
    {
        return $this->reverse($head, null);
    }

    function reverse($node, $pre)
    {
        if ($node === null) {
            return $pre;
        }
        // 保存下一个节点
        $next_node = $node->next;
        // next指向上一个节点
        $node->next = $pre;

        return $this->reverse($next_node, $node);
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
     * @return ListNode
     */
    function reverseList($head)
    {
        $p = null;
        while ($head !== null) {
            // 存储当前节点
            $current_node = $head;
            // 节点向下移动
            $head = $head->next;
            // 当前节点下一位指向p
            $current_node->next = $p;
            // 更新p为当前节点
            $p = $current_node;
        }
        return $p;
    }
}
