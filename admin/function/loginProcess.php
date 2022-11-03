<?php
session_start();
require '../include/database.php';

if (isset($_POST['login'])) {
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (!empty($username) || !empty($password)) {
		$query = "SELECT * FROM user WHERE username = :username";
		$handle = $conn->prepare($query);
		$params = ['username'=>$username];
		$handle->execute($params);
			if ($handle->rowCount() > 0) {
				$row = $handle->fetch(PDO::FETCH_ASSOC);
					if (password_verify($password, $row['password'])) {
						$_SESSION['id'] = $row['user_id'];
						$_SESSION['username_sess'] = $row['username'];
						$_SESSION['role'] = $row['user_type'];
						// $_SESSION['success_mess'] = "Welcome $username";
						header("location: ../index.php"); 
					}else {
						$_SESSION['error'] = 'Invalid email or password.';		
		                $_SESSION['username'] = "$username";
		                $_SESSION['password'] = "$password";
		                header("location: ../pages-login.php");
					}
				
			}else {
				$_SESSION['error'] = 'No user Found.';	
	          	$_SESSION['username'] = "$username";
	            $_SESSION['password'] = "$password";	
				header("location:../pages-login.php");
			}
		}else {
		    $_SESSION['error'] = 'Email and Password is required!';	
		    $_SESSION['username'] = "$username";
	        $_SESSION['password'] = "$password";	
			header("location:../pages-login.php");
	}
}