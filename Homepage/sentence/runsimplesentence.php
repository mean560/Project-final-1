
<?php

$stringText = $_POST["inserttxt"];

if ($stringText == "" || trim($stringText) == "") {
    echo "plaese enter text to upper box...";
} else {
    $stringText = trim(preg_replace('/\s+/', ' ', $stringText));

    $arrStr = explode(".", $stringText);

    // echo count($arrStr);
    $output = array();
    $result = array();
    for($i = 0; $i < count($arrStr); $i++) {
        $output[$i] = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/enhanced-subject-verb-object-extraction-master/demo.py  ' . $arrStr[$i]);
        // var_dump($output[$i]); echo "<br/>";

        //$result[$i] = array_values(json_decode($output, true));
        // $ans = json_decode($output, true);
        echo "$output[$i] <br/>";
    }
    // $ans = array();
    // $ans = json_decode($output, true);   
    // $result = 
    
    // echo $stringText;
    // var_dump($result);

    // echo gettype($output);
    



}
?>


