<?php
	ob_start ("ob_gzhandler");
	header("Content-type: application/x-javascript; charset: UTF-8");
	//header("Cache-Control: must-revalidate");
	// 1h :	$offset = 60 * 60 ;
	$offset = 50 * 24 * 60 * 60;
	$ExpStr = "Expires: " .
	gmdate("D, d M Y H:i:s",
	time() + $offset) . " GMT";
	header($ExpStr);
?>