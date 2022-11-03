<?php
require '../include/session.php';
require '../include/database.php';


if (isset($_POST['updateCost'])) {
	$brgy_forms_price_id = $_POST['brgy_forms_price_id'];
	$clearance = filter_input(INPUT_POST, 'clearance', FILTER_SANITIZE_SPECIAL_CHARS);
	$indigency = filter_input(INPUT_POST, 'indigency', FILTER_SANITIZE_SPECIAL_CHARS);
	$certificate = filter_input(INPUT_POST, 'centificate', FILTER_SANITIZE_SPECIAL_CHARS);
	$residency = filter_input(INPUT_POST, 'residency', FILTER_SANITIZE_SPECIAL_CHARS);
	$building = filter_input(INPUT_POST, 'building', FILTER_SANITIZE_SPECIAL_CHARS);
	$clearance_nat = filter_input(INPUT_POST, 'clearance_nat', FILTER_SANITIZE_SPECIAL_CHARS);
	$business = filter_input(INPUT_POST, 'business', FILTER_SANITIZE_SPECIAL_CHARS);
	$demolished = filter_input(INPUT_POST, 'demolished', FILTER_SANITIZE_SPECIAL_CHARS);
	$good = filter_input(INPUT_POST, 'good', FILTER_SANITIZE_SPECIAL_CHARS);
	$da = filter_input(INPUT_POST, 'da', FILTER_SANITIZE_SPECIAL_CHARS);

	try {

		$query = $conn->prepare("UPDATE `brgy_forms_price` SET `clearance_price`=:clearance_price,`indigency_price`=:indigency_price,`certificate_price`=:certificate_price,`residency_price`=:residency_price,`building_price`=:building_price,`clearance_nat_price`=:clearance_nat_price,`business_clearance_price`=:business_clearance_price,`demolished_price`=:demolished_price,`goodmoral_price`=:goodmoral_price,`da_price`=:da_price WHERE `brgy_forms_price_id` = :brgy_forms_price_id");
		$query->bindParam('clearance_price', $clearance);
		$query->bindParam('indigency_price', $indigency);
		$query->bindParam('certificate_price', $certificate);
		$query->bindParam('residency_price', $residency);
		$query->bindParam('building_price', $building);
		$query->bindParam('clearance_nat_price', $clearance_nat);
		$query->bindParam('business_clearance_price', $business);
		$query->bindParam('demolished_price', $demolished);
		$query->bindParam('goodmoral_price', $good);
		$query->bindParam('da_price', $da);
		$query->bindParam('brgy_forms_price_id', $brgy_forms_price_id, PDO::PARAM_INT);
		$query_execute = $query->execute();

		$activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
	    $date_now = date('Y-m-d H:i:s');
	    $action = "Update Cost of certificate | Updated by $username_sess";
	    $stmt = $conn->prepare($activity_log);
	    $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
	    $stmt->bindParam(':date_now', $date_now);
	    $stmt->bindParam(':action', $action);
	    $stmt->execute();

		if ($query_execute) {
	       	$_SESSION['sucess'] = 'Cost updated successfully';
			$_SESSION['success_status'] = 'success';
			header("location: ../index.php");
	        exit(0);
	    }else {
	        $_SESSION['sucess'] = 'Cost not updated';
			$_SESSION['success_status'] = 'error';
			header("location: ../index.php");
	        exit(0);
	    }


	}catch(PDOException $e) {

		echo "My Error Type:". $e->getMessage();
	}

}