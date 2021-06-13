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
                // echo json_decode($output[$i]);

            }
            // echo "__________________________________________";
            $output_new = array_map('trim',$output);
            // print_r($output_new);
            if(!empty($output_new)){
                // echo "ไม่ว่างนะ";
                // print_r($output_new);
                $c = 0;
                for($j = 0; $j < count($output_new); $j++) {
                    if($output_new[$j]=="[]"){
                        $c = $c+1;
                    } else {
                        echo $output_new[$j]."<br/>";
                    }
                    if($c == count($output_new)){
                        echo "This is simple sentence.";
                        // echo "ว่างแน้ว";
                        break;
                    }

                }
            }
        }
    }
?>


