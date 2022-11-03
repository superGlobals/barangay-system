<?php
session_start();
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    header("location: pages-login.php");
    exit();
}
$session_id=$_SESSION['id'];
$username_sess = $_SESSION['username_sess'];