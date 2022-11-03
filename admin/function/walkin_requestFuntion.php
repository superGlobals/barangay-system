<?php
require '../include/session.php';
require '../include/database.php';

// clearance

if (isset($_POST["brgyClearance"])) {
    $resident_id = $_POST['resident_id'];
	$amount = $_POST['amount'];
	$certificate_type = "Barangay Clearance";
	$origin = "Walk in";
	$revenue_status = "done";
    $resident_name = $_POST['resident_name'];


	$query = $conn->prepare("INSERT INTO `brgy_request_certificate`(`resident_id`, `amount`, `issued_by`, `certificate_type`, `origin`,`revenue_status`) 
    VALUES (:resident_id, :amount, :issued_by, :certificate_type, :origin, :revenue_status)");
    $query->bindParam('resident_id', $resident_id, PDO::PARAM_INT);
    $query->bindParam('amount', $amount);
    $query->bindParam('issued_by', $session_id);
    $query->bindParam('certificate_type', $certificate_type);
    $query->bindParam('origin', $origin);
    $query->bindParam('revenue_status', $revenue_status);
    $query_execute = $query->execute();

    $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
    $date_now = date('Y-m-d H:i:s');
    $action = "Issued $certificate_type to $resident_name | Issued by $username_sess";
    $stmt = $conn->prepare($activity_log);
    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
    $stmt->bindParam(':date_now', $date_now);
    $stmt->bindParam(':action', $action);
    $stmt->execute();

    if ($query_execute) {
        $_SESSION['success'] = 'Payment has been saved';
		$_SESSION['success_status'] = 'success';
		header("location: ". $_SERVER["HTTP_REFERER"].'&closeModal');
        exit(0);
    }else {
        $_SESSION['success'] = 'Payment not saved';
		$_SESSION['success_status'] = 'success';
		header("location: ../resident.php");
        exit(0);
    }
}	


// indigency

if (isset($_POST["brgyIndigency"])) {
    $resident_id = $_POST['resident_id'];
    $amount = $_POST['amount'];
    $certificate_type = "Barangay Indigency";
    $origin = "Walk in";
    $revenue_status = "done";
    $resident_name = $_POST['resident_name'];


    $query = $conn->prepare("INSERT INTO `brgy_request_certificate`(`resident_id`, `amount`, `issued_by`, `certificate_type`, `origin`,`revenue_status`) 
    VALUES (:resident_id, :amount, :issued_by, :certificate_type, :origin, :revenue_status)");
    $query->bindParam('resident_id', $resident_id, PDO::PARAM_INT);
    $query->bindParam('amount', $amount);
    $query->bindParam('issued_by', $session_id);
    $query->bindParam('certificate_type', $certificate_type);
    $query->bindParam('origin', $origin);
    $query->bindParam('revenue_status', $revenue_status);
    $query_execute = $query->execute();

    $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
    $date_now = date('Y-m-d H:i:s');
    $action = "Issued $certificate_type to $resident_name | Issued by $username_sess";
    $stmt = $conn->prepare($activity_log);
    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
    $stmt->bindParam(':date_now', $date_now);
    $stmt->bindParam(':action', $action);
    $stmt->execute();

    if ($query_execute) {
        $_SESSION['success'] = 'Payment has been saved';
        $_SESSION['success_status'] = 'success';
        header("location: ". $_SERVER["HTTP_REFERER"].'&closeModal');
        exit(0);
    }else {
        $_SESSION['success'] = 'Payment not saved';
        $_SESSION['success_status'] = 'success';
        header("location: ../resident.php");
        exit(0);
    }
}


// residency

if (isset($_POST["brgyResidency"])) {
    $resident_id = $_POST['resident_id'];
    $amount = $_POST['amount'];
    $certificate_type = "Barangay Residency";
    $origin = "Walk in";
    $revenue_status = "done";
    $resident_name = $_POST['resident_name'];


    $query = $conn->prepare("INSERT INTO `brgy_request_certificate`(`resident_id`, `amount`, `issued_by`, `certificate_type`, `origin`,`revenue_status`) 
    VALUES (:resident_id, :amount, :issued_by, :certificate_type, :origin, :revenue_status)");
    $query->bindParam('resident_id', $resident_id, PDO::PARAM_INT);
    $query->bindParam('amount', $amount);
    $query->bindParam('issued_by', $session_id);
    $query->bindParam('certificate_type', $certificate_type);
    $query->bindParam('origin', $origin);
    $query->bindParam('revenue_status', $revenue_status);
    $query_execute = $query->execute();

    $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
    $date_now = date('Y-m-d H:i:s');
    $action = "Issued $certificate_type to $resident_name | Issued by $username_sess";
    $stmt = $conn->prepare($activity_log);
    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
    $stmt->bindParam(':date_now', $date_now);
    $stmt->bindParam(':action', $action);
    $stmt->execute();

    if ($query_execute) {
        $_SESSION['success'] = 'Payment has been saved';
        $_SESSION['success_status'] = 'success';
        header("location: ". $_SERVER["HTTP_REFERER"].'&closeModal');
        exit(0);
    }else {
        $_SESSION['success'] = 'Payment not saved';
        $_SESSION['success_status'] = 'success';
        header("location: ../resident.php");
        exit(0);
    }
}



// building

if (isset($_POST["brgyBuilding"])) {
    $resident_id = $_POST['resident_id'];
    $amount = $_POST['amount'];
    $certificate_type = "Barangay Building Clearance";
    $origin = "Walk in";
    $revenue_status = "done";
    $resident_name = $_POST['resident_name'];


    $query = $conn->prepare("INSERT INTO `brgy_request_certificate`(`resident_id`, `amount`, `issued_by`, `certificate_type`, `origin`,`revenue_status`) 
    VALUES (:resident_id, :amount, :issued_by, :certificate_type, :origin, :revenue_status)");
    $query->bindParam('resident_id', $resident_id, PDO::PARAM_INT);
    $query->bindParam('amount', $amount);
    $query->bindParam('issued_by', $session_id);
    $query->bindParam('certificate_type', $certificate_type);
    $query->bindParam('origin', $origin);
    $query->bindParam('revenue_status', $revenue_status);
    $query_execute = $query->execute();

    $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
    $date_now = date('Y-m-d H:i:s');
    $action = "Issued $certificate_type to $resident_name | Issued by $username_sess";
    $stmt = $conn->prepare($activity_log);
    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
    $stmt->bindParam(':date_now', $date_now);
    $stmt->bindParam(':action', $action);
    $stmt->execute();

    if ($query_execute) {
        $_SESSION['success'] = 'Payment has been saved';
        $_SESSION['success_status'] = 'success';
        header("location: ". $_SERVER["HTTP_REFERER"].'&closeModal');
        exit(0);
    }else {
        $_SESSION['success'] = 'Payment not saved';
        $_SESSION['success_status'] = 'success';
        header("location: ../resident.php");
        exit(0);
    }
}


// clearance nat id

if (isset($_POST["brgyNatID"])) {
    $resident_id = $_POST['resident_id'];
    $amount = $_POST['amount'];
    $certificate_type = "Barangay Clearance NAT ID";
    $origin = "Walk in";
    $revenue_status = "done";
    $resident_name = $_POST['resident_name'];


    $query = $conn->prepare("INSERT INTO `brgy_request_certificate`(`resident_id`, `amount`, `issued_by`, `certificate_type`, `origin`,`revenue_status`) 
    VALUES (:resident_id, :amount, :issued_by, :certificate_type, :origin, :revenue_status)");
    $query->bindParam('resident_id', $resident_id, PDO::PARAM_INT);
    $query->bindParam('amount', $amount);
    $query->bindParam('issued_by', $session_id);
    $query->bindParam('certificate_type', $certificate_type);
    $query->bindParam('origin', $origin);
    $query->bindParam('revenue_status', $revenue_status);
    $query_execute = $query->execute();

    $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
    $date_now = date('Y-m-d H:i:s');
    $action = "Issued $certificate_type to $resident_name | Issued by $username_sess";
    $stmt = $conn->prepare($activity_log);
    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
    $stmt->bindParam(':date_now', $date_now);
    $stmt->bindParam(':action', $action);
    $stmt->execute();

    if ($query_execute) {
        $_SESSION['success'] = 'Payment has been saved';
        $_SESSION['success_status'] = 'success';
        header("location: ". $_SERVER["HTTP_REFERER"].'&closeModal');
        exit(0);
    }else {
        $_SESSION['success'] = 'Payment not saved';
        $_SESSION['success_status'] = 'success';
        header("location: ../resident.php");
        exit(0);
    }
}


// business clearance

if (isset($_POST["brgyBusiness"])) {
    $resident_id = $_POST['resident_id'];
    $amount = $_POST['amount'];
    $certificate_type = "Barangay Business Clearance";
    $business_name = $_POST['business_name'];
    $business_type = $_POST['business_type'];
    $business_location = $_POST['business_location'];
    $origin = "Walk in";
    $revenue_status = "done";
    $resident_name = $_POST['resident_name'];


    $query = $conn->prepare("INSERT INTO `brgy_request_certificate`(`resident_id`, `amount`, `issued_by`, `certificate_type`, `business_name`, `business_type`, `business_loc`, `origin`,`revenue_status`) 
    VALUES (:resident_id, :amount, :issued_by, :certificate_type, :business_name, :business_type, :business_location, :origin, :revenue_status)");
    $query->bindParam('resident_id', $resident_id, PDO::PARAM_INT);
    $query->bindParam('amount', $amount);
    $query->bindParam('issued_by', $session_id);
    $query->bindParam('certificate_type', $certificate_type);
    $query->bindParam('business_name', $business_name);
    $query->bindParam('business_type', $business_type);
    $query->bindParam('business_location', $business_location);
    $query->bindParam('origin', $origin);
    $query->bindParam('revenue_status', $revenue_status);
    $query_execute = $query->execute();

    $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
    $date_now = date('Y-m-d H:i:s');
    $action = "Issued $certificate_type to $resident_name | Issued by $username_sess";
    $stmt = $conn->prepare($activity_log);
    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
    $stmt->bindParam(':date_now', $date_now);
    $stmt->bindParam(':action', $action);
    $stmt->execute();

    if ($query_execute) {
        $_SESSION['success'] = 'Payment has been saved';
        $_SESSION['success_status'] = 'success';
        header("location: ". $_SERVER["HTTP_REFERER"].'&closeModal');
        exit(0);
    }else {
        $_SESSION['success'] = 'Payment not saved';
        $_SESSION['success_status'] = 'success';
        header("location: ../resident.php");
        exit(0);
    }
}