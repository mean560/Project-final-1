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
            $count = 1;
            // print_r($arrStr);
            for($i = 0; $i < count($arrStr); $i++) {
                
                $output[$i] = shell_exec('python C:/xampp/htdocs/Project-final-1/Homepage/sentence/enhanced-subject-verb-object-extraction-master/demo.py  ' . $arrStr[$i]);
                // var_dump($output[$i]); echo "<br/>";
                $output_new[$i] = trim($output[$i]);
                echo "<p style='background-color:coral;'>sentence ". $count .": </p>";
                if($output_new[$i][0]=="[" && $output_new[$i][1]=="]"){
                    echo "This is simple sentence."."<br/>";
                } else {
                    for($j=0; $j<strlen($output_new[$i]); $j++){
                        // echo "sentence ". $count .": ";          
                        // for($r=0; $r<$j; $r++){
                            $test[$i][$j] = str_replace(")","<br/>",$output_new[$i][$j]);
                            // var_dump($test);
                            $pattern = '/[;,(]/';
                        //     // // echo gettype($output_new);
                        //     // // $string = "[('i', 'love', 'you')]";
                            $a[$i][$j] = preg_split($pattern, $test[$i][$j]);
                        //     // echo $a[$j]."<br/>";
                            $b[$i][$j] = str_replace("'", "", $a[$i][$j]);
                        //     // // print_r($b[$j]); echo "<br/>";
                            $c[$i][$j] = str_replace("[", "", $b[$i][$j]);
                        //     // // print_r($c[$j]); echo "<br/>";
                            $d[$i][$j] = str_replace("]", "", $c[$i][$j]);
                        //     // print_r($c[$j]); echo "<br/>";
                        //     // echo $b[$j][1]." ".$b[$j][2]." ".$b[$j][3]."<br/>";   
                        //     // echo count($d[$j]);
                            for($r=0; $r<count($d[$i][$j]); $r++){
                                echo $d[$i][$j][$r];
                                // $tint_a[$r] = $d[$i][$j][$r];
                                // $tint_b[$r] = json_decode($tint_a[$r], true);
                                // echo str_replace("]","<br/>",$c[$j][$r]);
                            }
                            echo "";
                            // $count++;
                    }
                }
                // echo "</p>";
                $count++;


        }
    }