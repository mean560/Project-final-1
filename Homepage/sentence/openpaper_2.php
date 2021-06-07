<?php

    $conn = new mysqli('localhost', 'root', '', 'userdb1');
    //Check for connection error
    $nquery = mysqli_query($conn, "SELECT * from  uploadfile  where user_id = {$_SESSION['user_id']}");
    // $select = "SELECT * FROM `uploadfile`";
    // $result = $conn->query($select);
    // while($row = $result->fetch_object()){
    $count = mysqli_num_rows($nquery);
    // echo $count;
    if ($count == 0) {
        echo "";
    } else {
        while ($row = $nquery->fetch_object()) {
            $pdf = $row->fileupload;
        }
        echo "<embed src='../fileupload/$pdf' width='100%' height='500px'>";
    }
    
?>