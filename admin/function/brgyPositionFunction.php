<?php
require '../include/session.php';
require '../include/database.php';

// add position
if (isset($_POST['add_position'])) {
	$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("INSERT INTO `position`(`position`) VALUES (?)");
		$query->bindParam(1, $position);
		$query_execute = $query->execute();


        $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Add Position $position | Added by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();



		if ($query_execute) {
            $_SESSION['success'] = "Brgy. Position successfully added";
            $_SESSION['success_status'] = "success";
            header("location: ../brgy_position.php");
            exit(0);
        }else {
            $_SESSION['success'] = "position not added";
            $_SESSION['success_status'] = "error";
            header("location: ../brgy_position.php");
            exit(0);
        }
    } catch (PDOException $e) {

        echo "My Error Type:". $e->getMessage();
    }
	
}
// add position end


// delete position

if (isset($_POST['delete_position'])) {
	$position_id = $_POST['delete_position'];
    $position = $_POST['position'];

	try {

		$query = $conn->prepare("DELETE FROM position WHERE position_id = ? LIMIT 1");
		$query->bindParam(1, $position_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

        $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Delete Position $position | Deleted by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();

		if ($query_execute) {
            $_SESSION['success'] = "Position deleted successfully!";
            $_SESSION['success_status'] = "success";
            header("location: ../brgy_position.php");
            exit(0);
        }else {
            $_SESSION['success'] = "Position not deleted!";
            $_SESSION['success_status'] = "error";
            header("location: ../brgy_position.php");
            exit(0);
        }
    } catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }
	
}


// delete position end


// update position 

if (isset($_POST['update_position'])) {
	$position_id = $_POST['position_id'];
	$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("UPDATE position SET position=:position WHERE position_id=:id LIMIT 1");
		$query->bindParam(':position', $position);
		$query->bindParam(':id', $position_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

        $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Update Position $position | Updated by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();


		if ($query_execute) {
            $_SESSION['success'] = "Position updated successfully!";
            $_SESSION['success_status'] = "success";
            header("location: ../brgy_position.php");
            exit(0);
        }else {
            $_SESSION['success'] = "Position not updated!";
            $_SESSION['success_status'] = "error";
            header("location: ../brgy_position.php");
            exit(0);
        }
    } catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }
}

// update position end


// add committe

if (isset($_POST['add_committee'])) {
	$chairmanship = filter_input(INPUT_POST, 'chairmanship', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("INSERT INTO chairmanship(chairmanship) VALUES (?)");
		$query->bindParam(1, $chairmanship);
		$query_execute = $query->execute();

        $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Add Committee $chairmanship | Added by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();
		
		if ($query_execute) {
            $_SESSION['success'] = 'Committee successfully added!';
			$_SESSION['success_status'] = "success";
			header("location: ../brgy_position.php");
            exit(0);
        }else {
            $_SESSION['success'] = "committee not updated!";
            $_SESSION['success_status'] = "error";
            header("location: ../brgy_position.php");
            exit(0);
        }
    } catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }
}
// add committe end


// delete committe

if (isset($_POST['delete_commi'])) {
	$chairmanship = $_POST['delete_commi'];
    $committee = $_POST['committee'];

	try {

		$query = $conn->prepare("DELETE FROM chairmanship WHERE chairmanship_id = ? LIMIT 1");
		$query->bindParam(1, $chairmanship, PDO::PARAM_INT);
		$query_execute = $query->execute();

        $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Delete Committee $committee | Deleted by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();

		if ($query_execute) {
            $_SESSION['success'] = "Committee deleted successfully!";
            $_SESSION['success_status'] = "success";
            header("location: ../brgy_position.php");
            exit(0);
        }else {
            $_SESSION['success'] = "committee not deleted!";
            $_SESSION['success_status'] = "error";
            header("location: ../brgy_position.php");
            exit(0);
        }
    } catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }
	
}

// delete committee end



// update committe
if (isset($_POST['update_commi'])) {
	$chairmanship_id = $_POST['chairmanship_id'];
	$chairmanship = filter_input(INPUT_POST, 'chairmanship', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("UPDATE chairmanship SET chairmanship=:chairmanship WHERE chairmanship_id=:id LIMIT 1");
		$query->bindParam(':chairmanship', $chairmanship);
		$query->bindParam(':id', $chairmanship_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

        $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
        $date_now = date('Y-m-d H:i:s');
        $action = "Update $chairmanship | Updated by $username_sess";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_now', $date_now);
        $stmt->bindParam(':action', $action);
        $stmt->execute();

		if ($query_execute) {
            $_SESSION['success'] = "Committee updated successfully!";
            $_SESSION['success_status'] = "success";
            header("location: ../brgy_position.php");
            exit(0);
        }else {
            $_SESSION['success'] = "Committee not updated!";
            $_SESSION['success_status'] = "error";
            header("location: ../brgy_position.php");
            exit(0);
        }
    } catch(PDOException $e) {
        echo "My Error Type:". $e->getMessage();
    }
}


// update committe end