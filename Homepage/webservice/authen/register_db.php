<?php
session_start();
include('../../env/server.php');

$errors = array();

if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    } 
    // else {
    //     $email = test_input($email);
    //     // check if e-mail address is well-formed
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //       echo "Invalid email format";
    //     }
    //   }
    if (strlen($password1)  < 8) {
        array_push($errors, "Password must be at least 8 characters");
    }
    if (strlen($password2)  < 8) {
        array_push($errors, "Password must be at least 8 characters");
    }
    if (empty($password1)) {
        array_push($errors, "Password is required");
    }
    if ($password1 != $password2) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        } 
        // else {
        //     $email = test_input($email);
        //     // check if e-mail address is well-formed
        //     // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     //   $emailErr = "Invalid email format";
        //     // }
        //   }
    }
    if (count($errors) == 0) {
        $password = md5($password1);

        $query = "INSERT INTO user (username, email, password)
                  VALUES('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        $sql= "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row['user_id'];

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        $_SESSION['status_login'] = "login";
        header('location: ../../index.php');
    } else {
        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     array_push($errors, "Invalid email format");
        //     $_SESSION['error'] = "Invalid email format";
        //     // $emailErr = "Invalid email format";
        //     header("location: ../../authen/register.php");

        //   }
        if (($_POST["username"]) == $username || ($_POST["email"]) == $email) {
            array_push($errors, "Username or Email already exists");
            $_SESSION['error'] = "Username or Email already exists";
            header("location: ../../authen/register.php");
        }
        if (strlen($_POST["password1"]) < 8) {
            array_push($errors, "Password must be at least 8 characters");
            $_SESSION['error'] = "Password must be at least 8 characters";
            header("location: ../../authen/register.php");
        }
        if (strlen($_POST["password2"]) < 8) {
            array_push($errors, "Password must be at least 8 characters");
            $_SESSION['error'] = "Password must be at least 8 characters";
            header("location: ../../authen/register.php");
        }

        if ($password1 != $password2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
            header("location: ../../authen/register.php");
        }
        if (($_POST["username"]) == "" || ($_POST["email"]) == "") {
            array_push($errors, "Please fill up this form");
            $_SESSION['error'] = "Please fill up this form";
            header("location: ../../authen/register.php");
        }
    }
}
// function test_input($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
//   }
