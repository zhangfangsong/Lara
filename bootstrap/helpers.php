<?php

function system_load()
{
	$loadStr = str_replace([' ', "\n"], '', shell_exec('uptime'));
	return explode(',', substr($loadStr, strrpos($loadStr, ':') + 1));
}
