
<?php

$stringText = $_POST["inserttxt"];

// $output = shell_exec('python C:/xampp/htdocs/Project-final/Homepage/sentence/enhanced-subject-verb-object-extraction-master/demo.py  '.$stringText);
// echo "$output";

if($stringText == "" || trim($stringText) == ""){

    echo "plaese enter text to upper box...";

} else {

    $output = shell_exec('python C:/xampp/htdocs/Project-final/Homepage/sentence/enhanced-subject-verb-object-extraction-master/demo.py  '.$stringText);
    echo "$output";

}
?>


