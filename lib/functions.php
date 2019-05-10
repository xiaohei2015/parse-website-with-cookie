<?php
/**
 * run log
 */
function writeLog($log, $type = "app")
{
	$log = "[" . date('Y-m-d H:i:s') . "]" . $log . PHP_EOL;
	file_put_contents(ROOT_DIR . "/runtime/" . $type . "_". date('Ym') .".log", $log, FILE_APPEND);
}