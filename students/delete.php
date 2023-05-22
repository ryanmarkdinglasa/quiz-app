<?php
	include ("../includes/config.php");
	session_start();
	if(isset($_GET['id'])){
		$id =trim($_GET['id']);	
		$sql ="DELETE FROM `student` WHERE `studID`='$id'";
		$query=$conn->query($sql);
		if($query){
			$_SESSION['message']="Student deleted.";
			header("location:index.php?message=".$message);
			exit();
		}
		else{
			$_SESSION['message']="Something went wrong.";
			header("location:index.php?message=".$message);
			exit();
		}
	}//delete student
?>