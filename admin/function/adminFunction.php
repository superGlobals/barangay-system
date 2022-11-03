<?php
require '../include/session.php';
require '../include/database.php';


// add admin
if (isset($_POST['addUser'])) {
	$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
	$user_type = $_POST['user_type'];
	$image = $_FILES['image']['name'];
	$folder = 'img/'. $_FILES["image"]["name"];
	$photo = "img/person.png";

	$hash = password_hash($password, PASSWORD_DEFAULT);
	// $uppercase = preg_match('@[A-Z]@', $password);
	$number = preg_match('@[0-9]@', $password);

	// check file extension variable
	$allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
	$filename = $_FILES['image']['name'];
	$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

	$validate = $conn->prepare("SELECT * FROM user WHERE username =:username");
	$validate->bindParam('username', $username);
	$validate->execute();
	$count = $validate->rowCount();

	

	try {
		if(!$number|| strlen($password) < 8){
		$_SESSION['success'] = "Please choose another password!";
		$_SESSION['success_status'] = "warning";
		$_SESSION['fullname'] = "$fullname";
		$_SESSION['username'] = "$username";
		$_SESSION['password'] = "$password";
		$_SESSION['user_type'] = "$user_type";
		header("location: ../add_new_user.php");
		// insert data without image
		}
		elseif ($count > 0) {
		$_SESSION['success'] = "Please choose another username!";
		$_SESSION['success_status'] = "warning";
		$_SESSION['fullname'] = "$fullname";
		$_SESSION['username'] = "$username";
		$_SESSION['password'] = "$password";
		$_SESSION['user_type'] = "$user_type";
		header("location: ../add_new_user.php");
		}
		elseif (empty($image)) {
			$query = $conn->prepare("INSERT INTO `user`( `fullname`, `username`, `password`, `user_type`, `photo`) VALUES (:fullname, :username, :password, :user_type, :photo)");
			$query->bindParam('fullname', $fullname);
			$query->bindParam('username', $username);
			$query->bindParam('password', $hash);
			$query->bindParam('user_type', $user_type);
			$query->bindParam('photo', $photo);
			$query_execute = $query->execute();

				$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
		        $date_now = date('Y-m-d H:i:s');
		        $action = "Add New User $fullname | Added by $username_sess";
		        $stmt = $conn->prepare($activity_log);
		        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
		        $stmt->bindParam(':date_now', $date_now);
		        $stmt->bindParam(':action', $action);
		        $stmt->execute();

				if ($query_execute) {
		            $_SESSION['success'] = "New user added successfully!";
					$_SESSION['success_status'] = "success";
					header("location: ../new_user.php");
		            exit(0);
		        }else {
		            $_SESSION['success'] = "New usern not added successfully!";
					$_SESSION['success_status'] = "error";
					header("location: ../new_user.php");
		            exit(0);
		        }

			
		}// check file extension
		elseif (!in_array($file_extension, $allowed_extension)) {
			$_SESSION['success'] = "You are allowed with only jpg, png, jpeg and gif type";
			$_SESSION['success_status'] = "error";
			header("location: ../new_user.php");
		}else{
			$query = $conn->prepare("INSERT INTO `user`( `fullname`, `username`, `password`, `user_type`, `photo`) VALUES (:fullname, :username, :password, :user_type, :photo)");
			$query->bindParam('fullname', $fullname);
			$query->bindParam('username', $username);
			$query->bindParam('password', $hash);
			$query->bindParam('user_type', $user_type);
			$query->bindParam('photo', $folder);
			$query_execute = $query->execute();

				$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
		        $date_now = date('Y-m-d H:i:s');
		        $action = "Add New User $fullname | Added by $username_sess";
		        $stmt = $conn->prepare($activity_log);
		        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
		        $stmt->bindParam(':date_now', $date_now);
		        $stmt->bindParam(':action', $action);
		        $stmt->execute();

				if ($query_execute) {
		            $_SESSION['success'] = "New user added successfully!";
					$_SESSION['success_status'] = "success";
					header("location: ../new_user.php");
		            exit(0);
		        }else {
		            $_SESSION['success'] = "New usern not added successfully!";
					$_SESSION['success_status'] = "error";
					header("location: ../new_user.php");
		            exit(0);
		        }
		
		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}
	
	
}

// add admin end


// delete admin

if(isset($_POST['deleteAdmin'])){
	$photo = $_POST['photo'];
	$user_id = $_POST['user_id'];
	$fullname = $_POST['fullname'];

	try {

		$query = $conn->prepare("DELETE FROM user WHERE user_id =:id LIMIT 1");
		$query->bindParam(':id', $user_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Delete Resident $fullname | Deleted by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

		if($query_execute){
			// delete photo from folder
			 unlink("../".$photo);
			$_SESSION['success'] = 'User deleted successfully!';
			$_SESSION['success_status'] = 'success';
			header('location: ../new_user.php');
			exit(0);
		}else{
			$_SESSION['success'] = 'User not deleted!';
			$_SESSION['success_status'] = 'error';
			header('location: ../new_user.php');
			exit(0);
		}

	} catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}
	
}



// delete admin end




// update admin


if (isset($_POST['updateAdmin'])) {
	$user_id = $_POST['user_id'];
	$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
	$user_type = $_POST['user_type'];
	$new_image = $_FILES['image']['name'];
	$current_image = $_POST['current_image'];
	$hash = password_hash($password, PASSWORD_DEFAULT);


	try {

		// if variable new_image has value it will update the filename to img/"name of file"
		if ($new_image != '') {
			$update_filename = "img/" . $_FILES['image']['name'];
		}
		// else it will upload variable current_image to the database
		else
		{
			$update_filename = $current_image;
		}if (empty($password)) {
			$query = $conn->prepare("UPDATE `user` SET `fullname`=:fullname,`username`=:username,`user_type`=:user_type,`photo`=:photo WHERE user_id =:user_id LIMIT 1");
			$query->bindParam('fullname', $fullname);
			$query->bindParam('username', $username);
			$query->bindParam('user_type', $user_type);
			$query->bindParam('photo', $update_filename);
			$query->bindParam('user_id', $user_id, PDO::PARAM_INT);

			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Update User $fullname | Updated by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

	        if ($query_execute && $current_image == 'img/profile.png') {
	        	move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				// unlink("../img/".$current_image);

				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../new_user.php");
	        }

			elseif ($query_execute) {
				unlink("../".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				
				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../new_user.php");
			}else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: ../new_user.php");
			}
		}
		elseif ($_FILES['image']['name'] !='') 
		{
		$query = $conn->prepare("UPDATE `user` SET `fullname`=:fullname,`username`=:username,`password`=:password,`user_type`=:user_type,`photo`=:photo WHERE user_id =:user_id ");
		$query->bindParam('fullname', $fullname);
		$query->bindParam('username', $username);
		$query->bindParam('password', $hash);
		$query->bindParam('user_type', $user_type);
		$query->bindParam('photo', $update_filename);
		$query->bindParam('user_id', $user_id, PDO::PARAM_INT);

		$query_execute = $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Update User $ullname | Updated by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			 if ($query_execute && $current_image == 'img/profile.png') {
	        	move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				// unlink("../img/".$current_image);

				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../new_user.php");
	        }

			elseif ($query_execute) {
				unlink("../".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				
				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../new_user.php");
			}else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: ../new_user.php");
			}
		}else
		{
			$query = $conn->prepare("UPDATE `user` SET `fullname`=:fullname,`username`=:username,`password`=:password,`user_type`=:user_type,`photo`=:photo WHERE user_id =:user_id ");
			$query->bindParam('fullname', $fullname);
			$query->bindParam('username', $username);
			$query->bindParam('password', $hash);
			$query->bindParam('user_type', $user_type);
			$query->bindParam('photo', $update_filename);
			$query->bindParam('user_id', $user_id, PDO::PARAM_INT);

			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
		        $date_now = date('Y-m-d H:i:s');
		        $action = "Update User $ullname | Updated by $username_sess";
		        $stmt = $conn->prepare($activity_log);
		        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
		        $stmt->bindParam(':date_now', $date_now);
		        $stmt->bindParam(':action', $action);
		        $stmt->execute();

				 if ($query_execute && $current_image == 'img/profile.png') {
	        	move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				// unlink("../img/".$current_image);

				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../new_user.php");
	        }

			elseif ($query_execute) {
				unlink("../".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				
				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../new_user.php");
			}else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: ../new_user.php");
			}
			
		}


	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}


// update admin end


// update one profile

if (isset($_POST['updateProfile'])) {
	$user_id = $_POST['user_id'];
	$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
	$user_type = $_POST['user_type'];
	$new_image = $_FILES['image']['name'];
	$current_image = $_POST['current_image'];
	$hash = password_hash($password, PASSWORD_DEFAULT);


	try {

		// if variable new_image has value it will update the filename to img/"name of file"
		if ($new_image != '') {
			$update_filename = "img/" . $_FILES['image']['name'];
		}
		// else it will upload variable current_image to the database
		else
		{
			$update_filename = $current_image;
		}if (empty($password)) {
			$query = $conn->prepare("UPDATE `user` SET `fullname`=:fullname,`username`=:username,`user_type`=:user_type,`photo`=:photo WHERE user_id =:user_id LIMIT 1");
			$query->bindParam('fullname', $fullname);
			$query->bindParam('username', $username);
			$query->bindParam('user_type', $user_type);
			$query->bindParam('photo', $update_filename);
			$query->bindParam('user_id', $user_id, PDO::PARAM_INT);

			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Update User $fullname | Updated by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

	        if ($query_execute && $current_image == 'img/profile.png') {
	        	move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				// unlink("../img/".$current_image);

				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../my_profile.php");
	        }

			elseif ($query_execute) {
				unlink("../".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				
				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../my_profile.php");
			}else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: ../my_profile.php");
			}
		}
		elseif ($_FILES['image']['name'] !='') 
		{
		$query = $conn->prepare("UPDATE `user` SET `fullname`=:fullname,`username`=:username,`password`=:password,`user_type`=:user_type,`photo`=:photo WHERE user_id =:user_id ");
		$query->bindParam('fullname', $fullname);
		$query->bindParam('username', $username);
		$query->bindParam('password', $hash);
		$query->bindParam('user_type', $user_type);
		$query->bindParam('photo', $update_filename);
		$query->bindParam('user_id', $user_id, PDO::PARAM_INT);

		$query_execute = $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Update User $ullname | Updated by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			if ($query_execute && $current_image == 'img/profile.png') {
	        	move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				// unlink("../img/".$current_image);

				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../my_profile.php");
	        }elseif ($query_execute) {
				unlink("../".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				
				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../my_profile.php");
			}else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: ../my_profile.php");
			}
		}else
		{
			$query = $conn->prepare("UPDATE `user` SET `fullname`=:fullname,`username`=:username,`password`=:password,`user_type`=:user_type,`photo`=:photo WHERE user_id =:user_id ");
			$query->bindParam('fullname', $fullname);
			$query->bindParam('username', $username);
			$query->bindParam('password', $hash);
			$query->bindParam('user_type', $user_type);
			$query->bindParam('photo', $update_filename);
			$query->bindParam('user_id', $user_id, PDO::PARAM_INT);

			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
		        $date_now = date('Y-m-d H:i:s');
		        $action = "Update User $ullname | Updated by $username_sess";
		        $stmt = $conn->prepare($activity_log);
		        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
		        $stmt->bindParam(':date_now', $date_now);
		        $stmt->bindParam(':action', $action);
		        $stmt->execute();

				if ($query_execute && $current_image == 'img/profile.png') {
	        	move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				// unlink("../img/".$current_image);

				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../my_profile.php");
	        }elseif ($query_execute) {
				unlink("../".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $_FILES["image"]["name"]);
				
				$_SESSION['success'] = "Profile updated successfully!";
				$_SESSION['success_status'] = 'success';
				header("location: ../my_profile.php");
			}else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: ../my_profile.php");
			}
			
		}


	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}


// update one profile end