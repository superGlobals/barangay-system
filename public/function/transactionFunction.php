<?php

// brgy clearamce

if (isset($_POST['brgyClearance'])) {
	$payment_type = $_POST['payment_type'];
	$reference_number = filter_input(INPUT_POST, 'reference_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$purpose = filter_input(INPUT_POST, 'purpose', FILTER_SANITIZE_SPECIAL_CHARS);
	$amount = $_POST['clearance_price'];
	$status = 'pending';
	$certificate_type = 'Barangay Clearance';
	$origin = 'Online Request';

	try {

		$query = $conn->prepare("INSERT INTO brgy_request_certificate (resident_id, purpose, payment_type, amount, status, certificate_type, origin, reference_number)
				VALUES (:resident_id, :purpose, :payment_type, :amount, :status, :certificate_type, :origin, :reference_number)");
		$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
		$query->bindParam('purpose', $purpose);
		$query->bindParam('payment_type', $payment_type);
		$query->bindParam('amount', $amount);
		$query->bindParam('status', $status);
		$query->bindParam('certificate_type', $certificate_type);
		$query->bindParam('origin', $origin);
		$query->bindParam('reference_number', $reference_number);

		$verify = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
		$verify->bindParam('resident_id', $_SESSION['unique_id']);
		$verify->execute();


	   		if (!isset($_SESSION['unique_id']) || ($_SESSION['unique_id'] == ''))
		    {
		    	$_SESSION['success'] = "Please login first";
		        $_SESSION['success_status'] = "warning";
		        header("location: login");
		    }

		    while ($row = $verify->fetch(PDO::FETCH_ASSOC)) {
			$verification_status = $row['verification_status'];
		    if($verification_status == 'Not Verified' || $verification_status == 'Decline'){
		    	$_SESSION['success'] = 'Please verify your account first!';
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");

		    }
		    elseif($query->execute()) {
		        $_SESSION['success'] = "Request has been sent";
		        $_SESSION['success_status'] = "success";
		        header("location: my_request");
		    }else {
		        $_SESSION['success'] = "Error";
		        $_SESSION['success_status'] = "error";
		         header("location: home");
		    }        

		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}


// brgy indigency

if (isset($_POST['brgyIndigency'])) {
	$payment_type = $_POST['payment_type'];
	$reference_number = filter_input(INPUT_POST, 'reference_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$purpose = filter_input(INPUT_POST, 'purpose', FILTER_SANITIZE_SPECIAL_CHARS);
	$amount = $_POST['indigency_price'];
	$status = 'pending';
	$certificate_type = 'Barangay Indigency';
	$origin = 'Online Request';

	try {

		$query = $conn->prepare("INSERT INTO brgy_request_certificate (resident_id, purpose, payment_type, amount, status, certificate_type, origin, reference_number)
				VALUES (:resident_id, :purpose, :payment_type, :amount, :status, :certificate_type, :origin, :reference_number)");
		$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
		$query->bindParam('purpose', $purpose);
		$query->bindParam('payment_type', $payment_type);
		$query->bindParam('amount', $amount);
		$query->bindParam('status', $status);
		$query->bindParam('certificate_type', $certificate_type);
		$query->bindParam('origin', $origin);
		$query->bindParam('reference_number', $reference_number);

		$verify = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
		$verify->bindParam('resident_id', $_SESSION['unique_id']);
		$verify->execute();


	    if (!isset($_SESSION['unique_id']) || ($_SESSION['unique_id'] == ''))
		    {
		    	$_SESSION['success'] = "Please login first";
		        $_SESSION['success_status'] = "warning";
		        header("location: login");
		    }
		    while ($row = $verify->fetch(PDO::FETCH_ASSOC)) {
			$verification_status = $row['verification_status'];
		    if($verification_status == 'Not Verified' || $verification_status == 'Decline'){
		    	$_SESSION['success'] = 'Please verify your account first!';
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");

		    }
		    elseif($query->execute()) {
		        $_SESSION['success'] = "Request has been sent";
		        $_SESSION['success_status'] = "success";
		        header("location: my_request");
		    }else {
		        $_SESSION['success'] = "Error";
		        $_SESSION['success_status'] = "error";
		         header("location: home");
		    }        

		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}



// brgy certificate

if (isset($_POST['brgyCertificate'])) {
	$payment_type = $_POST['payment_type'];
	$reference_number = filter_input(INPUT_POST, 'reference_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$purpose = filter_input(INPUT_POST, 'purpose', FILTER_SANITIZE_SPECIAL_CHARS);
	$amount = $_POST['certificate_price'];
	$status = 'pending';
	$certificate_type = 'Barangay Certificate';
	$origin = 'Online Request';

	try {

		$query = $conn->prepare("INSERT INTO brgy_request_certificate (resident_id, purpose, payment_type, amount, status, certificate_type, origin, reference_number)
				VALUES (:resident_id, :purpose, :payment_type, :amount, :status, :certificate_type, :origin, :reference_number)");
		$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
		$query->bindParam('purpose', $purpose);
		$query->bindParam('payment_type', $payment_type);
		$query->bindParam('amount', $amount);
		$query->bindParam('status', $status);
		$query->bindParam('certificate_type', $certificate_type);
		$query->bindParam('origin', $origin);
		$query->bindParam('reference_number', $reference_number);

		$verify = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
		$verify->bindParam('resident_id', $_SESSION['unique_id']);
		$verify->execute();


	    if (!isset($_SESSION['unique_id']) || ($_SESSION['unique_id'] == ''))
		    {
		    	$_SESSION['success'] = "Please login first";
		        $_SESSION['success_status'] = "warning";
		        header("location: login");
		    }
		    while ($row = $verify->fetch(PDO::FETCH_ASSOC)) {
			$verification_status = $row['verification_status'];
		    if($verification_status == 'Not Verified' || $verification_status == 'Decline'){
		    	$_SESSION['success'] = 'Please verify your account first!';
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");

		    }
		    elseif($query->execute()) {
		        $_SESSION['success'] = "Request has been sent";
		        $_SESSION['success_status'] = "success";
		        header("location: my_request");
		    }else {
		        $_SESSION['success'] = "Error";
		        $_SESSION['success_status'] = "error";
		         header("location: home");
		    }        

		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}



// brgy residency

if (isset($_POST['brgyResidency'])) {
	$payment_type = $_POST['payment_type'];
	$reference_number = filter_input(INPUT_POST, 'reference_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$purpose = filter_input(INPUT_POST, 'purpose', FILTER_SANITIZE_SPECIAL_CHARS);
	$amount = $_POST['residency_price'];
	$status = 'pending';
	$certificate_type = 'Barangay Residency';
	$origin = 'Online Request';

	try {

		$query = $conn->prepare("INSERT INTO brgy_request_certificate (resident_id, purpose, payment_type, amount, status, certificate_type, origin, reference_number)
				VALUES (:resident_id, :purpose, :payment_type, :amount, :status, :certificate_type, :origin, :reference_number)");
		$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
		$query->bindParam('purpose', $purpose);
		$query->bindParam('payment_type', $payment_type);
		$query->bindParam('amount', $amount);
		$query->bindParam('status', $status);
		$query->bindParam('certificate_type', $certificate_type);
		$query->bindParam('origin', $origin);
		$query->bindParam('reference_number', $reference_number);

		$verify = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
		$verify->bindParam('resident_id', $_SESSION['unique_id']);
		$verify->execute();


	    if (!isset($_SESSION['unique_id']) || ($_SESSION['unique_id'] == ''))
		    {
		    	$_SESSION['success'] = "Please login first";
		        $_SESSION['success_status'] = "warning";
		        header("location: login");
		    }
		    while ($row = $verify->fetch(PDO::FETCH_ASSOC)) {
			$verification_status = $row['verification_status'];
		    if($verification_status == 'Not Verified' || $verification_status == 'Decline'){
		    	$_SESSION['success'] = 'Please verify your account first!';
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");

		    }
		    elseif($query->execute()) {
		        $_SESSION['success'] = "Request has been sent";
		        $_SESSION['success_status'] = "success";
		        header("location: my_request");
		    }else {
		        $_SESSION['success'] = "Error";
		        $_SESSION['success_status'] = "error";
		         header("location: home");
		    }        

		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}




// building clearance

if (isset($_POST['buildingClearance'])) {
	$payment_type = $_POST['payment_type'];
	$reference_number = filter_input(INPUT_POST, 'reference_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$purpose = filter_input(INPUT_POST, 'purpose', FILTER_SANITIZE_SPECIAL_CHARS);
	$amount = $_POST['building_price'];
	$status = 'pending';
	$certificate_type = 'Building Clearance';
	$origin = 'Online Request';

	try {

		$query = $conn->prepare("INSERT INTO brgy_request_certificate (resident_id, purpose, payment_type, amount, status, certificate_type, origin, reference_number)
				VALUES (:resident_id, :purpose, :payment_type, :amount, :status, :certificate_type, :origin, :reference_number)");
		$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
		$query->bindParam('purpose', $purpose);
		$query->bindParam('payment_type', $payment_type);
		$query->bindParam('amount', $amount);
		$query->bindParam('status', $status);
		$query->bindParam('certificate_type', $certificate_type);
		$query->bindParam('origin', $origin);
		$query->bindParam('reference_number', $reference_number);

		$verify = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
		$verify->bindParam('resident_id', $_SESSION['unique_id']);
		$verify->execute();


	    if (!isset($_SESSION['unique_id']) || ($_SESSION['unique_id'] == ''))
		    {
		    	$_SESSION['success'] = "Please login first";
		        $_SESSION['success_status'] = "warning";
		        header("location: login");
		    }
		    while ($row = $verify->fetch(PDO::FETCH_ASSOC)) {
			$verification_status = $row['verification_status'];
		    if($verification_status == 'Not Verified' || $verification_status == 'Decline'){
		    	$_SESSION['success'] = 'Please verify your account first!';
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");

		    }
		    elseif($query->execute()) {
		        $_SESSION['success'] = "Request has been sent";
		        $_SESSION['success_status'] = "success";
		        header("location: my_request");
		    }else {
		        $_SESSION['success'] = "Error";
		        $_SESSION['success_status'] = "error";
		         header("location: home");
		    }        

		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}




// clearance national id

if (isset($_POST['clearanceNationalId'])) {
	$payment_type = $_POST['payment_type'];
	$reference_number = filter_input(INPUT_POST, 'reference_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$purpose = filter_input(INPUT_POST, 'purpose', FILTER_SANITIZE_SPECIAL_CHARS);
	$amount = $_POST['clearance_nat_price'];
	$status = 'pending';
	$certificate_type = 'Barangay Clearance NAT ID';
	$origin = 'Online Request';

	try {

		$query = $conn->prepare("INSERT INTO brgy_request_certificate (resident_id, purpose, payment_type, amount, status, certificate_type, origin, reference_number)
				VALUES (:resident_id, :purpose, :payment_type, :amount, :status, :certificate_type, :origin, :reference_number)");
		$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
		$query->bindParam('purpose', $purpose);
		$query->bindParam('payment_type', $payment_type);
		$query->bindParam('amount', $amount);
		$query->bindParam('status', $status);
		$query->bindParam('certificate_type', $certificate_type);
		$query->bindParam('origin', $origin);
		$query->bindParam('reference_number', $reference_number);

		$verify = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
		$verify->bindParam('resident_id', $_SESSION['unique_id']);
		$verify->execute();


	    if (!isset($_SESSION['unique_id']) || ($_SESSION['unique_id'] == ''))
		    {
		    	$_SESSION['success'] = "Please login first";
		        $_SESSION['success_status'] = "warning";
		        header("location: login");
		    }
		    while ($row = $verify->fetch(PDO::FETCH_ASSOC)) {
			$verification_status = $row['verification_status'];
		    if($verification_status == 'Not Verified' || $verification_status == 'Decline'){
		    	$_SESSION['success'] = 'Please verify your account first!';
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");

		    }
		    elseif($query->execute()) {
		        $_SESSION['success'] = "Request has been sent";
		        $_SESSION['success_status'] = "success";
		        header("location: my_request");
		    }else {
		        $_SESSION['success'] = "Error";
		        $_SESSION['success_status'] = "error";
		         header("location: home");
		    }        

		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}




// business clearance

if (isset($_POST['brgyBusinessClearance'])) {
	$payment_type = $_POST['payment_type'];
	$reference_number = filter_input(INPUT_POST, 'reference_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$business_name = filter_input(INPUT_POST, 'business_name', FILTER_SANITIZE_SPECIAL_CHARS);
	$business_type = filter_input(INPUT_POST, 'business_type', FILTER_SANITIZE_SPECIAL_CHARS);
	$business_location = $_POST['business_location'];
	$purpose = filter_input(INPUT_POST, 'purpose', FILTER_SANITIZE_SPECIAL_CHARS);
	$amount = $_POST['business_clearance_price'];
	$status = 'pending';
	$certificate_type = 'Barangay Business Clearance';
	$origin = 'Online Request';

	try {

		$query = $conn->prepare("INSERT INTO brgy_request_certificate (resident_id, purpose, payment_type, amount, status, certificate_type, business_name, business_type, business_loc, origin, reference_number)
				VALUES (:resident_id, :purpose, :payment_type, :amount, :status, :certificate_type, :business_name, :business_type, :business_location, :origin, :reference_number)");
		$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
		$query->bindParam('purpose', $purpose);
		$query->bindParam('payment_type', $payment_type);
		$query->bindParam('amount', $amount);
		$query->bindParam('status', $status);
		$query->bindParam('certificate_type', $certificate_type);
		$query->bindParam('business_name', $business_name);
		$query->bindParam('business_type', $business_type);
		$query->bindParam('business_location', $business_location);
		$query->bindParam('origin', $origin);
		$query->bindParam('reference_number', $reference_number);

		$verify = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
		$verify->bindParam('resident_id', $_SESSION['unique_id']);
		$verify->execute();


	    if (!isset($_SESSION['unique_id']) || ($_SESSION['unique_id'] == ''))
		    {
		    	$_SESSION['success'] = "Please login first";
		        $_SESSION['success_status'] = "warning";
		        $_SESSION['reference_number'] = $reference_number;
		        $_SESSION['payment_type'] = $payment_type;
		        $_SESSION['business_name'] = $business_name;
		        $_SESSION['business_type'] = $business_type;
		        $_SESSION['business_location'] = $business_location;
		        $_SESSION['purpose'] = $purpose;
		        
		        header("location: login");
		    }
		    while ($row = $verify->fetch(PDO::FETCH_ASSOC)) {
			$verification_status = $row['verification_status'];
		    if($verification_status == 'Not Verified' || $verification_status == 'Decline'){
		    	$_SESSION['success'] = 'Please verify your account first!';
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");

		    }
		    elseif($query->execute()) {
		        $_SESSION['success'] = "Request has been sent";
		        $_SESSION['success_status'] = "success";
		        header("location: my_request");
		    }else {
		        $_SESSION['success'] = "Error";
		        $_SESSION['success_status'] = "error";
		         header("location: home");
		    }        

		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}


// good moral


// clearance national id

if (isset($_POST['brgyGoodMoral'])) {
	$payment_type = $_POST['payment_type'];
	$reference_number = filter_input(INPUT_POST, 'reference_number', FILTER_SANITIZE_SPECIAL_CHARS);
	$purpose = filter_input(INPUT_POST, 'purpose', FILTER_SANITIZE_SPECIAL_CHARS);
	$amount = $_POST['clearance_nat_price'];
	$status = 'pending';
	$certificate_type = 'Good Moral';
	$origin = 'Online Request';

	try {

		$query = $conn->prepare("INSERT INTO brgy_request_certificate (resident_id, purpose, payment_type, amount, status, certificate_type, origin, reference_number)
				VALUES (:resident_id, :purpose, :payment_type, :amount, :status, :certificate_type, :origin, :reference_number)");
		$query->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
		$query->bindParam('purpose', $purpose);
		$query->bindParam('payment_type', $payment_type);
		$query->bindParam('amount', $amount);
		$query->bindParam('status', $status);
		$query->bindParam('certificate_type', $certificate_type);
		$query->bindParam('origin', $origin);
		$query->bindParam('reference_number', $reference_number);

		$verify = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id");
		$verify->bindParam('resident_id', $_SESSION['unique_id']);
		$verify->execute();


	    if (!isset($_SESSION['unique_id']) || ($_SESSION['unique_id'] == ''))
		    {
		    	$_SESSION['success'] = "Please login first";
		        $_SESSION['success_status'] = "warning";
		        header("location: login");
		    }
		    while ($row = $verify->fetch(PDO::FETCH_ASSOC)) {
			$verification_status = $row['verification_status'];
		    if($verification_status == 'Not Verified' || $verification_status == 'Decline'){
		    	$_SESSION['success'] = 'Please verify your account first!';
				$_SESSION['success_status'] = 'error';
				header("location: my_profile");

		    }
		    elseif($query->execute()) {
		        $_SESSION['success'] = "Request has been sent";
		        $_SESSION['success_status'] = "success";
		        header("location: my_request");
		    }else {
		        $_SESSION['success'] = "Error";
		        $_SESSION['success_status'] = "error";
		         header("location: home");
		    }        

		}

	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

	
}



// cancel request 

if (isset($_POST['cancelRequest'])) {
	$id = $_POST['brgy_clearance_id'];
	$status = "cancel";

	$query = $conn->prepare("UPDATE brgy_request_certificate SET status =:status WHERE brgy_clearance_id =:id");
	$query->bindParam('status', $status);
	$query->bindParam('id', $id, PDO::PARAM_INT);
	$query_execute = $query->execute();

	if ($query_execute) {
		$_SESSION['success'] = "Request has been canceled";
        $_SESSION['success_status'] = "success";
        header("location: my_request");
	}
}