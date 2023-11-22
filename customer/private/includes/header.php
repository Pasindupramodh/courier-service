<?php

if (session_status() === PHP_SESSION_NONE) {
   session_start();
}
if (!isset($_SESSION["user_id"])) {
   header("Location: login");
   die;
} else if ($_SESSION["user_type_id"] != 4) {
   header("Location: login");
   die;
}

?>