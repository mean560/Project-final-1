<?php
session_start();
include('../../env/server.php');

$errors = array();

if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }


    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $_SESSION['username'] = $username;

            $row = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['user_id'] = $row['user_id'];

            $_SESSION['success'] = "Your are now logged in";
            $_SESSION['status_login'] = "login";
            header("location: ../../index.php");
        } else {
            array_push($errors, "Wrong Username or Password");
            $_SESSION['error'] = "Wrong Username or Password!";
            header("location: ../../authen/signin.php");
        }
    } else {
        array_push($errors, "Username & Password is required");
        $_SESSION['error'] = "Username & Password is required";
        header("location: ../../authen/signin.php");
    }
}
