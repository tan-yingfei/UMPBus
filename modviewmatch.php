<?php

header('Content-type: application/json');
include "config.php";

if ($_POST["name"] == "title") {

    
$sqlu = "UPDATE booking_bus SET title = :title WHERE num_booking = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':title', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}
elseif ($_POST["name"] == "date") {


$sqlu = "UPDATE booking_bus SET date = :date WHERE num_booking = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':date', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}
elseif ($_POST["name"] == "date_last") {


$sqlu = "UPDATE booking_bus SET date_last = :date_last WHERE num_booking = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':date_last', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}
elseif ($_POST["name"] == "time") {


$sqlu = "UPDATE booking_bus SET time = :time WHERE num_booking = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':time', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}
elseif ($_POST["name"] == "time_last") {


$sqlu = "UPDATE booking_bus SET time_last = :time_last WHERE num_booking = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':time_last', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}
elseif ($_POST["name"] == "driver") {


$sqlu = "UPDATE booking_bus SET driver = :driver WHERE num_booking = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':driver', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}
elseif ($_POST["name"] == "place") {


$sqlu = "UPDATE booking_bus SET place = :place WHERE num_booking = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':place', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}


?>