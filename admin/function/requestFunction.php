<?php
require '../include/session.php';
require '../include/database.php';


if (isset($_POST['accepted'])) {
	$brgy_clearance_id = $_POST['brgy_clearance_id'];
	$resident_id = $_POST['resident_id'];
	$certificate_type = $_POST['certificate_type'];
	$status = 'accepted';
    $notification = "$certificate_type request is now in process.";
    $link = "my_request";
    $notif_status = 0;
    $not_stat = 'in process';
	try {


		$query = $conn->prepare("UPDATE brgy_request_certificate SET status =:status WHERE brgy_clearance_id =:brgy_clearance_id LIMIT 1");
		$query->bindParam(':status', $status);
		$query->bindParam(':brgy_clearance_id', $brgy_clearance_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

	    $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Accept request $certificate_type | Accepted by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();

        $notif = $conn->prepare("INSERT INTO notification(`notification`, `link`, `notif_status`, `res_id`, `user_id`, `brgy_clearance_id`,`status_icon`) values (:notification, :link, :notif_status, :res_id, :user_id, :brgy_clearance_id, :status_icon)");
        $notif->bindParam('notification', $notification);
        $notif->bindParam('link', $link);
        $notif->bindParam('notif_status', $notif_status);
        $notif->bindParam('res_id', $resident_id, PDO::PARAM_INT);
        $notif->bindParam('user_id', $session_id);
        $notif->bindParam('brgy_clearance_id', $brgy_clearance_id, PDO::PARAM_INT);
        $notif->bindParam('status_icon', $not_stat);
        $notif->execute();


        if ($query_execute) {
            $_SESSION['success'] = 'Accepted certificate request successfully';
			$_SESSION['success_status'] = 'success';
            header("location: ../request_certificate.php");
            exit(0);
        }else {
            $_SESSION['success'] = "failed";
            $_SESSION['success_status'] = "error";
            header("location: ../request_certificate.php");
            exit(0);
        }

	} catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }   

}



// decline request

if (isset($_POST['decline'])) {
	$brgy_clearance_id = $_POST['brgy_clearance_id'];
	$reason = $_POST['reason'];
    $resident_id = $_POST['resident_id'];
	$certificate_type = $_POST['certificate_type'];
    $status = "decline";
	$resident_id = $_POST['resident_id'];
    $notification = "$certificate_type request has been declined";
    $link = "my_request";
    $notif_status = 0; 


	try {


		$query = $conn->prepare("UPDATE brgy_request_certificate SET reason =:reason , status =:status WHERE brgy_clearance_id =:brgy_clearance_id LIMIT 1");
    	$query->bindParam(':reason', $reason);
    	$query->bindParam(':status', $status);
    	$query->bindParam(':brgy_clearance_id', $brgy_clearance_id);
    	$query_execute= $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Decline request $certificate_type | Decline by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();

        $notif = $conn->prepare("INSERT INTO notification(`notification`, `link`, `notif_status`, `res_id`, `user_id`, `brgy_clearance_id`, `reason`) VALUES (:notification, :link, :notif_status, :res_id, :user_id, :brgy_clearance_id, :reason)");
        $notif->bindParam('notification', $notification);
        $notif->bindParam('link', $link);
        $notif->bindParam('notif_status', $notif_status);
        $notif->bindParam('res_id', $resident_id, PDO::PARAM_INT);
        $notif->bindParam('user_id', $session_id);
        $notif->bindParam('brgy_clearance_id', $brgy_clearance_id, PDO::PARAM_INT);
        $notif->bindParam('reason', $reason);
        $notif->execute();


	if ($query_execute) {
            $_SESSION['success'] = 'Successfully decline request';
			$_SESSION['success_status'] = 'success';
            header("location: ../request_certificate.php");
            exit(0);
        }else {
            $_SESSION['success'] = "failed";
            $_SESSION['success_status'] = "error";
            header("location: ../request_certificate.php");
            exit(0);
        }



	}catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    } 

	
}

// decline request end


 // pickup request

 if (isset($_POST['pickup'])) {
    $brgy_clearance_id = $_POST['brgy_clearance_id'];
    $resident_id = $_POST['resident_id'];
    $certificate_type = $_POST['certificate_type'];
    $status = 'ready to pickup';
    $notification = "$certificate_type is ready to pick up";
    $link = "my_request";
    $notif_status = 0;
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    $date = date('Y-m-d H:i:s');

    try {


        $query = $conn->prepare("UPDATE brgy_request_certificate SET status =:status, message =:message, date_completed =:date_completed WHERE brgy_clearance_id =:brgy_clearance_id LIMIT 1");
        $query->bindParam(':status', $status);
        $query->bindParam(':message', $message);
        $query->bindParam(':date_completed', $date);
        $query->bindParam(':brgy_clearance_id', $brgy_clearance_id, PDO::PARAM_INT);
        $query_execute = $query->execute();

        $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Mark $certificate_type as ready to pickup | Mark by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();

        $notif = $conn->prepare("INSERT INTO notification(`notification`, `link`, `notif_status`, `res_id`, `user_id`, `brgy_clearance_id`) values (:notification, :link, :notif_status, :res_id, :user_id, :brgy_clearance_id)");
        $notif->bindParam('notification', $notification);
        $notif->bindParam('link', $link);
        $notif->bindParam('notif_status', $notif_status);
        $notif->bindParam('res_id', $resident_id, PDO::PARAM_INT);
        $notif->bindParam('user_id', $session_id);
        $notif->bindParam('brgy_clearance_id', $brgy_clearance_id, PDO::PARAM_INT);
        $notif->execute();


        if ($query_execute) {
            $_SESSION['success'] = 'Mark as ready to pickup successfully';
            $_SESSION['success_status'] = 'success';
            header("location: ../request_certificate.php");
            exit(0);
        }else {
            $_SESSION['success'] = "failed";
            $_SESSION['success_status'] = "error";
            header("location: ../request_certificate.php");
            exit(0);
        }

    } catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }   

} 



// completed request

 if (isset($_POST['completed'])) {
    $brgy_clearance_id = $_POST['brgy_clearance_id'];
    $resident_id = $_POST['resident_id'];
    $certificate_type = $_POST['certificate_type'];
    $status = 'completed';
    $notification = "$certificate_type request is now completed";
    $link = "my_request";
    $notif_status = 0;
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
    $date = date('Y-m-d H:i:s');
    $revenue_status = "done";

    try {


        $query = $conn->prepare("UPDATE brgy_request_certificate SET status =:status, message =:message, date_completed =:date_completed, revenue_status =:revenue_status WHERE brgy_clearance_id =:brgy_clearance_id LIMIT 1");
        $query->bindParam(':status', $status);
        $query->bindParam(':message', $message);
        $query->bindParam(':date_completed', $date);
        $query->bindParam(':revenue_status', $revenue_status);
        $query->bindParam(':brgy_clearance_id', $brgy_clearance_id, PDO::PARAM_INT);
        $query_execute = $query->execute();

        $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Mark $certificate_type as completed | Mark by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();

        $notif = $conn->prepare("INSERT INTO notification(`notification`, `link`, `notif_status`, `res_id`, `user_id`, `brgy_clearance_id`) values (:notification, :link, :notif_status, :res_id, :user_id, :brgy_clearance_id)");
        $notif->bindParam('notification', $notification);
        $notif->bindParam('link', $link);
        $notif->bindParam('notif_status', $notif_status);
        $notif->bindParam('res_id', $resident_id, PDO::PARAM_INT);
        $notif->bindParam('user_id', $session_id);
        $notif->bindParam('brgy_clearance_id', $brgy_clearance_id, PDO::PARAM_INT);
        $notif->execute();


        if ($query_execute) {
            $_SESSION['success'] = 'Mark as completed successfully';
            $_SESSION['success_status'] = 'success';
            header("location: ../request_certificate.php");
            exit(0);
        }else {
            $_SESSION['success'] = "failed";
            $_SESSION['success_status'] = "error";
            header("location: ../request_certificate.php");
            exit(0);
        }

    } catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }   

} 