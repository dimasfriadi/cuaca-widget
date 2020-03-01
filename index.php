<?php
require 'vendor/autoload.php';
date_default_timezone_set('Asia/jakarta'); // set timezome to GMT+7

#$date = Carbon\Carbon::createFromDate(1945, 8, 17); // 17 Agustus 1945
#printf("Kapan Indonesia Merdeka ? %s\n", $date->diffForHumans());

$api = new RestClient([
'base_url' => "https://ibnux.github.io/BMKG-importer",
'format' => "json",
]);
$result = $api->get("cuaca/501320");
$data = $result->decode_response();

foreach((array) $data as $item) {
	printf("Cuaca kota singkawang tanggal %s, adalah %s dengan suhu %s derajat celcius. \n",
$item->jamCuaca, $item->cuaca, $item->tempC );
}


