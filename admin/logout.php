<?php  
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include 'connection.php';

        if ($_SESSION['sess_user_id']) {
            $_SESSION = array();

          if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time()-3600);
           }

            session_destroy(); 
        }

 
     ?>

<script>
       window.location.href = "login.php";
</script>
        <?php
