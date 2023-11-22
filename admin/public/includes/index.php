<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//include all functions


$page = isset($_GET['url']) ? $_GET['url'] : "home";

//includes folder
$folder = "";

//get all files from folder
$files = glob($folder . "*.php");
$file_name = $folder . $page . ".php";

if(in_array($file_name, $files))
{
	include($file_name);
}else{
	include "../private/includes/404.php";
}
