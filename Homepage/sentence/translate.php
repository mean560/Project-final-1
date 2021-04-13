<?php

    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;
            
    $source = 'en';
    $target = 'th';
    $stringText = $_POST["inserttxt"];

    if($stringText == "" || trim($stringText) == ""){

        echo "plaese enter text to upper box...";
    
    } else {
            
    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $stringText);



        echo $result;
    }