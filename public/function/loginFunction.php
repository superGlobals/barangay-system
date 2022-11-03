 	<?php

if (isset($_POST['login'])) {
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

	if (!empty($username) || !empty($password)) {
		$query = "SELECT * FROM resident WHERE username = :username";
		$handle = $conn->prepare($query);
		$params = ['username'=>$username];
		$handle->execute($params);

			if ($handle->rowCount() > 0) {
				$row = $handle->fetch(PDO::FETCH_ASSOC);
				if ($row['account_status'] == 'deactivated') {
					$_SESSION['error'] = "Your account has been deactivated. Please contact the Barangay Administration.";
	        		// $_SESSION['success_status'] = "error";
					header("location: login"); 
				}
				elseif ($row['notif_rekta_verify'] == 1 && password_verify($password, $row['password'])) {
					$_SESSION['unique_id'] = $row['resident_id'];
					$_SESSION['resident_username'] = $row['username'];
					$_SESSION['resident_number'] = $row['resident_number'];
					$_SESSION['message'] = "Hello, before you can request a certificate, you must first verify your account.";
	        		$_SESSION['message_status'] = "warning";
					header("location: my_profile"); 
				}elseif ($result['notif_rekta_verify'] == 0 && password_verify($password, $row['password'])) {
						$_SESSION['unique_id'] = $row['resident_id'];
						$_SESSION['resident_username'] = $row['username'];
						$_SESSION['resident_number'] = $row['resident_number'];
						$_SESSION['success'] = "Login successfully";
		        		$_SESSION['success_status'] = "success";
						header("location: home"); 
					}else {
						$_SESSION['error'] = 'Invalid username or password.';		
		                $_SESSION['username'] = "$username";
		                $_SESSION['password'] = "$password";
		                header("location: login");
					}
				
			}else {
				$_SESSION['error'] = 'No user Found.';	
	          	$_SESSION['username'] = "$username";
	            $_SESSION['password'] = "$password";	
				header("location:login");
			}
		}else {
		    $_SESSION['error'] = 'Username and Password is required!';	
		    $_SESSION['username'] = "$username";
	        $_SESSION['password'] = "$password";	
			header("location:login");
	}
}