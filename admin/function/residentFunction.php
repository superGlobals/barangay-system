<?php
require '../include/session.php';
require '../include/database.php';

// add resident
if (isset($_POST['add_resident'])) {
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
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$contactnumber = filter_input(INPUT_POST, 'contact_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$voters_status = filter_input(INPUT_POST, 'voters_status', FILTER_SANITIZE_SPECIAL_CHARS);
	$temp = explode(".", $_FILES["image"]["name"]);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	$image = $_FILES['image']['name'];
	$folder = 'img/'. $_FILES["image"]["name"];

	$resident_number = rand(100000000, 900000000);
	$date_added = date('Y-m-d H:i:s');
	$status = 'alive';
	$default = 'img/person.png';


	// check file extension
	$allowed_extension = array('png', 'jpg', 'jpeg');
	$filename = $_FILES['image']['name'];
	$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

	$rand = rand(0, 100000);
	$rename = 'residentPIC'.date('Ymd').$rand;

	$newName = $rename.'.'.$file_extension;


	try {

		if (empty($image)) {
		$query = $conn->prepare("INSERT INTO `resident`(`resident_number`, `firstname`, `middlename`, `lastname`, `email`, `username`, `password`, `purok`, `date_added`, `brgy`, `city`, `province`, `citizenship`, `resident_status`, `religion`, `gender`, `birthdate`, `birthplace`, `age`, `civil_status`, `profession_occupation`, `years_of_residency`, `contact_no`, `voters_status`, `photo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$query->bindParam(1, $resident_number, PDO::PARAM_INT);
			$query->bindParam(2, $firstname);
			$query->bindParam(3, $middlename);
			$query->bindParam(4, $lastname);
			$query->bindParam(5, $email);
			$query->bindParam(6, $username);
			$query->bindParam(7, $hash);
			$query->bindParam(8, $purok, PDO::PARAM_INT);
			$query->bindParam(9, $date_added);
			$query->bindParam(10, $brgy);
			$query->bindParam(11, $city);
			$query->bindParam(12, $province);
			$query->bindParam(13, $citizenship);
			$query->bindParam(14, $status);
			$query->bindParam(15, $religion);
			$query->bindParam(16, $gender);
			$query->bindParam(17, $bdate);
			$query->bindParam(18, $birthplace);
			$query->bindParam(19, $age);
			$query->bindParam(20, $civil_status);
			$query->bindParam(21, $profession);
			$query->bindParam(22, $yearsresidency);
			$query->bindParam(23, $contactnumber);
			$query->bindParam(24, $voters_status);
			$query->bindParam(25, $default);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Add Resident $firstname ". $lastname ." | Added by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			if ($query_execute) {
	            $_SESSION['success'] = "Resident added successfully";
	            $_SESSION['success_status'] = "success";
	            header("location: ../add_new_resident.php");
	            exit(0);
	        }else {
	            $_SESSION['success'] = "Resident not added";
	            $_SESSION['success_status'] = "error";
	            header("location: ../add_new_resident.php");
	            exit(0);
	        }
	}elseif (!in_array($file_extension, $allowed_extension)) {
			$_SESSION['success'] = "You are allowed with only jpg, png, jpeg type";
			$_SESSION['success_status'] = "error";
			$_SESSION['firstname'] = "$firstname";
			$_SESSION['middlename'] = "$middlename"; 
			$_SESSION['lastname'] = "$lastname"; 
			$_SESSION['purok'] = "$purok"; 
			$_SESSION['brgy'] = "$brgy";  
			$_SESSION['city'] = "$city"; 
			$_SESSION['province'] = "$province"; 
			$_SESSION['citizenship'] = "$citizenship"; 
			$_SESSION['religion'] = "$religion"; 
			$_SESSION['gender'] = "$gender"; 
			$_SESSION['bdate'] = "$bdate";
			$_SESSION['birthplace'] = "$birthplace"; 
			$_SESSION['age'] = "$age"; 
			$_SESSION['civil_status'] = "$civil_status";  
			$_SESSION['profession'] = "$profession"; 
			$_SESSION['yearsresidency'] = "$yearsresidency"; 
			$_SESSION['contactnumber'] = "$contactnumber"; 
			$_SESSION['voters_status'] = "$voters_status"; 
			$_SESSION['email'] = "$email";
			$_SESSION['password'] = "$password";
			header("location: ../add_new_resident.php");
			exit(0);
		}
		elseif (($_FILES["image"]["size"] > 3000000)) {
			$_SESSION['success'] = "Image size exceeds 3MB!";
			$_SESSION['success_status'] = "error";
			$_SESSION['firstname'] = "$firstname";
			$_SESSION['middlename'] = "$middlename"; 
			$_SESSION['lastname'] = "$lastname"; 
			$_SESSION['purok'] = "$purok"; 
			$_SESSION['brgy'] = "$brgy";  
			$_SESSION['city'] = "$city"; 
			$_SESSION['province'] = "$province"; 
			$_SESSION['citizenship'] = "$citizenship"; 
			$_SESSION['religion'] = "$religion"; 
			$_SESSION['gender'] = "$gender"; 
			$_SESSION['bdate'] = "$bdate";
			$_SESSION['birthplace'] = "$birthplace"; 
			$_SESSION['age'] = "$age"; 
			$_SESSION['civil_status'] = "$civil_status";  
			$_SESSION['profession'] = "$profession"; 
			$_SESSION['yearsresidency'] = "$yearsresidency"; 
			$_SESSION['contactnumber'] = "$contactnumber"; 
			$_SESSION['voters_status'] = "$voters_status"; 
			$_SESSION['email'] = "$email";
			$_SESSION['password'] = "$password";
			header("location: ../add_new_resident.php");
			exit(0);
		}
		// inserting all the data
		else{
			$query = $conn->prepare("INSERT INTO `resident`(`resident_number`, `firstname`, `middlename`, `lastname`, `email`, `username`, `password`, `purok`, `date_added`, `brgy`, `city`, `province`, `citizenship`, `resident_status`, `religion`, `gender`, `birthdate`, `birthplace`, `age`, `civil_status`, `profession_occupation`, `years_of_residency`, `contact_no`, `voters_status`, `photo`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$query->bindParam(1, $resident_number, PDO::PARAM_INT);
			$query->bindParam(2, $firstname);
			$query->bindParam(3, $middlename);
			$query->bindParam(4, $lastname);
			$query->bindParam(5, $email);
			$query->bindParam(6, $username);
			$query->bindParam(7, $hash);
			$query->bindParam(8, $purok, PDO::PARAM_INT);
			$query->bindParam(9, $date_added);
			$query->bindParam(10, $brgy);
			$query->bindParam(11, $city);
			$query->bindParam(12, $province);
			$query->bindParam(13, $citizenship);
			$query->bindParam(14, $status);
			$query->bindParam(15, $religion);
			$query->bindParam(16, $gender);
			$query->bindParam(17, $bdate);
			$query->bindParam(18, $birthplace);
			$query->bindParam(19, $age);
			$query->bindParam(20, $civil_status);
			$query->bindParam(21, $profession);
			$query->bindParam(22, $yearsresidency);
			$query->bindParam(23, $contactnumber);
			$query->bindParam(24, $voters_status);
			$query->bindParam(25, $newName);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Add Resident $firstname ". $lastname ." | Added by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			// moving the image in the img folder
		if ($query_execute) {
			if ($_FILES['image']['name'] !='') {
			move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $newName); 
			$_SESSION['success'] = "Resident added successfully";
			$_SESSION['success_status'] = "success";;
			header("location: ../add_new_resident.php");
			exit(0);
			}
			

		}else{
			$_SESSION['success'] = "Error while inserting!";
			$_SESSION['success_status'] = "error";
			header("location: ../add_new_resident.php");
			exit(0);
		}

	}

	} catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}
}
// add resident end



// archive resident

if(isset($_POST['archive_resident'])){
	$photo = $_POST['photo'];
	$resident_id = $_POST['resident_id'];
	$status = "Archive";
	$account_status = "deactivated";
	$name = $_POST['name'];

	try {

		$query = $conn->prepare("UPDATE resident SET delete_status=:status, account_status =:account_status WHERE resident_id =:id");
		$query->bindParam(':status', $status);
		$query->bindParam(':account_status', $account_status);
		$query->bindParam(':id', $resident_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Archive Resident $name | Archive by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

		if($query_execute){
			// delete photo from folder
			// unlink("../".$photo);
			$_SESSION['success'] = 'Resident archive successfully!';
			$_SESSION['success_status'] = 'success';
			header('location: ../residents.php');
			exit(0);
		}else{
			$_SESSION['success'] = 'Resident not deleted!';
			$_SESSION['success_status'] = 'error';
			header('location: ../residents.php');
			exit(0);
		}

	} catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}
	
}

// archive resident end



// delete resident permanently

if(isset($_POST['delete_resident'])){
	$photo = $_POST['photo'];
	$resident_id = $_POST['resident_id'];
	$status = "Archive";
	$account_status = "deactivated";
	$name = $_POST['name'];

	try {

		$query = $conn->prepare("DELETE FROM resident WHERE resident_id =:id LIMIT 1");
		$query->bindParam(':id', $resident_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Delete Resident $name | Deleted by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

        if ($query_execute && $photo == "img/person.png") {
        	$_SESSION['success'] = 'Resident deleted successfully!';
			$_SESSION['success_status'] = 'success';
			header('location: ../archive.php');
        }elseif($query_execute){
			// delete photo from folder
			 unlink("../".$photo);
			$_SESSION['success'] = 'Resident deleted successfully!';
			$_SESSION['success_status'] = 'success';
			header('location: ../archive.php');
			exit(0);
		}else{
			$_SESSION['success'] = 'Resident not deleted!';
			$_SESSION['success_status'] = 'error';
			header('location: ../archive.php');
			exit(0);
		}

	} catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}
	
}

// delete resident permanently end



// unarchive resident

if(isset($_POST['unarchive'])){
	$photo = $_POST['photo'];
	$resident_id = $_POST['resident_id'];
	$status = "";
	$account_status = "";
	$name = $_POST['name'];

	try {

		$query = $conn->prepare("UPDATE resident SET delete_status=:status, account_status =:account_status WHERE resident_id =:id");
		$query->bindParam(':status', $status);
		$query->bindParam(':account_status', $account_status);
		$query->bindParam(':id', $resident_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Unarchive Resident $name | Unarchive by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

		if($query_execute){
			// delete photo from folder
			// unlink("../".$photo);
			$_SESSION['success'] = 'Resident unarchive successfully!';
			$_SESSION['success_status'] = 'success';
			header('location: ../archive.php');
			exit(0);
		}else{
			$_SESSION['success'] = 'Resident not unarchive!';
			$_SESSION['success_status'] = 'error';
			header('location: ../archive.php');
			exit(0);
		}

	} catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}
	
}


// unarchive resident end



// update resident

$id = $_GET['id'];

if (isset($_POST['update_resident'])) {
	// $r1 = $_POST['r1'];
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
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$contactnumber = filter_input(INPUT_POST, 'contact_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$voters_status = filter_input(INPUT_POST, 'voters_status', FILTER_SANITIZE_SPECIAL_CHARS);
	$new_image = $_FILES['image']['name'];
	$current_image = $_POST['current_image'];

	$allowed_extension = array('png', 'jpg', 'jpeg');
	 $filename = $_FILES['image']['name'];
	 $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
	
	$rand = rand(0, 100000);
	$rename = 'residentPIC'.date('Ymd').$rand;

	$newName = $rename.'.'.$file_extension;
	$folder = 'img/'. $newName;


	try {

		// if variable new_image has value it will update the filename to img/"name of file"
		if ($new_image != '') {
			$update_filename = $folder;

		}
		// else it will upload variable current_image to the database
		else
		{
			$update_filename = $current_image;
		}if (empty($password)) {
			$query = $conn->prepare("UPDATE `resident` SET `firstname`=:firstname,`middlename`=:middlename,`lastname`=:lastname,`email`=:email,`username`=:username,`purok`=:purok,`brgy`=:brgy,`city`=:city,`province`=:province,`citizenship`=:citizenship,`religion`=:religion,`gender`=:gender,`birthdate`=:bdate,`birthplace`=:birthplace,`age`=:age,`civil_status`=:civil_status,`profession_occupation`=:profession,`years_of_residency`=:yearsresidency,`contact_no`=:contactnumber,`voters_status`=:voters_status,`photo`=:update_filename WHERE resident_id =:id LIMIT 1");
			$query->bindParam(':firstname', $firstname);
			$query->bindParam(':middlename', $middlename);
			$query->bindParam(':lastname', $lastname);
			$query->bindParam(':email', $email);
			$query->bindParam(':username', $username);
			$query->bindParam(':purok', $purok);
			$query->bindParam(':brgy', $brgy);
			$query->bindParam(':city', $city);
			$query->bindParam(':province', $province);
			$query->bindParam(':citizenship', $citizenship);
			$query->bindParam(':religion', $religion);
			$query->bindParam(':gender', $gender);
			$query->bindParam(':bdate', $bdate);
			$query->bindParam(':birthplace', $birthplace);
			$query->bindParam(':age', $age);
			$query->bindParam(':civil_status', $civil_status);
			$query->bindParam(':profession', $profession);
			$query->bindParam(':yearsresidency', $yearsresidency);
			$query->bindParam(':contactnumber', $contactnumber);
			$query->bindParam(':voters_status', $voters_status);
			$query->bindParam(':update_filename', $update_filename);
			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Update Resident $firstname ". $lastname ." | Updated by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			if ($query_execute && $current_image == 'img/person.png') {

				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $newName);
				// unlink("../img/".$current_image);

				$_SESSION['success'] = 'Resident Info has been updated!';
				$_SESSION['success_status'] = 'success';
				header("location: ../residents.php");
				exit(0);
			}elseif ($query_execute) {
				unlink("../".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $newName);

				$_SESSION['success'] = 'Resident Info has been updated!';
				$_SESSION['success_status'] = 'success';
				header("location: ../residents.php");
				exit(0);
			}
			else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: ../residents.php");
				exit(0);
			}
		}
		elseif ($_FILES['image']['name'] !='') 
		{
			$query = $conn->prepare("UPDATE `resident` SET `firstname`=:firstname,`middlename`=:middlename,`lastname`=:lastname,`email`=:email,`username`=:username,`password`=:hash,`purok`=:purok,`brgy`=:brgy,`city`=:city,`province`=:province,`citizenship`=:citizenship,`religion`=:religion,`gender`=:gender,`birthdate`=:bdate,`birthplace`=:birthplace,`age`=:age,`civil_status`=:civil_status,`profession_occupation`=:profession,`years_of_residency`=:yearsresidency,`contact_no`=:contactnumber,`voters_status`=:voters_status,`photo`=:update_filename WHERE resident_id =:id LIMIT 1");
			$query->bindParam(':firstname', $firstname);
			$query->bindParam(':middlename', $middlename);
			$query->bindParam(':lastname', $lastname);
			$query->bindParam(':email', $email);
			$query->bindParam(':username', $username);
			$query->bindParam(':hash', $hash);
			$query->bindParam(':purok', $purok);
			$query->bindParam(':brgy', $brgy);
			$query->bindParam(':city', $city);
			$query->bindParam(':province', $province);
			$query->bindParam(':citizenship', $citizenship);
			$query->bindParam(':religion', $religion);
			$query->bindParam(':gender', $gender);
			$query->bindParam(':bdate', $bdate);
			$query->bindParam(':birthplace', $birthplace);
			$query->bindParam(':age', $age);
			$query->bindParam(':civil_status', $civil_status);
			$query->bindParam(':profession', $profession);
			$query->bindParam(':yearsresidency', $yearsresidency);
			$query->bindParam(':contactnumber', $contactnumber);
			$query->bindParam(':voters_status', $voters_status);
			$query->bindParam(':update_filename', $update_filename);
			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Update Resident $firstname ". $lastname ." | Updated by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			if ($query_execute && $current_image == 'img/person.png') {

				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $newName);
				// unlink("../img/".$current_image);

				$_SESSION['success'] = 'Resident Info has been updated!';
				$_SESSION['success_status'] = 'success';
				header("location: ../residents.php");
				exit(0);
			}elseif ($query_execute) {
				unlink("../".$current_image);
				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" . $newName);

				$_SESSION['success'] = 'Resident Info has been updated!';
				$_SESSION['success_status'] = 'success';
				header("location: ../residents.php");
				exit(0);
			}
			else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: ../residents.php");
				exit(0);
			}
			
		}else{
			$query = $conn->prepare("UPDATE `resident` SET `firstname`=:firstname,`middlename`=:middlename,`lastname`=:lastname,`email`=:email,`username`=:username,`password`=:hash,`purok`=:purok,`brgy`=:brgy,`city`=:city,`province`=:province,`citizenship`=:citizenship,`religion`=:religion,`gender`=:gender,`birthdate`=:bdate,`birthplace`=:birthplace,`age`=:age,`civil_status`=:civil_status,`profession_occupation`=:profession,`years_of_residency`=:yearsresidency,`contact_no`=:contactnumber,`voters_status`=:voters_status,`photo`=:update_filename WHERE resident_id =:id LIMIT 1");
			$query->bindParam(':firstname', $firstname);
			$query->bindParam(':middlename', $middlename);
			$query->bindParam(':lastname', $lastname);
			$query->bindParam(':email', $email);
			$query->bindParam(':username', $username);
			$query->bindParam(':hash', $hash);
			$query->bindParam(':purok', $purok);
			$query->bindParam(':brgy', $brgy);
			$query->bindParam(':city', $city);
			$query->bindParam(':province', $province);
			$query->bindParam(':citizenship', $citizenship);
			$query->bindParam(':religion', $religion);
			$query->bindParam(':gender', $gender);
			$query->bindParam(':bdate', $bdate);
			$query->bindParam(':birthplace', $birthplace);
			$query->bindParam(':age', $age);
			$query->bindParam(':civil_status', $civil_status);
			$query->bindParam(':profession', $profession);
			$query->bindParam(':yearsresidency', $yearsresidency);
			$query->bindParam(':contactnumber', $contactnumber);
			$query->bindParam(':voters_status', $voters_status);
			$query->bindParam(':update_filename', $update_filename);
			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query_execute = $query->execute();

			$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	        $date_now = date('Y-m-d H:i:s');
	        $action = "Update Resident $firstname ". $lastname ." Updated by $username_sess";
	        $stmt = $conn->prepare($activity_log);
	        $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	        $stmt->bindParam(':date_now', $date_now);
	        $stmt->bindParam(':action', $action);
	        $stmt->execute();

			if ($query_execute) {

				move_uploaded_file($_FILES["image"]["tmp_name"], "../img/" .$newName);
				// unlink("../img/".$current_image);

				$_SESSION['success'] = 'Resident Info has been updated!';
				$_SESSION['success_status'] = 'success';
				header("location: ../residents.php");
				exit(0);
			}else{
				$_SESSION['update'] = "Something went wrong!";
				$_SESSION['success_status'] = 'error';
				header("location: ../residents.php");
				exit(0);
			}
			
		}


	} catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();

	}

	
}


// update resident end