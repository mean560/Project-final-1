<?php

    $stringText = $_POST["inserttxt"];

    if ($stringText == "" || trim($stringText) == "") {

        echo "plaese enter text to upper box...";

    } else {

        $stringText_new = trim(preg_replace('/\s+/', ' ', $stringText));

        $speller = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/spelling.py  ' . $stringText_new);

        if(trim($stringText_new) !== trim($speller)){

            echo "Are you mean '" . $speller . "' ?";

        } else {

            $arrStr = array_map('trim',array_filter(explode('.', $stringText_new)));
            // var_dump($arrStr);
            for($i = 0; $i < count($arrStr); $i++) {

                $output[$i] = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/enhanced-subject-verb-object-extraction-master/demo.py  ' . $arrStr[$i]);

                echo "$output[$i] <br/>";
                // echo json_encode($output);
                // echo json_decode($output, true);   
                // echo $output[$i];
            }
            // print_r($output);
            // $output_new = array_map('trim',$output);
            // print_r($output_new);



        }

        // $arrStr = explode(".", $stringText);
        // echo gettype($arrStr);
        // echo $arrStr;
        // echo json_encode($arrStr);

        // echo count($arrStr);
        // $output = array();
        // $result = array();
        // for($i = 0; $i < count($arrStr); $i++) {
        //     $output = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/enhanced-subject-verb-object-extraction-master/demo.py  ' . $arrStr[$i]);

        //     // echo "$output <br/>";
            
        //     // echo json_encode($output);
        //     // echo json_decode($output, true);   
        //     // echo $output[$i];
        // }
        // echo $output[0];


        // echo json_decode($output, true);   
        // var_dump($output);
        // $ans = array();
        // $result = 
        // echo $stringText;
        // var_dump($result);
        // echo gettype($output);
        // for($r = 0; $r < count($output); $r++){
        //     for($l = 0; $l < $r; $l++){
        //         echo $output[$r][$l];
        //         echo "<br/>";
        //     }

        // }
        



    }
?>


