<?php
require '../include/session.php';
require '../include/database.php';

// add blotter

if (isset($_POST['add_blotter'])) {
	$date = $_POST['date'];
	$time = $_POST['time'];
	$complainant = $_POST['complainant'];
	$complained = $_POST['complained'];
	$status = $_POST['status'];
	$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
	date_default_timezone_set('Asia/Manila');
	$notification = "$complainant blotter you";
	$link = "blotter";
	$notif_status = 0;

	try {

		foreach ($complained as $nirereklamo){
		$query = $conn->prepare("INSERT INTO blotter (complainant, complained_resident, date_of_filling, time_of_filling, status, description) VALUES (:complainant, :complained, :date_filling, :time_filling, :status, :description)");
		$query->bindParam(':complainant', $complainant);
		$query->bindParam(':complained', $nirereklamo);
		$query->bindParam(':date_filling', $date);
		$query->bindParam(':time_filling', $time);
		$query->bindParam(':status', $status);
		$query->bindParam(':description', $description);
		$query_execute = $query->execute();

		$update_query = "UPDATE resident SET blotter_records =:blotter_status WHERE resident_id =:id LIMIT 1";
		$query = $conn->prepare($update_query);
		$query->bindParam(':blotter_status', $status);
		$query->bindParam(':id', $nirereklamo, PDO::PARAM_INT);
		$query->execute();

		}

		$notif = $conn->prepare("INSERT INTO notification(`notification`, `link`, `notif_status`, `res_id`, `user_id`) values (:notification, :link, :notif_status, :res_id, :user_id)");
        $notif->bindParam('notification', $notification);
        $notif->bindParam('link', $link);
        $notif->bindParam('notif_status', $notif_status);
        $notif->bindParam('res_id', $complained, PDO::PARAM_INT);
        $notif->bindParam('user_id', $session_id);
        $notif->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
		$date_now = date('Y-m-d H:i:s');
		$action = 'Add Blotter by $username_sess';
		$stmt = $conn->prepare($activity_log);
		$stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
		$stmt->bindParam(':date_now', $date_now);
		$stmt->bindParam(':action', $action);
		$stmt->execute();

		if ($query_execute) {
	        $_SESSION['success'] = 'New blotter added successfully!';
			$_SESSION['success_status'] = 'success';
			header("location: ../blotter.php");
	        exit(0);
	        }else {
	        $_SESSION['success'] = ' blotter not added';
			$_SESSION['success_status'] = 'success';
			header("location: ../blotter.php");
	        exit(0);
	        }


	} catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }

}

// add blotter end



// update blotter 

if (isset($_POST['update_blotter'])) {
	$nirereklamo = $_POST['nirereklamo'];
	$blotter_id = $_POST['blotter_id'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$complainant = $_POST['complainant'];
	$complained = $_POST['complained'];
	$status = $_POST['status'];
	$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("UPDATE blotter SET complainant =:complainant, complained_resident =:complained, date_of_filling =:date_filling, time_of_filling =:time_filling, status =:status, description =:description WHERE blotter_id =:id");
		$query->bindParam(':complainant', $complainant);
		$query->bindParam(':complained', $complained);
		$query->bindParam(':date_filling', $date);
		$query->bindParam(':time_filling', $time);
		$query->bindParam(':status', $status);
		$query->bindParam(':description', $description);
		$query->bindParam(':id', $blotter_id, PDO::PARAM_INT);
		$query_execute = $query->execute();


		$update_query = "UPDATE resident SET blotter_records =:blotter_status WHERE resident_id =:id LIMIT 1";
		$query = $conn->prepare($update_query);
		$query->bindParam(':blotter_status', $status);
		$query->bindParam(':id', $nirereklamo, PDO::PARAM_INT);
		$query->execute();


		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
		$date_now = date('Y-m-d H:i:s');
		$action = 'Update Blotter Records by $username_sess';
		$stmt = $conn->prepare($activity_log);
		$stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
		$stmt->bindParam(':date_now', $date_now);
		$stmt->bindParam(':action', $action);
		$stmt->execute();


		if ($query_execute) {
	        $_SESSION['success'] = 'Blotter updated successfully!';
			$_SESSION['success_status'] = 'success';
			header("location: ../blotter.php");
	        exit(0);
	       	}else {
	        $_SESSION['success'] = ' blotter not added';
			$_SESSION['success_status'] = 'success';
			header("location: ../blotter.php");
	        exit(0);
	        }

	} catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    } 

	
}


// update blotter end



// delete blotter

if (isset($_POST['delete_commi'])) {
	$delete_commi = $_POST['delete_commi'];
    $blotter_id = $_POST['blotter_id'];

	try {

		$query = $conn->prepare("DELETE FROM blotter WHERE blotter_id =:blotter_id LIMIT 1");
		$query->bindParam(':blotter_id', $blotter_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

        $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Delete blotter by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();

		if ($query_execute) {
            $_SESSION['success'] = "Blotter deleted successfully!";
            $_SESSION['success_status'] = "success";
            header("location: ../blotter.php");
            exit(0);
        }else {
            $_SESSION['success'] = "Blotter not deleted!";
            $_SESSION['success_status'] = "error";
            header("location: ../blotter.php");
            exit(0);
        }
    } catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }
	
}




// delete blotter end