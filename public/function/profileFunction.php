<?php

// upload id
if (isset($_POST['uploadId'])) {

	$to_verify_status = 1;
	$notif_rekta_verify = 2;
	$current_image = $_POST['current_image'];

	 // check file extension variable
	 $allowed_extension = array('png', 'jpg', 'jpeg');
	 $filename = $_FILES['image']['name'];
	 $file_extension = pathinfo($filename, PATHINFO_EXTENSION);


	$rand = rand(0, 100000);
	$rename = 'residentID'.date('Ymd').$rand;

	$newName = $rename.'.'.$file_extension;
	$folder = 'img/'. $newName;

	 try {


		// check if resident account is verified or not
		$verify = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
		$verify->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
		$verify->execute();
		while($row = $verify->fetch(PDO::FETCH_ASSOC)):
		$verification_status = $row['verification_status'];
		if (($_FILES["image"]["size"] > 3000000)) {
			$_SESSION['success'] = "Image size is too large!";
			$_SESSION['success_status'] = "error";
			header("location: my_profile");
			exit(0);
		}
		 elseif (!in_array($file_extension, $allowed_extension)) {
			$_SESSION['success'] = "You are not allowed to insert that type of file.";
			$_SESSION['success_status'] = "warning";
			header("location: my_profile");
			exit(0);
		}
		elseif($verification_status == 'Verified') {
		$_SESSION['success'] = 'Your account is already verified!';
		$_SESSION['success_status'] = 'warning';
		header("location: my_profile");
		exit(0);
		}else{
			$query = $conn->prepare("UPDATE resident SET image_verify =:image_verify, to_verify_status =:to_verify_status WHERE resident_id =:resident_id");
			$query->bindParam('image_verify', $folder);
			$query->bindParam('to_verify_status', $to_verify_status);
			$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
			$query_execute = $query->execute();

			// moving the image in the img folder
		if ($query_execute) {
			unlink("admin/".$current_image);
			move_uploaded_file($_FILES["image"]["tmp_name"], "admin/img/" . $newName); 
			$_SESSION['success'] = "Please wait for your account to be verified";
			$_SESSION['success_status'] = 'success';
			header("location: my_profile");
			exit(0);
		}else{
			$_SESSION['success'] = "Something went wrong po!";
			$_SESSION['success_status'] = 'error';
			header("location: my_profile");
			exit(0);
				}
			}
		endwhile;

	 }catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

}


// change profile pic
if (isset($_POST['chageProfile'])) {
	$new_image = $_FILES['image']['name'];
	$current_image = $_POST['current_image'];

	// check file extension variable
	 $allowed_extension = array('png', 'jpg', 'jpeg');
	 $filename = $_FILES['image']['name'];
	 $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

	 $rand = rand(0, 100000);
	 $rename = 'residentPIC'.date('Ymd').$rand;

	 $newName = $rename.'.'.$file_extension;


	try {
		if (($_FILES["image"]["size"] > 3000000)) {
			$_SESSION['success'] = "Image size is too large!";
			$_SESSION['success_status'] = "error";
			header("location: my_profile");
			exit(0);
		}
		// if variable new_image has value it will update the filename to img/"name of file"
		elseif ($new_image != '') {
			$update_filename = "img/" . $newName;

		}
		// else it will upload variable current_image to the database
		else
		{
			$update_filename = $current_image;
		}
		 if (!in_array($file_extension, $allowed_extension)) {
			$_SESSION['success'] = "You are not allowed to insert that type of file.";
			$_SESSION['success_status'] = "warning";
			header("location: my_profile");
			exit(0);
		}
		elseif ($_FILES['image']['name'] !='') 
		{
			$query = $conn->prepare("UPDATE `resident` SET `photo` =:photo WHERE resident_id =:resident_id");
			$query->bindParam('photo', $update_filename);
			$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
			$query_execute = $query->execute();

			if ($query_execute && $current_image == 'img/person.png') {
				move_uploaded_file($_FILES["image"]["tmp_name"], "admin/img/".$newName);
				
				$_SESSION['success'] = 'Profile changed successfully';
				$_SESSION['success_status'] = 'success';
				header("location: my_profile");
				exit(0);
			}elseif ($query_execute) {
				unlink("admin/".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "admin/img/".$newName);

				$_SESSION['success'] = 'Profile changed successfully!';
				$_SESSION['success_status'] = 'success';
				header("location: my_profile");
				exit(0);
			}else{
				$_SESSION['success'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");
				exit(0);
			}
			
		}else{
			$query = $conn->prepare("UPDATE `resident` SET `photo` =:photo WHERE resident_id =:resident_id");
			$query->bindParam('photo', $update_filename);
			$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
			$query_execute = $query->execute();

			if ($query_execute && $current_image == 'img/person.png') {
				move_uploaded_file($_FILES["image"]["tmp_name"], "admin/img/" . $newName);
				
				$_SESSION['success'] = 'Profile changed successfully!';
				$_SESSION['success_status'] = 'success';
				header("location: my_profile");
				exit(0);
			}

			elseif ($query_execute) {
				unlink("admin/".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "admin/img/" . $newName);

				$_SESSION['success'] = 'Profile changed successfully!';
				$_SESSION['success_status'] = 'success';
				header("location: my_profile");
				exit(0);
			}else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");
				exit(0);
			}
			
		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}


// change password

if (isset($_POST['change_pass'])) {
	$current_pass = $_POST['current_password'];
	$new_pass = $_POST['new_password'];
	$hash = password_hash($new_pass, PASSWORD_DEFAULT);
	$name = $_POST['name'];

	$check_pass = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
	$check_pass->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
	$check_pass->execute();
	$result = $check_pass->fetch(PDO::FETCH_ASSOC);

	$number = preg_match('@[0-9]@', $new_pass);

	try {

		if(!$number|| strlen($new_pass) < 8){
			$_SESSION['success'] = 'Please create a new strong password!';
			$_SESSION['success_status'] = 'error';	
			$_SESSION['current_pass'] = $current_pass;
			$_SESSION['new_pass'] = $new_pass;
			header("location: my_profile");
			exit(0);
		}
		elseif ($current_pass == $new_pass) {
			$_SESSION['success'] = 'Your new password must be different from your current password.';
			$_SESSION['success_status'] = 'error';
			$_SESSION['current_pass'] = $current_pass;
			$_SESSION['new_pass'] = $new_pass;
			header("location: my_profile");
			exit(0);
		}
		elseif (!password_verify($current_pass, $result['password'])) {
			$_SESSION['success'] = 'Current Password dont match!';
			$_SESSION['success_status'] = 'error';
			$_SESSION['current_pass'] = $current_pass;
			$_SESSION['new_pass'] = $new_pass;
			header("location: my_profile");
			exit(0);
		}
		elseif(password_verify($current_pass, $result['password'])) {
			$query = $conn->prepare("UPDATE resident SET password =:password WHERE resident_id =:resident_id");
			$query->bindParam('password', $hash);
			$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `action`) VALUES (:session_id, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "$name updated his/her password.";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $_SESSION['unique_id'], PDO::PARAM_INT);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			if ($query_execute) {
			 	$_SESSION['success'] = 'Password Change successfully!';
				 $_SESSION['success_status'] = 'success';
				header("location: my_profile");
			     exit(0);
			}else {

				$_SESSION['success'] = 'Error changing password';
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");
			    exit(0);
			     
		    }
			
		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}
	
}


// update profile

if (isset($_POST['updateInfo'])) {
	$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
	$middlename =  filter_input(INPUT_POST, 'middlename', FILTER_SANITIZE_SPECIAL_CHARS);
	$lastname =  filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
	$purok = filter_input(INPUT_POST, 'purok', FILTER_SANITIZE_SPECIAL_CHARS);
	$brgy = filter_input(INPUT_POST, 'brgy', FILTER_SANITIZE_SPECIAL_CHARS);
	$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
	$province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_SPECIAL_CHARS);
	$citizenship =filter_input(INPUT_POST, 'citizenship', FILTER_SANITIZE_SPECIAL_CHARS);
	$religion =filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_SPECIAL_CHARS);
	$gender =filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
	$bdate = filter_input(INPUT_POST, 'bdate', FILTER_SANITIZE_SPECIAL_CHARS);
	$birthplace =filter_input(INPUT_POST, 'birthplace', FILTER_SANITIZE_SPECIAL_CHARS);
	$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_SPECIAL_CHARS);
	$civil_status =filter_input(INPUT_POST, 'civil_status', FILTER_SANITIZE_SPECIAL_CHARS);
	$profession =filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_SPECIAL_CHARS);
	$yearsresidency =filter_input(INPUT_POST, 'years_residency', FILTER_SANITIZE_SPECIAL_CHARS);
	// $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	$contactnumber = filter_input(INPUT_POST, 'contact_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$voters_status = filter_input(INPUT_POST, 'voters_status', FILTER_SANITIZE_SPECIAL_CHARS);
	$name = $firstname.' '.$lastname;

	try {
		$query = $conn->prepare("UPDATE `resident` SET `firstname`=:firstname,`middlename`=:middlename,`lastname`=:lastname,`purok`=:purok,`brgy`=:brgy,`city`=:city,`province`=:province,`citizenship`=:citizenship,`religion`=:religion,`gender`=:gender,`birthdate`=:birthdate,`birthplace`=:birthplace,`age`=:age,`civil_status`=:civil_status,`profession_occupation`=:profession,`years_of_residency`=:years_of_residency,`contact_no`=:contact_no,`voters_status`=:voters_status WHERE resident_id =:resident_id");
		$query->bindParam('firstname', $firstname);
		$query->bindParam('middlename', $middlename);
		$query->bindParam('lastname', $lastname);
		$query->bindParam('purok', $purok);
		$query->bindParam('brgy', $brgy);
		$query->bindParam('city', $city);
		$query->bindParam('province', $province);
		$query->bindParam('citizenship', $citizenship);
		$query->bindParam('religion', $religion);
		$query->bindParam('gender', $gender);
		$query->bindParam('birthdate', $bdate);
		$query->bindParam('birthplace', $birthplace);
		$query->bindParam('age', $age);
		$query->bindParam('civil_status', $civil_status);
		$query->bindParam('profession', $profession);
		$query->bindParam('years_of_residency', $yearsresidency);
		$query->bindParam('contact_no', $contactnumber);
		$query->bindParam('voters_status', $voters_status);
		$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);

		$activity_log = "INSERT INTO `activity_log`(`username`, `action`) VALUES (:session_id, :action)";
        $action = "$name updated his/her Information";
        $stmt = $conn->prepare($activity_log);
        $stmt->bindParam('session_id', $_SESSION['unique_id'], PDO::PARAM_INT);
        $stmt->bindParam('action', $action);
        $stmt->execute();

        if (empty($citizenship && $religion && $bdate && $birthplace && $profession && $yearsresidency  && $contactnumber)) {
        	$_SESSION['success'] = "Please fill up all fields!";
			$_SESSION['success_status'] = "warning";
			header("location: update_my_info");
		    exit(0);
        }

        if (strlen($contactnumber) != 11) {
        	$_SESSION['success'] = "The contact number should only have 11 digits.";
        	$_SESSION['success_status'] = 'warning';
			header("location: update_my_info");
		    exit(0);
        }elseif ($query->execute()) {
		 	$_SESSION['success'] = 'Info updated successfully';
			$_SESSION['success_status'] = 'success';
			header("location: update_my_info");
		    exit(0);
		}else {

			$_SESSION['success'] = 'Error changing password';
			$_SESSION['success_status'] = 'error';
			header("location: my_profile");
		    exit(0);
		     
	    }
	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}


	

}