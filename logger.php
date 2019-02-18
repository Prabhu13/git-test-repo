<?php
class logger {
	function addLogs($str) {
		$str = date('Y-m-d H:i:s ') . $str . "\n";
		error_log($str, 3, LOG_FILE_PATH . LOG_FILE);
	}
}
$logger = new logger();
?>