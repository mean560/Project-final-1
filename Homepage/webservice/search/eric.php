<?php
$topic = $_POST['topic'];
$topic = str_replace(' ', '%20', $topic);


$curl = curl_init();
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.ies.ed.gov/eric/?search=" . $topic . "&format=json&rows=2000&fields=title%2Cid%2Cdescription%2Curl%2Cpublicationdateyear", 
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
// echo json_encode($response, true);
