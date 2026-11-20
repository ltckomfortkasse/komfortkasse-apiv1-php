<html>
<body>
<?php

// Komfortkasse Generic Example
// This file will send an API call conatining a new order to the komfortkasse API. 

include_once ('komfortkasse_settings.php');

// first, build the example order
include_once ('komfortkasse_buildorder.php');

getorder();

$query_raw = http_build_query($order);

$query_enc = base64_encode($query_raw);

$query = http_build_query(array (
		'q' => $query_enc,
		'hash' => $accesscode,
		'key' => $apikey
));

// the request carries the API key: no redirects, certificate verified
$contextData = array (
		'method' => 'POST',
		'timeout' => 2,
		'follow_location' => 0,
		'header' => "Connection: close\r\n" . "Content-Length: " . strlen($query) . "\r\n",
		'content' => $query
);

$sslData = array (
		'verify_peer' => true,
		'verify_peer_name' => true
);

$context = stream_context_create(array (
		'http' => $contextData,
		'ssl' => $sslData
));

$result = @file_get_contents('https://ssl.komfortkasse.eu/api/shop/neworder.jsf', false, $context);

echo 'Result:<br/><br/>';
echo '<textarea rows="5" cols="80">';
echo $result;
echo '</textarea>';



?>

</body>
</html>