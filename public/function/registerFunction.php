<?php

if (isset($_POST['register'])) {
	$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
	$middlename =  filter_input(INPUT_POST, 'middlename', FILTER_SANITIZE_SPECIAL_CHARS);
	$lastname =  filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
	$purok = $_POST['purok'];
	$brgy = filter_input(INPUT_POST, 'brgy', FILTER_SANITIZE_SPECIAL_CHARS);
	$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
	$province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_SPECIAL_CHARS);
	$citizenship =filter_input(INPUT_POST, 'citizenship', FILTER_SANITIZE_SPECIAL_CHARS);
	$religion =filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_SPECIAL_CHARS);
	$gender = $_POST['gender'];
	$bdate = filter_input(INPUT_POST, 'bdate', FILTER_SANITIZE_SPECIAL_CHARS);
	$birthplace =filter_input(INPUT_POST, 'birthplace', FILTER_SANITIZE_SPECIAL_CHARS);
	$age = $_POST['age'];
	$civil_status = $_POST['civil_status'];
	$profession =filter_input(INPUT_POST, 'profession', FILTER_SANITIZE_SPECIAL_CHARS);
	$yearsresidency =filter_input(INPUT_POST, 'years_residency', FILTER_SANITIZE_SPECIAL_CHARS);
	$contactnumber = filter_input(INPUT_POST, 'contact_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$voters_status = $_POST['voters_status'];
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$photo = "img/person.png";
	$verification_status = "Not Verified";
	$notif = 1;

	$number = preg_match('@[0-9]@', $password);

	try {

		$check_username = $conn->prepare("SELECT * FROM resident WHERE username =:username ");
		$check_username->bindParam('username', $username);
		$check_username->execute();
		$result = $check_username->fetch(PDO::FETCH_ASSOC);

		$query = $conn->prepare("INSERT INTO `resident`(`firstname`, `middlename`, `lastname`,`username`,`password`, `purok`, `brgy`, `city`, `province`, `citizenship`, `religion`, `gender`, `birthdate`, `birthplace`, `age`, `civil_status`, `profession_occupation`, `years_of_residency`, `contact_no`, `voters_status`, `photo`, `verification_status`, `notif_rekta_verify`) VALUES (:firstname, :middlename, :lastname, :username, :password, :purok, :brgy, :city, :province, :citizenship, :religion, :gender, :birthdate, :birthplace, :age, :civil_status, :profession_occupation, :years_of_residency, :contact_no, :voters_status, :photo, :verification_status, :notif)");

		$query->bindParam('firstname', $firstname);
		$query->bindParam('middlename', $middlename);
		$query->bindParam('lastname', $lastname);
		$query->bindParam('username', $username);
		$query->bindParam('password', $hash);
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
		$query->bindParam('profession_occupation', $profession);
		$query->bindParam('years_of_residency', $yearsresidency);
		$query->bindParam('contact_no', $contactnumber);
		$query->bindParam('voters_status', $voters_status);
		$query->bindParam('photo', $photo);
		$query->bindParam('verification_status', $verification_status);
		$query->bindParam('notif', $notif);
		// $query->execute();

		if (empty($firstname && $middlename && $lastname && $citizenship && $religion && $gender && $bdate && $birthplace && $civil_status && $profession && $yearsresidency && $voters_status && $contactnumber && $username && $password)) {
			$_SESSION['success'] = "Please fill up all fields!";
			$_SESSION['success_status'] = "warning";
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
			$_SESSION['civilstatus'] = "$civil_status";  
			$_SESSION['profession'] = "$profession"; 
			$_SESSION['yearsresidency'] = "$yearsresidency"; 
			$_SESSION['contactnumber'] = "$contactnumber"; 
			$_SESSION['voters_status'] = "$voters_status"; 
			$_SESSION['username'] = "$username";
			$_SESSION['password'] = "$password";
			header("location: register");
		}elseif(!$number || strlen($password) < 8){
			$_SESSION['success'] = "Please choose strong password!";
			$_SESSION['success_status'] = "warning";
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
			$_SESSION['civilstatus'] = "$civil_status";  
			$_SESSION['profession'] = "$profession"; 
			$_SESSION['yearsresidency'] = "$yearsresidency"; 
			$_SESSION['contactnumber'] = "$contactnumber"; 
			$_SESSION['voters_status'] = "$voters_status"; 
			$_SESSION['username'] = "$username";
			header("location: register");
		}elseif($result > 0){
			$_SESSION['success'] = "Username already exist!";
			$_SESSION['success_status'] = "warning";
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
			$_SESSION['civilstatus'] = "$civil_status";  
			$_SESSION['profession'] = "$profession"; 
			$_SESSION['yearsresidency'] = "$yearsresidency"; 
			$_SESSION['contactnumber'] = "$contactnumber"; 
			$_SESSION['voters_status'] = "$voters_status"; 
			$_SESSION['password'] = "$password";
			header("location: register");
		}elseif(strlen($contactnumber) !== 11){
			$_SESSION['success'] = "The contact number should only have 11 digits.";
			$_SESSION['success_status'] = "warning";
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
			$_SESSION['civilstatus'] = "$civil_status";  
			$_SESSION['profession'] = "$profession"; 
			$_SESSION['yearsresidency'] = "$yearsresidency"; 
			$_SESSION['contactnumber'] = "$contactnumber"; 
			$_SESSION['voters_status'] = "$voters_status"; 
			$_SESSION['username'] = "$username";
			$_SESSION['password'] = "$password";
			header("location: register");
		}elseif($query->execute()) {
	        $_SESSION['success'] = "Account created successfully!";
	        $_SESSION['success_status'] = "success";
	        $_SESSION['username'] = "$username";
	        header("location: login");
	    }else {
	        $_SESSION['success'] = "Error";
	        $_SESSION['success_status'] = "error";
	         header("location: register");
	    }  

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

}