<?php


            $conn = new mysqli('localhost', 'root', '', 'project_test');
            //Check for connection error
            $select = "SELECT * FROM `tmp` WHERE file_directory IS NOT NULL";
            $result = $conn->query($select);
            while($row = $result->fetch_object()){
                $pdf = $row->file_name;
                $path = $row->file_directory;
                $file = $path;
            } 


            echo "<embed src='$path ' width='100%' height='425px'>";

                       

?>