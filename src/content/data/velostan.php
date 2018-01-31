<?php
header('Content-Type: application/json');

$opts = [
	'http' => [
		'proxy'=> 'tcp://127.0.0.1:8080', 
		'request_fulluri'=> true
	]
];
$context = stream_context_create($opts); 

$velostan = simplexml_load_string(file_get_contents('http://www.velostanlib.fr/service/carto', false));

$carto = json_decode(file_get_contents('http://ip-api.com/json'));

$markers = [];

$markers['carto'] = $carto;
foreach ($velostan->markers->marker as $marker) {
	$m = new stdClass();
	$m->name = $marker->attributes()->name . '';
	$m->number = $marker->attributes()->number . '';
	$m->address = $marker->attributes()->address . '';
	$m->fullAddress = $marker->attributes()->fullAddress . '';
	$m->lat = $marker->attributes()->lat . '';
	$m->lng = $marker->attributes()->lng . '';
	$m->open = $marker->attributes()->open . '';
	$m->bonus = $marker->attributes()->bonus . '';

	$stationdetails = simplexml_load_string(file_get_contents('http://www.velostanlib.fr/service/stationdetails/nancy/' . $m->number));

	$m->station = new stdClass();
	$m->station->available = $stationdetails->available . '';
	$m->station->free = $stationdetails->free . '';
	$m->station->total = $stationdetails->total . '';
	$m->station->ticket = $stationdetails->ticket . '';
	$m->station->open = $stationdetails->open . '';
	$m->station->updated = $stationdetails->updated . '';
	$m->station->connected = $stationdetails->connected . '';


	$markers['parkings'][] = $m;
}

$markers = json_encode($markers);

echo $markers;