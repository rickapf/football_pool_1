<?php

/**
 * Created by PhpStorm.
 * User: pfitzgerald
 * Date: 7/6/18
 * Time: 5:58 PM
 */

/**
 * @param $path
 *
 * @return string
 */
function setActiveNavTab($path)
{
    return Request::is($path) ? 'nav-link active' : 'nav-link';
}


/**
 * @param null $make
 *
 * @return string
 */
function setActivePicksButton($make = null)
{
    return (Request::get('make') == $make) ? 'active' : '';
}