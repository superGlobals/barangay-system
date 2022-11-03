<?php

// query for baranagay info
$query = $conn->prepare("SELECT * FROM brgy_info");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $brgy_info);

// query for barangay form price
$query_form = $conn->prepare("SELECT * FROM brgy_forms_price");
$query_form->execute();
$price_result = $query_form->fetchAll(PDO::FETCH_ASSOC);
foreach($price_result as $fees);

// query for purok
$query_purok = $conn->prepare("SELECT * FROM purok");
$query_purok->execute();
$purok_result = $query_purok->fetchAll(PDO::FETCH_ASSOC);

// query for barangay official
$query_official = $conn->prepare("SELECT * FROM brgy_official LEFT JOIN position ON position.position_id 
		= brgy_official.position ORDER BY position_id ASC");
$query_official->execute();
$official_result = $query_official->fetchAll(PDO::FETCH_ASSOC);

$query_slider = $conn->prepare("SELECT * FROM image_slider");
$query_slider->execute();
$sliders = $query_slider->fetchAll(PDO::FETCH_ASSOC);

$query_notif = $conn->prepare("SELECT * FROM notification LEFT JOIN user ON notification.user_id = user.user_id LEFT JOIN brgy_request_certificate ON notification.brgy_clearance_id = brgy_request_certificate.brgy_clearance_id WHERE res_id =:res_id ORDER BY notification_id DESC");
$query_notif->bindParam('res_id', $_SESSION['unique_id'], PDO::PARAM_INT);
$query_notif->execute();
$notif_results = $query_notif->fetchAll(PDO::FETCH_ASSOC);
$count_total = $query_notif->rowCount();

$query_count = $conn->prepare("SELECT * FROM notification WHERE res_id =:id AND notif_status = 0");
$query_count->bindParam('id', $_SESSION['unique_id'], PDO::PARAM_INT);
$query_count->execute();
$count_notif = $query_count->rowCount(); 


// query for baranagy resident
$query_res = $conn->prepare("SELECT * FROM resident WHERE resident_id =:resident_id LIMIT 1");
$query_res->bindParam('resident_id', $_SESSION['unique_id'], PDO::PARAM_INT);
$query_res->execute();
$resident_query = $query_res->fetch(PDO::FETCH_ASSOC);


// query for pending request
$query_pending = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE resident_id =:resident_id AND status ='pending' ORDER BY brgy_clearance_id DESC");
$query_pending->bindParam('resident_id', $_SESSION['unique_id']);
$query_pending->execute();
$pending_result = $query_pending->fetchAll(PDO::FETCH_ASSOC);
$count_pending = $query_pending->rowCount();

// query for accepted request
$query_accepted = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE resident_id =:resident_id AND status = 'accepted' ORDER BY brgy_clearance_id DESC");
$query_accepted->bindParam('resident_id', $_SESSION['unique_id']);
$query_accepted->execute();
$accept_result = $query_accepted->fetchAll(PDO::FETCH_ASSOC);
$count_process = $query_accepted->rowCount();

// query for ready tp pikcup request
$query_pickup = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE resident_id =:resident_id AND status = 'ready to pick up' ORDER BY brgy_clearance_id DESC");
$query_pickup->bindParam('resident_id', $_SESSION['unique_id']);
$query_pickup->execute();
$pickup_result = $query_pickup->fetchAll(PDO::FETCH_ASSOC);
$count_pickup = $query_pickup->rowCount();


// query for decline request
$query_decline = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE resident_id =:resident_id AND status ='decline' ORDER BY brgy_clearance_id DESC");
$query_decline->bindParam('resident_id', $_SESSION['unique_id']);
$query_decline->execute();
$decline_result = $query_decline->fetchAll(PDO::FETCH_ASSOC);
$count_decline = $query_decline->rowCount();

// query for completed request
$query_completed = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE resident_id =:resident_id AND status ='completed' ORDER BY brgy_clearance_id DESC");
$query_completed->bindParam('resident_id', $_SESSION['unique_id']);
$query_completed->execute();
$complete_result = $query_completed->fetchAll(PDO::FETCH_ASSOC);

// query for cancel request
$query_completed = $conn->prepare("SELECT * FROM brgy_request_certificate WHERE resident_id =:resident_id AND status ='cancel' ORDER BY brgy_clearance_id DESC");
$query_completed->bindParam('resident_id', $_SESSION['unique_id']);
$query_completed->execute();
$cancel_request = $query_completed->fetchAll(PDO::FETCH_ASSOC);

// query blotter view 

$blotter = $conn->prepare("SELECT * FROM blotter");
$blotter->execute();
$blotter_results = $blotter->fetchAll(PDO::FETCH_ASSOC);
$blotter_count = $blotter->rowCount();

// join purok and brgy_info table
$combine = $conn->prepare("SELECT * FROM purok JOIN brgy_info");
$combine->execute();
$combine_result = $combine->fetchAll(PDO::FETCH_ASSOC);
