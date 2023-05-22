<?php
	session_start();
	include ("../includes/config.php");
	if(isset($_GET['id'])){
		$id =trim($_GET['id']);	
		$sql ="DELETE FROM `question` WHERE `queID`='$id'";
		$query=$conn->query($sql);
		if($query){
			$_SESSION['message']="Question deleted.";
			header("location:index.php");
			exit();
		}
		else{
			$_SESSION['message']="Something went wrong.";
			header("location:index.php");
			exit();
		}
	}//delete student
?>