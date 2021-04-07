<?php
$topic = $_POST['topic'];
$topic = str_replace(' ', '+', $topic);

$curl = curl_init();
header('Content-Type: application/json; charset=utf-8');

curl_setopt_array($curl, array(
    CURLOPT_URL => "http://export.arxiv.org/api/query?search_query=" . $topic . "&start=0&max_results=1000",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

$xml = simplexml_load_string($response);
$json = json_encode($xml);
$array = json_decode($json, TRUE);

curl_close($curl);
echo $json;
//print_r($array);
