<?php
session_start();
require 'public/include/init.php';

$page = isset($_GET['url']) ? $_GET['url'] : "home";

//includes folder
$folder = "public/";

//get all files from folder
$files = glob($folder . "*.php");
$file_name = $folder . $page . ".php";

if(in_array($file_name, $files))
{
  include(strtolower($file_name));
}else{
  include "public/404.php";
}
