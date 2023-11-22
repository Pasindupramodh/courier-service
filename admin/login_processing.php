<?php
session_start();
include 'connection.php';


$username = $password = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = test_input($_POST["username"]); 
    $password = test_input($_POST["password"]);
 
}

function test_input($data) { 
    $data1 = trim($data); 
    $data2 = stripslashes($data1); 
    $data3 = htmlspecialchars($data2); 
    return $data3;
}


$user_name = mysqli_real_escape_string($con,$username); 
$query = "SELECT id,user_name FROM system_user WHERE username = '$username'  AND password = '$password' ";
$result = mysqli_query($con,$query); 

    if (mysqli_num_rows($result) == 0) {
        echo "The login details you entered is incorrect.<br>Please try again (make sure your caps lock is off).";
        die;
    }
    else { 

            while ($row = mysqli_fetch_array($result)) { 
                $id = $row['id']; 
                $fullname = $row['user_name'];
            }

            $_SESSION['sess_user_id'] = $id; //1
            $_SESSION['sess_fullname'] = $fullname; //PRASANNA SENANAYAKA

            header('Location: index.php');

    }




