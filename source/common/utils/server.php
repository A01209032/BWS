<?php

$SERVER_ROOT = "source/";
//require_once('../../server_root.php');

function frombase($target) {
	$urlParts = explode('/',$_SERVER['PHP_SELF']);
	$baseUrl = "";
	for ($i=0; $i < count($urlParts)-1; $i++) {
		$baseUrl = $baseUrl . $urlParts[$i] . "/";
	}

	$baseUrl = $_SESSION['sbase'];
	return $baseUrl.$target;
}
?>