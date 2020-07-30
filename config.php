<?php
$host_name = "localhost";
$database = "bus"; 
$username = "root"; 
$password = "";
$webaddress = "localhost";


try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
$dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>