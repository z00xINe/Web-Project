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
        "x-rapidapi-key: 214058eabbmsh015596a7d4dc6a6p188685jsncd9762534ebc"
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