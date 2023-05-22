<?php
	session_start();
	include ("../includes/config.php");
	if(isset($_POST['start-exam'])){
		$id =trim($_POST['studID']);	
		$sql ="SELECT `studID` FROM `student` WHERE `studID`='$id'";
		$query=$conn->query($sql);
		if(!$query){
			$_SESSION['message']="Something went wrong.";
			header("location:index.php");
			exit();
		}
		if( $query->num_rows == 0){
			$_SESSION['message']="Student doesn't exist.";
			header("location:index.php");
			exit();
		}
		$sql="SELECT `studID` FROM `studentaker` WHERE `studID`='".$id."'";
		$query=$conn->query($sql);
		if( $query->num_rows != 0){
			$_SESSION['message']="Student already take the exam.";
			header("location:index.php");
			exit();	
		}
		//NO ERROR
		$start=date('Y-m-d H:i:s');
		$score=0;
		$sql = "INSERT INTO `studentexam` (`studID`, `started`, `score`) VALUES ('$id', '$start', '$score')";
		$query=$conn->query($sql);
		header("location:exam.php?id=".$id);
		exit();
	}//delete student
?>