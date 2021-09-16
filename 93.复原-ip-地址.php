<?php
/*
 * @lc app=leetcode.cn id=93 lang=php
 *
 * [93] 复原 IP 地址
 */

// @lc code=start
class Solution
{

    public $res = [];

    /**
     * 题意不是在查找子串，所以组成的 ip 去掉 . 和传参一致长度应该一致
     * @param String $s
     * @return String[]
     */
    function restoreIpAddresses($s)
    {
        if (strlen($s) < 4) {
            return [];
        }

        $this->find($s, 0, '', 0);
        return $this->res;
    }

    function find($s, $index, $ip, $start)
    {
        if ($index >= 4 && $start === strlen($s)) {
            $this->res[] = $ip;
            return;
        }
        if ($index >= 4) {
            return;
        }
        $tmp = '';
        for ($i = $start; $i < strlen($s); $i++) {
            $tmp .= $s[$i];
            if ($tmp > 255 || $tmp !== (string)intval($tmp)) {
                return;
            }
            $this->find($s, $index + 1, ($ip !== '' ? $ip . '.' : '') . $tmp, $i + 1);
        }
    }
}
// @lc code=end
