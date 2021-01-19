<?php
/*
 * @lc app=leetcode.cn id=82 lang=php
 *
 * [82] 删除排序链表中的重复元素 II
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
        $map = [];
        $dummy = new ListNode(null);
        $dummy->next = $head;
        while ($head !== null) {
            $map[$head->val]++;
            $head = $head->next;
        }
        $head = $dummy;
        while ($head->next !== null) {
            if ($map[$head->next->val] > 1) {
                // 一直下一位到不重复的元素
                while($map[$head->next->val] > 1){
                    $head->next = $head->next->next ?? null;
                }
            }
            $head = $head->next;
        }
        return $dummy->next;
    }
}
// @lc code=end
