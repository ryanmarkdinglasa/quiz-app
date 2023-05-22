<?php
	session_start();
	include("../includes/config.php");
	include("../includes/header.php");
	if(isset($_POST['add'])){
		$student_id =trim($_POST['studID']);	
		$firstname =trim($_POST['studFName']);
		$middlename =trim($_POST['studMName']);
		$lastname=trim($_POST['studLName']);
		$message="";
		if(empty($student_id) or empty($firstname) or empty($lastname) or empty($middlename)){
			$_SESSION['message']="All fields are required";
			header("location:index.php");
			exit();
		}
		$sql="SELECT * FROM `student` WHERE `studID`='$student_id'";
		$query=$conn->query($sql);
		$row=$query->fetch_assoc();
		if(!empty($row)){
			$_SESSION['message']="Student already exist!";
			header("location:index.php");
			exit();
		}
		$sql ="INSERT INTO `student`(`studID`,`studFName`, `studMName`, `studLName`) VALUES ('$student_id','$firstname','$middlename', '$lastname')";
		$query=$conn->query($sql);
		if(!$query){
			$_SESSION['message']="Something went wrong!";
			header("location:index.php");
			exit();
		}
			$_SESSION['message']="New student added!";
			header("location:index.php");
			exit();
	}//register
?>
	<body>
		<div class="w3-container">
			<br>
			<button onclick="location.href='index.php'" class="w3-button w3-iskalar border-radius" >Back</button>
			<div class="border-radius">
				<div class="container modal" id="add">
					<div class="w3-container border-radius">
						<div class="card w3-card-4">
							<form action="" method="POST">
							<h4>New Student</h4>
							<hr>
							<div class="gorm-group">
							<input type="number" class="form-input" name="studID" placeholder="Student IDNO" />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="studFName" placeholder="First Name" />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="studMName" placeholder="Middle Name" />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="studLName" placeholder="Last Name" />
							</div>
							<hr>
							<div class="">
								<input type="submit"  class="w3-button w3-iskalar border-radius w3-right" style="margin-top:-10px" name="add" value="Save" />
							</div>
							</form>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
