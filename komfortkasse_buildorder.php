<?php

// Komfortkasse Generic Example
// just building a "Example Order" here

function getorder($order_number) {
	
	global $order;
	
	if (!$order_number) {
		$order_number = rand(10000, 99999);
		file_put_contents('order_numbers.txt', $order_number . "\n", FILE_APPEND);
	}
	
	$order = array ();
	$order ['number'] = $order_number;
	$order ['date'] = date('d.m.Y');
	$order ['email'] = 'manuel.machajdik@gmail.com'; // enter your E-Mail address here in order to receive the payment information mail
	$order ['customer_number'] = '12345';
	$order ['payment_method'] = 'prepayment';
	$order ['amount'] = 123.45;
	$order ['currency_code'] = 'EUR';
	// $order ['target_currency'] = 'GBP';
	$order ['language_code'] = "de-DE"; // language (de = german) and country (DE = Germany)
	$order ['delivery_firstname'] = 'Anna';
	$order ['delivery_lastname'] = 'Mustermann';
	$order ['delivery_company'] = 'Musterfirma';
	$order ['billing_firstname'] = 'Max';
	$order ['billing_lastname'] = 'Mustermann';
	$order ['billing_company'] = '';
	$order ['products'] [] = 'ABC';
	$order ['products'] [] = 'XYZ';

}

function csv($s) {
	return "\"" . str_replace("\"", "", str_replace(";", ",", utf8_encode($s))) . "\";";
}


?>