<?php


header('Content-type: application/json');


include("config.php");



if ($_POST["id"]) {
    
		 $sql = "DELETE FROM user_booking WHERE num_user_booking = :num_user_booking";
		 $stmt = $dbo->prepare($sql);
		 $stmt->bindParam(':num_user_booking', $_POST["id"], PDO::PARAM_STR);
		 $stmt->execute();
		 
		 
		 echo json_encode("Delete Successful"); 


}


?>