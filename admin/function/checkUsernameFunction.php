<?php
require '../include/database.php';

if (isset($_POST['username'])) {
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("SELECT * FROM resident WHERE username=:username");
		$params = ['username'=>$username];
		$query->execute($params);

		if ($query->rowCount() > 0) {
			echo "<span style='color: red; font-size: 15px'> Username already exist. </span>";
			echo "<script>$('#submit').prop('disabled',true):</script>";
		}else {
			echo "<span style='color: green; font-size: 15px'> Username available </span>";
			echo "<script>$('#submit').prop('disabled',false):</script>";
		}

	} catch (PDOException $e) {

        echo "My Error Type:". $e->getMessage();
    }
	
}

if (isset($_POST['user_username'])) {
	$username = filter_input(INPUT_POST, 'user_username', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("SELECT * FROM user WHERE username=:username");
		$params = ['username'=>$username];
		$query->execute($params);

		if ($query->rowCount() > 0) {
			echo "<span style='color: red; font-size: 15px'> Username already exist. </span>";
			echo "<script>$('#submit').prop('disabled',true):</script>";
		}else {
			echo "<span style='color: green; font-size: 15px'> Username available </span>";
			echo "<script>$('#submit').prop('disabled',false):</script>";
		}

	} catch (PDOException $e) {

        echo "My Error Type:". $e->getMessage();
    }
	
}

if (isset($_POST['email'])) {
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("SELECT * FROM resident WHERE email=:email");
		$params = ['email'=>$email];
		$query->execute($params);


		if ($query->rowCount() > 0) {
			echo "<span style='color: red; font-size: 15px'> Email already exist. </span>";
			echo "<script>$('#submit').prop('disabled',true):</script>";
		}else {
			echo "<span style='color: green; font-size: 15px'> Email available </span>";
			echo "<script>$('#submit').prop('disabled',false):</script>";
		}

	} catch (PDOException $e) {

        echo "My Error Type:". $e->getMessage();
    }

	
}