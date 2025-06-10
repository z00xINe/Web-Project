<?php

$phone = $_REQUEST["q"];

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://whatsapp-number-validator3.p.rapidapi.com/WhatsappNumberHasItWithToken",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode([
		'phone_number' => $phone
	]),
	CURLOPT_HTTPHEADER => [
		"Content-Type: application/json",
		"x-rapidapi-host: whatsapp-number-validator3.p.rapidapi.com",
        "x-rapidapi-key: bc3a7088bamshbc632a44e4ac3a3p14407djsn8b172808f858"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "Not Valid";
} else {
    $res = json_decode($response, true);
	echo $res["status"];
}