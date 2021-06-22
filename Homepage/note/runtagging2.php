<?php

$stringText = $_POST["inserttxt"];
$stringText = str_replace(array("\n", "\r"), '', $stringText);



if($stringText == "" || trim($stringText) == ""){

    echo "plaese enter text to upper box...";
    return $result = null;

} else {
    $stringText_new = trim(preg_replace('/\s+/', ' ', $stringText));
    $arrStr = array_map('trim',array_filter(explode('.', $stringText_new)));
    for($i = 0; $i < count($arrStr); $i++) {
        $word[$i] = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/tagging.py ' . $arrStr[$i]);
        $result2[$i] = json_decode($word[$i], true);
        // print_r($word[$i]);
    }
    


    // $word = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/tagging.py ' . $stringText);

    // $result = json_decode($word, true);
    // echo gettype($result);
}

// for($i = 0; $i < count($arrStr); $i++) {
//     $word = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/tagging.py ' . $arrStr[$i]);
//     print_r(($word))
// // $result = json_decode($word[$i], true);
// }
?>