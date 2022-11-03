<?php

	$status = 1;
	
	$query = $conn->prepare("UPDATE notification SET notif_status =:status WHERE res_id =:id");
	$query->bindParam('status', $status);
	$query->bindParam('id', $_SESSION['unique_id']);
	$query->execute();



// $read_notif = $conn->prepare("UPDATE notification SET notif_status");