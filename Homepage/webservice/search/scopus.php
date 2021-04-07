<?php
$topic = $_POST['topic'];
$topic = str_replace(' ', '%20', $topic);
//$sort = $_POST['sort'];

//$start = $_POST['start'];

$curl = curl_init();
header('Content-Type: application/json; charset=utf-8');

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.elsevier.com/content/search/scopus?query=" . $topic . "&apiKey=50e8b35fb9ba4f3d45aa682128b9f701",
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
