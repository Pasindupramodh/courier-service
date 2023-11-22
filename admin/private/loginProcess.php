<?php
require "database.php";
$username = addsLashes($_POST["username"]);
$password = addsLashes($_POST["password"]);

if (str_contains($username, ' ')) {
    echo 'Wrong username or password';
} else {
    $db = new Database();
    $arr = array();
    $arr['username'] = $username;
    $query = "select * from user where user_name = :username";
    $check = $db->db_check($query, $arr);
    if ($check) {
        $result = $db->db_read("select * from user where user_name = :username", $arr);
        $hash = ($result[0])['password'];
        if (password_verify($password, $hash)) {
            $status = ($result[0])['status_id'];
            if($status == 2){
                echo "Your Account Has deleted";
            }else{
                $row = $result[0];
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                if($row["user_type_id"]=="4"){
                    echo 'Wrong Username or Password';
                }else{
                    $_SESSION["user_id"] = $row["user_id"];
                    $_SESSION["user_type_id"] = $row["user_type_id"];
        
                    $arr = array();
                    $arr['emp_id'] = $row["user_id"];
                    $result1 = $db->db_read("select * from employee where user_id = :emp_id", $arr);
                    $row1 = $result1[0];
                    $_SESSION["branch_id"] = $row1["branch_id"];
                    $_SESSION["name"] = $row1["fname"]." ".$row1["lname"];
                    session_write_close();
                    echo "successfully";
                }
                
                
            }
            
        } else {
            echo 'Wrong Password';
        }
    } else {
        echo 'Wrong Username';
    }
}


// if($Error == "")
// {
//     $email	= addslashes($POST['email']);
//     $password	= addslashes($POST['password']);

//     //get user
//     $query = "select * from users where email = '$email' && password = '$password' ";
//     $result = $this->db_read($query);

//      if($result)
//     {
//         $row = $result[0];
             
//          $_SESSION['user_id'] = $row['id'];
//          $_SESSION['user_rank'] = $row['rank'];

//          return "";
//      }else{
//          $Error = "wrong email or password";
//      }

// }

// return $Error;
