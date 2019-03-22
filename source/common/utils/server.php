<?php 


require_once ('../../server_root.php');

/*
 * serverEndPoint($target) Returns a Server URL Acces Point to $target resource
*/
function serverEndPoint($target) {

	$urlParts = explode('/', $_SERVER['PHP_SELF']);
	$baseUrl = "";

	for ($i=0; $i < count($urlParts)-1; $i++) {
		$baseUrl = $baseUrl . $urlParts[$i] . "/";
	}

	return $baseUrl . $target;
}

 ?>