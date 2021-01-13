<?php
/*
 * @lc app=leetcode.cn id=23 lang=php
 *
 * [23] 合并K个升序链表
 */

// @lc code=start

class MySplMinHeap extends SplMinHeap
{
    /**
     * 自定义排序
     *
     * @param ListNode $value1
     * @param ListNode $value2
     * @return int
     */
    protected function compare($value1, $value2)
    {
        return $value2->val - $value1->val;
    }
}

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
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists)
    {
        $heap = new MySplMinHeap();
        $length = count($lists);
        // 循环把链表放入堆中
        for ($i = 0; $i < $length; $i++) {
            $node = $lists[$i];
            while ($node !== null) {
                // 保存下一个链表数据
                $next_node = $node->next;
                // 放入前，清除下一个链表
                $node->next = null;
                $heap->insert($node);
                $node = $next_node;
            }
        }
        
        $dummy = new ListNode(0);
        $headNode = $dummy;
        while(!$heap->isEmpty()){
            $headNode->next = $heap->extract();
            $headNode = $headNode->next;
        }
        return $dummy->next;
    }
}
// @lc code=end
