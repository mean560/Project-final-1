<?php

    $conn = new mysqli('localhost', 'root', '', 'project_test');
    $nquery = mysqli_query($conn, "SELECT * from  uploadfile  where user_id = {$_SESSION['user_id']}");
    $count = mysqli_num_rows($nquery);
    if ($count == 0) {
        echo "";
    } else {
        while ($row = $nquery->fetch_object()) {
            $pdf = $row->fileupload;
        }
        echo "<embed src='../fileupload/$pdf' width='100%' height='500px'>";
    }
    
?>