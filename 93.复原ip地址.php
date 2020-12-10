<?php
/*
 * @lc app=leetcode.cn id=93 lang=php
 *
 * [93] 复原IP地址
 */

// @lc code=start
class Solution
{

    public $res = [];

    public $s_length = 0;
    /**
     * @param String $s
     * @return String[]
     */
    function restoreIpAddresses($s)
    {
        $this->s_length = strlen($s);
        // IP的长度  4 <= ip <= 12
        if ($this->s_length < 4  || $this->s_length > 12) {
            return [];
        }
        $this->find($s, 0, '', 0);
        return $this->res;
    }

    /**
     * 寻找ip
     *
     * @param string $s
     * @param int $index
     * @param string $ip
     * @param int $start 从
     * @return void
     */
    function find($s, $index, $ip, $start)
    {
        if ($index > 3 && $start === $this->s_length) {
            $this->res[] = $ip;
            return;
        }
        if ($index > 3) {
            return;
        }
        $tmp = '';
        for ($i = $start; $i < $this->s_length; $i++) {
            $tmp .= $s[$i];
            // 分别判断 长度大于3，数字大于255，有没有前导0的情况
            if (strlen($tmp) > 3 || intval($tmp) > 255 || $tmp !== (string)intval($tmp)) {
                return;
            }
            $this->find($s, $index + 1, ($ip !== '' ? $ip . '.' : '') . $tmp, $i + 1);
        }
    }
}
// @lc code=end
