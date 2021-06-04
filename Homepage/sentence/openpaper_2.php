<?php


            $conn = new mysqli('localhost', 'root', '', 'userdb1');
            //Check for connection error
            $select = "SELECT * FROM `uploadfile`";
            $result = $conn->query($select);
            while($row = $result->fetch_object()){
                $pdf = $row->fileupload;
                // $path = $row->file_directory;
                // $file = $path;
            } 
            // echo $pdf;


            echo "<embed src='../fileupload/$pdf' width='100%' height='500px'>";

                       

?>