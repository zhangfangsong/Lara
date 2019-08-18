<?php

/**
 * 公用函数库
 * User: zfs
 * Date: 2019/8/17
 * Time: 22:34
 */

function system_load()
{
	$load = shell_exec('uptime');
	$load = substr($load, strpos($load, ': ') + 2);
	$load = str_replace([',', "\n"], '', $load);

	return explode(' ', $load);
}
