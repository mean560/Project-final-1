<?php
    $id = $_POST['id'];
    $con = mysqli_connect("localhost", "root", "", "userdb1");
    $query="select * from author_test where id = $id";
    $result=mysqli_query($con, $query) or die( mysqli_error($con));
    $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($row);
?>