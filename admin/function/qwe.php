<?php
require '../include/session.php';
require '../include/database.php';

$status = 1;
	
	$query = $conn->prepare("UPDATE brgy_request_certificate SET print =:status WHERE brgy_clearance_id =1");
	$query->bindParam('status', $status);
	$query->execute();