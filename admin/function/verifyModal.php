<?php
require '../include/session.php';
require '../include/database.php';

if (isset($_POST['approved'])) {
	$resident_id = $_POST['resident_id'];
	$resident_name = $_POST['resident_name'];
	$status = 'Verified';
	$to = 0;
	$notification = "Your account has been approved";
	$link = "my_profile";
	$notif_status = 0;
	$status_icon = 'verified';
	try {

		$approve_query = $conn->prepare("UPDATE resident SET verification_status =:verification_status, to_verify_status =:to_verify_status WHERE resident_id =:resident_id");
		$approve_query->bindParam('verification_status', $status);
		$approve_query->bindParam('to_verify_status', $to);
		$approve_query->bindParam('resident_id', $resident_id, PDO::PARAM_INT);
		$query_execute = $approve_query->execute();

		$notif = $conn->prepare("INSERT INTO notification(`notification`, `link`, `notif_status`, `res_id`, `user_id`, `status_icon`) values (:notification, :link, :notif_status, :res_id, :user_id, :status_icon)");
		$notif->bindParam('notification', $notification);
		$notif->bindParam('link', $link);
		$notif->bindParam('notif_status', $notif_status);
		$notif->bindParam('res_id', $resident_id, PDO::PARAM_INT);
		$notif->bindParam('user_id', $session_id);
		$notif->bindParam('status_icon', $status_icon);
		$notif->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	    $date_now = date('Y-m-d H:i:s');
	    $action = "Approved account of $resident_name | Approved by $username_sess";
	    $stmt = $conn->prepare($activity_log);
	    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	    $stmt->bindParam(':date_now', $date_now);
	    $stmt->bindParam(':action', $action);
	    $stmt->execute();


		if ($query_execute) {
	        $_SESSION['success'] = 'Approved successfully';
			$_SESSION['success_status'] = 'success';
			header("location:../to_verify_account.php");
	        exit(0);
	    }else {
	        $_SESSION['success'] = 'Not Approved';
			$_SESSION['success_status'] = 'success';
			header("location:../to_verify_account.php");
	        exit(0);
	    }

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}

if (isset($_POST['declined'])) {
	$resident_id = $_POST['resident_id'];
	$resident_name = $_POST['resident_name'];
	$notification = "Your account has been declined";
	$status = 'Decline';
	$link = "my_profile";
	$to = 0;
	$notif_status = 0;
	$status_icon = 'declined';
	$decline_mess = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$approve_query = $conn->prepare("UPDATE resident SET verification_status =:verification_status, to_verify_status =:to_verify_status WHERE resident_id =:resident_id");
		$approve_query->bindParam('verification_status', $status);
		$approve_query->bindParam('to_verify_status', $to);
		$approve_query->bindParam('resident_id', $resident_id, PDO::PARAM_INT);
		$query_execute = $approve_query->execute();

		$notif = $conn->prepare("INSERT INTO notification(`notification`, `link`, `notif_status`, `res_id`, `user_id`, `status_icon`, `decline_mess`) values (:notification, :link, :notif_status, :res_id, :user_id, :status_icon, :decline_mess)");
		$notif->bindParam('notification', $notification);
		$notif->bindParam('link', $link);
		$notif->bindParam('notif_status', $notif_status);
		$notif->bindParam('res_id', $resident_id, PDO::PARAM_INT);
		$notif->bindParam('user_id', $session_id);
		$notif->bindParam('status_icon', $status_icon);
		$notif->bindParam('decline_mess', $decline_mess);
		$notif->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	    $date_now = date('Y-m-d H:i:s');
	    $action = "Decline account of $resident_name | Decline by $username_sess";
	    $stmt = $conn->prepare($activity_log);
	    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	    $stmt->bindParam(':date_now', $date_now);
	    $stmt->bindParam(':action', $action);
	    $stmt->execute();


		if ($query_execute) {
	        $_SESSION['success'] = 'Decline successfully';
			$_SESSION['success_status'] = 'success';
			header("location:../to_verify_account.php");
	        exit(0);
	    }else {
	        $_SESSION['success'] = 'Not Decline';
			$_SESSION['success_status'] = 'success';
			header("location:../to_verify_account.php");
	        exit(0);
	    }

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}