
<?php

$stringText = $_POST["inserttxt"];
// $stringText = str_replace(array("\n", "\r"), '', $stringText);


// $output = shell_exec('python C:/xampp/htdocs/Project-final/Homepage/sentence/enhanced-subject-verb-object-extraction-master/demo.py  '.$stringText);
// echo "$output";

if($stringText == "" || trim($stringText) == ""){

    echo "plaese enter text to upper box...";

} else {

    $output = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/enhanced-subject-verb-object-extraction-master/demo.py  '.$stringText);
    // print_r($output);
    // var_dump($output[1]);
    $ans = json_decode($output, true);

    // if($ans == ''){
    //     echo "This is simple sentence";
    // } 
    // print_r($ans);

    // echo gettype($output);
    // var_dump($ans);

    // $ans = json_decode($output, true);

    // echo gettype($ans);
    // echo ($output[])
}
?>


