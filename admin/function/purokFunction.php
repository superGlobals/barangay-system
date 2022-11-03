<?php
require '../include/session.php';
require '../include/database.php';


// add purpk
if (isset($_POST['addPurok'])) {
	$purok = filter_input(INPUT_POST, 'purok', FILTER_SANITIZE_SPECIAL_CHARS);
	$details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("INSERT INTO `purok`(`purok`, `details`) VALUES (:purok, :details)");
		$query->bindParam('purok', $purok);
		$query->bindParam('details', $details);
		$query_execute = $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	    $date_now = date('Y-m-d H:i:s');
	    $action = "Add New Purok $purok | Added by $username_sess";
	    $stmt = $conn->prepare($activity_log);
	    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	    $stmt->bindParam(':date_now', $date_now);
	    $stmt->bindParam(':action', $action);
	    $stmt->execute();

		if ($query_execute) {
	        $_SESSION['success'] = 'New Purok added successfully';
			$_SESSION['success_status'] = 'success';
			header("location: ../purok.php");
	        exit(0);
	    }else {
	        $_SESSION['success'] = 'New Purok not added successfully!';
			$_SESSION['success_status'] = 'success';
			header("location: ../purok.php");
	        exit(0);
	    }

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}
	
}

// add purok end



// delete purok

if(isset($_POST['deletePurok'])){
	$purok_id = $_POST['purok_id'];
	$purok = $_POST['purok'];

	try {

		$query = $conn->prepare("DELETE FROM purok WHERE purok_id =:id LIMIT 1");
		$query->bindParam(':id', $purok_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Delete Purok $purok | Deleted by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

		if($query_execute){
			// delete photo from folder
			 unlink("../".$photo);
			$_SESSION['success'] = 'Purok deleted successfully!';
			$_SESSION['success_status'] = 'success';
			header('location: ../purok.php');
			exit(0);
		}else{
			$_SESSION['success'] = 'Purok not deleted!';
			$_SESSION['success_status'] = 'error';
			header('location: ../purok.php');
			exit(0);
		}

	} catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}
	
}



// delete purok end




// update purok

if (isset($_POST['updatePurok'])) {
	$purok_id = $_POST['purok_id'];
	$purok = filter_input(INPUT_POST, 'purok', FILTER_SANITIZE_SPECIAL_CHARS);
	$details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_SPECIAL_CHARS);

	$query = $conn->prepare("UPDATE purok SET purok =:purok, details =:details WHERE purok_id =:purok_id LIMIT 1");
	$query->bindParam('purok', $purok);
	$query->bindParam('details', $details);
	$query->bindParam('purok_id', $purok_id, PDO::PARAM_INT);
	$query_execute = $query->execute();

	$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
    $date_now = date('Y-m-d H:i:s');
    $action = "Update Purok $purok | Updated by $username_sess";
    $stmt = $conn->prepare($activity_log);
    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
    $stmt->bindParam(':date_now', $date_now);
    $stmt->bindParam(':action', $action);
    $stmt->execute();

	if ($query_execute) {
        $_SESSION['success'] = 'Purok updated successfully!';
		$_SESSION['success_status'] = 'success';
		header('location: ../purok.php');
        exit(0);
    }else {
        $_SESSION['success'] = 'Purok NOT updated';
		$_SESSION['success_status'] = 'error';
		header('location: ../purok.php');
        exit(0);
    }
}


// update purok end
