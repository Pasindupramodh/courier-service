<?php

if (session_status() === PHP_SESSION_NONE) {
   session_start();}
   if (!isset($_SESSION["user_id"])) {
      ?>
      <script>window.location="login.php";</script>
      <?php
      die();
  }else if($_SESSION["user_type_id"]==4){
   ?>
   <script>window.location="login.php";</script>
   <?php
  }

?>