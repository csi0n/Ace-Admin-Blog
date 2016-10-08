<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/15
 * Time: 20:10
 */
/**
 * 判断是否为多维数组
 */
if (!function_exists('isDoubleArray')) {
    function isDoubleArray($array)
    {
        if (is_array($array)) {
            foreach ($array as $v) {
                if (is_array($v)) {
                    return true;
                    break;
                }
            }
            return false;
        }
        return false;
    }
}
if (!function_exists('array_order_by')) {
    function array_order_by()
    {
        $args = func_get_args();
        $data = array_shift($args);
        foreach ($args as $n => $field) {
            if (is_string($field)) {
                $tmp = array();
                foreach ($data as $key => $row)
                    $tmp[$key] = $row[$field];
                $args[$n] = $tmp;
            }
        }
        $args[] = &$data;
        call_user_func_array('array_multisort', $args);
        return array_pop($args);
    }
}
if (!function_exists('is_debug')) {
    function is_debug()
    {
        return config('app.debug');
    }
}