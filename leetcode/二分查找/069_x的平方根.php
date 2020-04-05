<?php

// 实现 int sqrt(int x) 函数。
//
//计算并返回 x 的平方根，其中 x 是非负整数。
//
//由于返回类型是整数，结果只保留整数的部分，小数部分将被舍去。
//
//示例 1:
//
//输入: 4
//输出: 2
//示例 2:
//
//输入: 8
//输出: 2
//说明: 8 的平方根是 2.82842...,
//     由于返回类型是整数，小数部分将被舍去。
//
//来源：力扣（LeetCode）
//链接：https://leetcode-cn.com/problems/sqrtx
//著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

// 思路
// 1. 使用二分法查找平方根,

class Solution
{

    /**
     * 牛顿迭代求解
     * 时间复杂度 O(logN),
     * 空间复杂度 O(1)
     * @param $x
     * @return int
     */
    function mySqrt1($x)
    {
        if ($x < 2) {
            return $x;
        }
        $x0 = $x;
        $x1 = ($x0 + $x / $x0) / 2;
        while (abs($x0 - $x1) >= 1) {
            $x0 = $x1;
            $x1 = ($x0 + $x / $x0) / 2;
        }
        return (int)$x1;
    }

    /**
     * 二分法求解
     * 时间复杂度 O(logn)
     * 空间复杂度 O(1)
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x)
    {
        if ($x < 2) {
            return $x;
        }
        $left = 1;
        $right = $x - 1;
        while ($left < $right - 1) {
            $center = (int)(($right - $left) / 2) + $left;
            $square = $center ** 2;
            if ($square === $x) {
                return $center;
            } elseif ($square > $x) {
                $right = $center;
            } else {
                $left = $center;
            }
        }
        return $left;
    }
}

$s = new Solution();


var_dump($s->mySqrt(0)); // 0
var_dump($s->mySqrt(1)); // 1
var_dump($s->mySqrt(4)); // 2
var_dump($s->mySqrt(8)); // 2
var_dump($s->mySqrt(16)); // 4
var_dump($s->mySqrt(17)); // 4
var_dump($s->mySqrt(24)); // 4
var_dump($s->mySqrt(25)); // 5