<?php
    $id = $_POST["id"];
    $con = mysqli_connect("localhost", "root", "", "project_test");
    // $query="select * from author_test where id = $id";
    $query = "SELECT * FROM author WHERE  id = $id";

    $result=mysqli_query($con, $query) or die( mysqli_error($con));
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($row);


?>