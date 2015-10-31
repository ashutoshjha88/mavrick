<?php
/**
 * Created by PhpStorm.
 * User: macrosys
 * Date: 8/16/2015
 * Time: 8:58 PM
 */

/**
 * Returns default string 'active' if route is active.
 *
 * @param $route
 * @param string $str
 * @return string
 */
function set_active($route, $str = 'active') {

    return call_user_func_array('route::is', (array)$route) ? $str : '';

}

function recursive_array_extend(&$base_array, &$default_array)
{
    foreach ($default_array as $key => $item) {
        if (!isset($base_array[$key])) {
            $base_array[$key] = $default_array[$key];
        }
        if (is_array($item)) {
            recursive_array_extend($base_array[$key], $item);
        }
    }
}



