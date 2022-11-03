<?php
require '../include/session.php';
require '../include/database.php';

if (isset($_POST['saveInfo'])) {
	$province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_SPECIAL_CHARS);
	$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
	$brgy = filter_input(INPUT_POST, 'brgy', FILTER_SANITIZE_SPECIAL_CHARS);
	$contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_SPECIAL_CHARS);
	$city_logo = $_FILES['city_logo']['name'];
    $brgy_logo = $_FILES['brgy_logo']['name'];
    $current_city_logo = $_POST['current_city_logo'];
    $current_brgy_logo = $_POST['current_brgy_logo'];
    $brgy_id = 1;


    try {


        // if variable new_image has value it will update the filename to img/"name of file"
        if ($city_logo != '') {
            $update_filename_city = "img/" . $_FILES['city_logo']['name'];
            
        }
        // else it will upload variable current_image to the database
        else
        {
            $update_filename_city = $current_city_logo;
        }
         if ($brgy_logo != ''){
            $update_filename_brgy = "img/" . $_FILES['brgy_logo']['name'];
        }
        else
        {
            $update_filename_brgy = $current_brgy_logo;
        }
       
        if ($_FILES['city_logo']['name'] !='' && $_FILES['brgy_logo']['name'] !='') 
        {
            $query = $conn->prepare("UPDATE `brgy_info` SET `province`=:province,`city`=:city,`brgy`=:brgy,`contact`=:contact,`brgy_logo`=:brgy_logo,`city_logo`=:city_logo WHERE brgy_info_id =:brgy_info_id ");
            $query->bindParam('province', $province);
            $query->bindParam('city', $city);
            $query->bindParam('brgy', $brgy);
            $query->bindParam('contact', $contact);
            $query->bindParam('brgy_logo', $update_filename_brgy);
            $query->bindParam('city_logo', $update_filename_city);
            $query->bindParam('brgy_info_id', $brgy_id, PDO::PARAM_INT);
            $query_execute = $query->execute();

            $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
            $date_now = date('Y-m-d H:i:s');
            $action = "Update Brgy. Info | Updated by $username_sess";
            $stmt = $conn->prepare($activity_log);
            $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
            $stmt->bindParam(':date_now', $date_now);
            $stmt->bindParam(':action', $action);
            $stmt->execute();

            if ($query_execute) {

                move_uploaded_file($_FILES["city_logo"]["tmp_name"], "../img/" . $_FILES["city_logo"]["name"]);
                move_uploaded_file($_FILES["brgy_logo"]["tmp_name"], "../img/" . $_FILES["brgy_logo"]["name"]);
                unlink("../img/".$current_city_logo);
                unlink("../img/".$current_brgy_logo);

                $_SESSION['success'] = "Brgy. Info updated successfully!";
                $_SESSION['success_status'] = "success";
                header("location: ../index.php");
                exit(0);
            }else{
                $_SESSION['success'] = "Something went wrong!";
                $_SESSION['success_status'] = "error";
                header("location: ../index.php");
                exit(0);
            }
        }elseif(empty($_FILES['city_logo']['name']) && $_FILES['brgy_logo']['name'] !=''){
                 $query = $conn->prepare("UPDATE `brgy_info` SET `province`=:province,`city`=:city,`brgy`=:brgy,`contact`=:contact,`brgy_logo`=:brgy_logo,`city_logo`=:city_logo WHERE brgy_info_id =:brgy_info_id ");
            $query->bindParam('province', $province);
            $query->bindParam('city', $city);
            $query->bindParam('brgy', $brgy);
            $query->bindParam('contact', $contact);
            $query->bindParam('brgy_logo', $update_filename_brgy);
            $query->bindParam('city_logo', $update_filename_city);
            $query->bindParam('brgy_info_id', $brgy_id, PDO::PARAM_INT);
            $query_execute = $query->execute();

            $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
            $date_now = date('Y-m-d H:i:s');
            $action = "Update Brgy. Info | Updated by $username_sess";
            $stmt = $conn->prepare($activity_log);
            $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
            $stmt->bindParam(':date_now', $date_now);
            $stmt->bindParam(':action', $action);
            $stmt->execute();


            if ($query_execute) {

                move_uploaded_file($_FILES["city_logo"]["tmp_name"], "../img/" . $_FILES["city_logo"]["name"]);
                move_uploaded_file($_FILES["brgy_logo"]["tmp_name"], "../img/" . $_FILES["brgy_logo"]["name"]);
                unlink("../img/".$current_city_logo);
                unlink("../img/".$current_brgy_logo);

                $_SESSION['success'] = "Brgy. Info updated successfully!";
                $_SESSION['success_status'] = "success";
                header("location: ../index.php");
                exit(0);
            }else{
                $_SESSION['success'] = "Something went wrong!";
                $_SESSION['success_status'] = "error";
                header("location: ../index.php");
                exit(0);
            }
        }elseif($_FILES['city_logo']['name'] !='' && empty($_FILES['brgy_logo']['name'])){
                 $query = $conn->prepare("UPDATE `brgy_info` SET `province`=:province,`city`=:city,`brgy`=:brgy,`contact`=:contact,`brgy_logo`=:brgy_logo,`city_logo`=:city_logo WHERE brgy_info_id =:brgy_info_id ");
            $query->bindParam('province', $province);
            $query->bindParam('city', $city);
            $query->bindParam('brgy', $brgy);
            $query->bindParam('contact', $contact);
            $query->bindParam('brgy_logo', $current_brgy_logo);
            $query->bindParam('city_logo', $update_filename_city);
            $query->bindParam('brgy_info_id', $brgy_id, PDO::PARAM_INT);
            $query_execute = $query->execute();

            $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
            $date_now = date('Y-m-d H:i:s');
            $action = "Update Brgy. Info | Updated by $username_sess";
            $stmt = $conn->prepare($activity_log);
            $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
            $stmt->bindParam(':date_now', $date_now);
            $stmt->bindParam(':action', $action);
            $stmt->execute();


            if ($query_execute) {

                move_uploaded_file($_FILES["city_logo"]["tmp_name"], "../img/" . $_FILES["city_logo"]["name"]);
                move_uploaded_file($_FILES["brgy_logo"]["tmp_name"], "../img/" . $_FILES["brgy_logo"]["name"]);
                unlink("../img/".$current_city_logo);
                unlink("../img/".$current_brgy_logo);

                $_SESSION['success'] = "Brgy. Info updated successfully!";
                $_SESSION['success_status'] = "success";
                header("location: ../index.php");
                exit(0);
            }else{
                $_SESSION['success'] = "Something went wrong!";
                $_SESSION['success_status'] = "error";
                header("location: ../index.php");
                exit(0);
            }
        }
        else
        {
             $query = $conn->prepare("UPDATE `brgy_info` SET `province`=:province,`city`=:city,`brgy`=:brgy,`contact`=:contact,`brgy_logo`=:brgy_logo,`city_logo`=:city_logo WHERE brgy_info_id =:brgy_info_id ");
            $query->bindParam('province', $province);
            $query->bindParam('city', $city);
            $query->bindParam('brgy', $brgy);
            $query->bindParam('contact', $contact);
            $query->bindParam('brgy_logo', $update_filename_brgy);
            $query->bindParam('city_logo', $update_filename_city);
            $query->bindParam('brgy_info_id', $brgy_id, PDO::PARAM_INT);
            $query_execute = $query->execute();

            $activity_log = "INSERT INTO `activity_log`(`username`, `date`, `action`) VALUES (:session_id, :date_now, :action)";
            $date_now = date('Y-m-d H:i:s');
            $action = "Update Brgy. Info | Updated by $username_sess";
            $stmt = $conn->prepare($activity_log);
            $stmt->bindParam(':session_id', $session_id, PDO::PARAM_INT);
            $stmt->bindParam(':date_now', $date_now);
            $stmt->bindParam(':action', $action);
            $stmt->execute();


            if ($query_execute) {

                move_uploaded_file($_FILES["city_logo"]["tmp_name"], "../img/" . $_FILES["city_logo"]["name"]);
                move_uploaded_file($_FILES["brgy_logo"]["tmp_name"], "../img/" . $_FILES["brgy_logo"]["name"]);
                unlink("../img/".$current_city_logo);
                unlink("../img/".$current_brgy_logo);

                $_SESSION['success'] = "Brgy. Info updated successfully!";
                $_SESSION['success_status'] = "success";
                header("location: ../index.php");
                exit(0);
            }else{
                $_SESSION['success'] = "Something went wrong!";
                $_SESSION['success_status'] = "error";
                header("location: ../index.php");
                exit(0);
            }
            
        }


    } catch(PDOException $e) {

        echo "My Error Type:". $e->getMessage();
    }

    
    
}