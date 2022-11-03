<?php
 $water = $conn->prepare("select * from brgy_info");
    $water->execute();
    $qwe = $water->fetchAll(PDO::FETCH_ASSOC);
    foreach($qwe as $brgy_info);

    // fetching resident info from database
    $query = "SELECT * FROM resident WHERE resident_id =:resident_id";
    $result = $conn->prepare($query);
    $result->bindParam('resident_id', $id, PDO::PARAM_INT);
    $result->execute();
    $residents = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach($residents as $resident);

    $price = $conn->prepare("SELECT * FROM brgy_forms_price");
    $price->execute();
    $prices = $price->fetchAll(PDO::FETCH_ASSOC);
    foreach($prices as $bayad);

    
    

    // making a connection between brgy_official table and postion table in database
   $query = $conn->prepare("SELECT * FROM brgy_official WHERE position ='Chairman'");
   $query->execute();
   $captains = $query->fetchAll(PDO::FETCH_ASSOC);
   foreach($captains as $captain);

    $s = $conn->prepare("SELECT * FROM brgy_official WHERE position='Secretary'");
    $s->execute();
    $secs = $s->fetchAll(PDO::FETCH_ASSOC);
    foreach($secs as $sec);

    $treasurer = $conn->prepare("SELECT * FROM brgy_official WHERE position='Treasurer'");
    $treasurer->execute();
    $ts = $treasurer->fetchAll(PDO::FETCH_ASSOC);
    foreach($ts as $t);

    $sk = $conn->prepare("SELECT * FROM brgy_official WHERE position='SK. Chairman'");
    $sk->execute();
    $skks = $sk->fetchAll(PDO::FETCH_ASSOC);
    foreach($skks as $skk);