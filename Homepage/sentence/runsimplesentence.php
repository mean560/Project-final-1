<?php

    $stringText = $_POST["inserttxt"];

    if ($stringText == "" || trim($stringText) == "") {

        echo "plaese enter text to upper box...";

    } else {

        $stringText_new = trim(preg_replace('/\s+/', ' ', $stringText));

        // $speller = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/spelling.py  ' . $stringText_new);

        // if(trim($stringText_new) !== trim($speller)){

        //     echo "Are you mean '" . $speller . "' ?";

        // } else {

            $arrStr = array_map('trim',array_filter(explode('.', $stringText_new)));
            // var_dump($arrStr);
            for($i = 0; $i < count($arrStr); $i++) {

                $output[$i] = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/enhanced-subject-verb-object-extraction-master/demo.py  ' . $arrStr[$i]);
                // var_dump($output[$i]); echo "<br/>";
                $output_new[$i] = trim($output[$i]);

            }


            if($output_new[0][0]=="[" && $output_new[0][1]=="]"){
                echo "This is simple sentence.";
             } else {
                for($j=0; $j<count($output_new); $j++){                    
                    // for($r=0; $r<$j; $r++){
                        $test[$j] = str_replace(")","<br/>",$output_new[$j]);
                        // var_dump($test);
                        $pattern = '/[;,(]/';
                    //     // // echo gettype($output_new);
                    //     // // $string = "[('i', 'love', 'you')]";
                        $a[$j] = preg_split($pattern, $test[$j]);
                    //     // echo $a[$j]."<br/>";
                        $b[$j] = str_replace("'", "", $a[$j]);
                    //     // // print_r($b[$j]); echo "<br/>";
                        $c[$j] = str_replace("[", "", $b[$j]);
                    //     // // print_r($c[$j]); echo "<br/>";
                        $d[$j] = str_replace("]", "", $c[$j]);
                    //     // print_r($c[$j]); echo "<br/>";
                    //     // echo $b[$j][1]." ".$b[$j][2]." ".$b[$j][3]."<br/>";   
                    //     // echo count($d[$j]);
                        for($r=0; $r<count($c[$j]); $r++){
                            echo $d[$j][$r]." ";
                            // echo str_replace("]","<br/>",$c[$j][$r]);
                        }  
                }

            }

        }
