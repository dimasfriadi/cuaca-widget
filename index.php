<?php
require 'vendor/autoload.php';
date_default_timezone_set('Asia/jakarta'); // set timezome to GMT+7

#$date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',); // 17 Agustus 1945
#printf("Kapan Indonesia Merdeka ? %s\n", $date->diffForHumans());

$api = new RestClient([
'base_url' => "https://ibnux.github.io/BMKG-importer",
'format' => "json",
]);
$result = $api->get("cuaca/501320");
$data = $result->decode_response();

foreach((array) $data as $item) {
$date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s',
$item->jamCuaca);
$date->format('d M Y');
printf("Cuaca Hari Ini Di Kota Saung Keou Joung hari %s tanggal %s".
"jam %s adalah %s dengan suhu %s derajat celcius. \n",
$date->format('l'), @$date->format('d M Y'),
@$date->format('H:i'), $item->cuaca, $item->tempC);
}


