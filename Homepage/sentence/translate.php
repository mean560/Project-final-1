<?php

    require_once ('vendor/autoload.php');
    use \Statickidz\GoogleTranslate;
            
    $source = 'en';
    $target = 'th';
    $stringText = $_POST["inserttxt"];
    $stringText = str_replace(array("\n", "\r"), '', $stringText);


    if($stringText == "" || trim($stringText) == ""){

        echo "plaese enter text to upper box...";
    
    } else {
            
    $trans = new GoogleTranslate();
    $result = $trans->translate($source, $target, $stringText);



        echo $result;
    }