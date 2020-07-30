<?php


header('Content-type: application/json');


include("config.php");



if ($_POST["id"]) {
	
	

		 $sql = "DELETE FROM booking_bus WHERE num_booking = :num_booking";
		 $stmt = $dbo->prepare($sql);
		 $stmt->bindParam(':num_booking', $_POST["id"], PDO::PARAM_STR);
		 $stmt->execute();
		 
		 
		 echo json_encode("Delete Successful"); 


}


?>