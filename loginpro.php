<?php
session_start(); 
include("config.php");

$email = $_POST["email"];
$pwd = $_POST["pwd"];


$stmt = $dbo->prepare("SELECT * FROM user WHERE usern = :usern AND passd = :passd");
$stmt->bindParam(':usern', $email); 
$stmt->bindParam(':passd', $pwd);
$stmt->execute();

if ($stmt->rowCount() > 0) {

		header('Location: admin.php');

		$_SESSION["user"] = true;

		}

		else

		{

		header("Location: login.php?error=1");

		}

?>