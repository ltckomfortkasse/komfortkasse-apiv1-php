<?php

// Komfortkasse Generic Example
// This file will receive read requests and payment status updates from Komfortkasse

include_once ('komfortkasse_settings.php');
include_once ('komfortkasse_buildorder.php');

// ----- get URL parameters -----

if ($_POST ['action'])
	$action = urldecode($_POST ['action']);
else
	$action = urldecode($_GET ['action']);

if ($_POST ['o'])
	$request = base64_decode(urldecode($_POST ['o']));
else
	$request = base64_decode(urldecode($_GET ['o']));

$o = ''; // in $o, we store our output
         
// ------ read orders ------
if ($action == 'readorders') {
	
	if ($request == 'all') {
		// step 1: return order numbers only (as CSV - sorry)
		$order_numbers = file('order_numbers.txt', FILE_IGNORE_NEW_LINES);
		foreach ( $order_numbers as $order_number ) {
			$o = $o . csv($order_number);
		}
	} else {
		// step 2: return order details (url encoded, one per line)
		$ex = explode(';', $request);
		foreach ( $ex as $id ) {
			
			getorder($id);
			
			$query_raw = http_build_query($order);

			$query_enc = base64_encode($query_raw);
			
			$o = $o . "\n";
		}
	}
}

// ------ update payment order status ------

if ($action == 'updateorders') {
	$lines = explode("\n", $request);
	foreach ( $lines as $line ) {
		$col = explode(';', $line);
		$id = trim($col [0]);
		if ($id) {
			$status = trim($col [1]);
			$callbackid = (count($col) > 2) ? trim($col [2]) : null;
			
			file_put_contents('received_updates.txt', date('d.M.Y H:i:s') . ' ' . $id . ' ' . $status . ' ' . $callbackid . "\n", FILE_APPEND);
			
			$o = $o . csv($id);
		}
	}
}

// ----- output -----
echo base64_encode($o);

?>