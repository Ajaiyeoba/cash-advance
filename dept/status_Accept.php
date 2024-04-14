<?php

//require_once("DBConnection.php");
require '../config.php';
session_start();

if(!isset($_SESSION["sess_user"])){
	header("Location: dept.php");
  }
else{

	$id = $_GET['id'];
	$request = $_GET['request'];

	$add_to_db = mysqli_query($link,"UPDATE staff_requests SET status='Accepted' WHERE id='".$id."' AND request='".$request."'");

				if($add_to_db){	
					echo 'Saved!!';
					header("Location: dept.php");
				}
				else{
					echo "Query Error : " . "UPDATE leaves SET status='Accepted' WHERE id='".$id."' AND request='".$request."'" . "<br>" . mysqli_error($conn);
				}
	}

	ini_set('display_errors', true);
	error_reporting(E_ALL);  
         
?>