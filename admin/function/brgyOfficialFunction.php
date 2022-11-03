<?php
require '../include/session.php';
require '../include/database.php';

// add official
if (isset($_POST['add_official'])) 
{
	$fname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
	$mname = filter_input(INPUT_POST, 'middlename', FILTER_SANITIZE_SPECIAL_CHARS);
	$lname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
	$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);
	$chairmanship = filter_input(INPUT_POST, 'chairmanship', FILTER_SANITIZE_SPECIAL_CHARS);
	$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_SPECIAL_CHARS);
	$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_SPECIAL_CHARS);

	$image=$_FILES['image']['name'];

   	$folder = 'img/'. $_FILES["image"]["name"];

	// check file extension variable
	$allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
	$filename = $_FILES['image']['name'];
	$file_extension = pathinfo($filename, PATHINFO_EXTENSION);
	$default = 'img/person.png';
	

	try {
		
		if(empty($image)){
			$query = $conn->prepare("INSERT INTO `brgy_official`(`firstname`, `middlename`, `lastname`, `position`, `chairmanship`, `start_term`, `end_term`, `picture`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$query->bindParam(1, $fname);
			$query->bindParam(2, $mname);
			$query->bindParam(3, $lname);
			$query->bindParam(4, $position);
			$query->bindParam(5, $chairmanship);
			$query->bindParam(6, $start);
			$query->bindParam(7, $end);
			$query->bindParam(8, $default);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Add Brgy. Official $fname ". $lname ." | Added by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();


			if ($query_execute) {
            $_SESSION['success'] = "Brgy. Official added successfully";
            $_SESSION['success_status'] = "success";
            header("location: ../add_brgy_official.php");
            exit(0);
	        }else {
	            $_SESSION['success'] = "official not added";
	            $_SESSION['success_status'] = "error";
	            header("location: ../add_brgy_official.php");
	            exit(0);
	        }

		}
		// check file extension
		elseif (!in_array($file_extension, $allowed_extension)) {
			$_SESSION['success'] = "You are not allowed to insert that type of file.";
			$_SESSION['success_status'] = "warning";
			header("location: ../add_brgy_official.php");
		}
		elseif (!empty($image) ) {
			$query = $conn->prepare("INSERT INTO `brgy_official`(`firstname`, `middlename`, `lastname`, `position`, `chairmanship`, `start_term`, `end_term`, `picture`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$query->bindParam(1, $fname);
			$query->bindParam(2, $mname);
			$query->bindParam(3, $lname);
			$query->bindParam(4, $position);
			$query->bindParam(5, $chairmanship);
			$query->bindParam(6, $start);
			$query->bindParam(7, $end);
			$query->bindParam(8, $folder);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Add Brgy. Official $fname ". $lname ." | Added by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			if ($query_execute) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]); 
			$_SESSION['success'] = "Brgy. Official added successfully!";
			$_SESSION['success_status'] = "success";
			header("location: ../add_brgy_official.php");
            exit(0);
	        }else {
	            $_SESSION['success'] = "official not added";
	            $_SESSION['success_status'] = "error";
	            header("location: ../add_brgy_official.php");
	            exit(0);
	        }
			
		}
		else{
			// insert data with all the requirements
			$query = $conn->prepare("INSERT INTO `brgy_official`(`firstname`, `middlename`, `lastname`, `position`, `chairmanship`, `start_term`, `end_term`, `picture`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$query->bindParam(1, $fname);
			$query->bindParam(2, $mname);
			$query->bindParam(3, $lname);
			$query->bindParam(4, $position);
			$query->bindParam(5, $chairmanship);
			$query->bindParam(6, $start);
			$query->bindParam(7, $end);
			$query->bindParam(8, $folder);
			$query_execute = $query->execute();
			if ($query_execute) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]); 
			$_SESSION['success'] = "Brgy. Official added successfully!";
			$_SESSION['success_status'] = "success";
			header("location: ../add_brgy_official.php");
            exit(0);
	        }else {
	            $_SESSION['success'] = "official not added";
	            $_SESSION['success_status'] = "error";
	            header("location: ../add_brgy_official.php");
	            exit(0);
	        }
		}
	} catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

}
// add official end


// update official
if (isset($_POST['update'])) {
	$brgy_official_id = $_POST['brgy_official_id'];
	$fname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
	$mname = filter_input(INPUT_POST, 'middlename', FILTER_SANITIZE_SPECIAL_CHARS);
	$lname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
	$position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);
	$chairmanship = filter_input(INPUT_POST, 'chairmanship', FILTER_SANITIZE_SPECIAL_CHARS);
	$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_SPECIAL_CHARS);
	$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_SPECIAL_CHARS);
	$new_image = $_FILES['image']['name'];
	$current_image = $_POST['current_image'];


	try {
		// if variable new_image has value it will update the filename to img/"name of file"
		if ($new_image != '') {
			$update_filename = "img/" . $_FILES['image']['name'];
		}
		// else it will upload variable current_image to the database
		else
		{
			$update_filename = $current_image;
		}
		if ($_FILES['image']['name'] !='') 
		{
			$query = $conn->prepare("UPDATE brgy_official SET firstname=:fname, middlename=:mname, lastname=:lname,position=:position, 
				chairmanship=:chairmanship, start_term=:start, end_term=:end, picture=:update_filename WHERE brgy_official_id=:brgy_official_id LIMIT 1");
			$query->bindParam(':fname', $fname);
			$query->bindParam(':mname', $mname);
			$query->bindParam(':lname', $lname);
			$query->bindParam(':position', $position);
			$query->bindParam(':chairmanship', $chairmanship);
			$query->bindParam(':start', $start);
			$query->bindParam(':end', $end);
			$query->bindParam(':update_filename', $update_filename);
			$query->bindParam(':brgy_official_id', $brgy_official_id, PDO::PARAM_INT);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Update Brgy. Official $fname ". $lname ." | Updated by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			if ($query_execute) {
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				unlink("../img/".$current_image);

				$_SESSION['success'] = "Brgy. Official updated successfully!";
				$_SESSION['success_status'] = "success";
				header("location: ../brgy_officials.php");
				exit(0);
			}else{
				$_SESSION['success'] = "Something went wrong!";
				$_SESSION['success_status'] = "error";
				header("location: ../brgy_officials.php");
				exit(0);
			}
		}else
		{
			$query = $conn->prepare("UPDATE brgy_official SET firstname=:fname, middlename=:mname, lastname=:lname,position=:position, 
				chairmanship=:chairmanship, start_term=:start, end_term=:end, picture=:update_filename WHERE brgy_official_id=:brgy_official_id LIMIT 1");
			$query->bindParam(':fname', $fname);
			$query->bindParam(':mname', $mname);
			$query->bindParam(':lname', $lname);
			$query->bindParam(':position', $position);
			$query->bindParam(':chairmanship', $chairmanship);
			$query->bindParam(':start', $start);
			$query->bindParam(':end', $end);
			$query->bindParam(':update_filename', $update_filename);
			$query->bindParam(':brgy_official_id', $brgy_official_id, PDO::PARAM_INT);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Update Brgy. Official $fname ". $lname ." | Updated by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			if ($query_execute) {
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				unlink("../img/".$current_image);

				$_SESSION['success'] = "Brgy. Official updated successfully!";
				$_SESSION['success_status'] = "success";
				header("location: ../brgy_officials.php");
				exit(0);
			}else{
				$_SESSION['success'] = "Something went wrong!";
				$_SESSION['success_status'] = "error";
				header("location: ../brgy_officials.php");
				exit(0);
			}
			
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
}

// update official end



// delete official
if (isset($_POST['delete_offi'])) {
 	$id = $_POST['delete_offi'];
 	$firstname = $_POST['firstname'];
 	$lastname = $_POST['lastname'];

 	try {

 		$query = $conn->prepare("DELETE FROM brgy_official WHERE brgy_official_id = ? LIMIT 1");
 		$query->bindParam(1, $id, PDO::PARAM_INT);
 		$query_execute = $query->execute();

 		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Delete Brgy. Official $firstname ". $lastname ." | Deleted by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

 		if ($query_execute) {
            $_SESSION['success'] = "Brgy. official deleted successfully";
            $_SESSION['success_status'] = "success";
            header("location: ../brgy_officials.php");
            exit(0);
        }else {
            $_SESSION['success'] = "Official not deleted!";
            $_SESSION['success_status'] = "error";
            header("location: ../brgy_officials.php");
            exit(0);
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
    
 	}
 }
 // delete offcial end