<?php
	include("../includes/config.php");
	include("../includes/header.php");
	session_start();
	//session_start();
	if(isset($_GET['id'])){
		$id =trim($_GET['id']);	
		$sql ="SELECT * FROM `student` WHERE `studID`='$id'";
		$query=$conn->query($sql);
		$row=$query->fetch_assoc();
	}//if
	else{
		header("location:index.php");
	}//edit student
	
	if(isset($_POST['submit'])){
		$student_id =trim($_POST['studID']);	
		$firstname =trim($_POST['studFName']);
		$middlename =trim($_POST['studMName']);
		$lastname=trim($_POST['studLName']);
		if(empty($student_id) or empty($firstname) or empty($lastname) or empty($middlename)){
			$_SESSION['message']="All fields are required";
			header("location:index.php");
			exit();
		}
		$sql ="UPDATE `student` SET `studID`='$student_id',`studFName`='$firstname',`studMName`='$middlename',`studLName`='$lastname' WHERE `studID`='$id'";
		$query=$conn->query($sql);;
		if(!$query){
			$_SESSION['message']="Something went wrong!";
			header("location:index.php");
			exit();
		}
		$_SESSION['message']="Student updated!";
		header("location:index.php");
		exit();
	}
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
						<h4>Edit Student</h4>
						<hr>
						<div class="gorm-group">
						<input type="number" class="form-input" name="studID" placeholder="Student IDNO" value="<?php echo $row['studID'];?>" readonly />
						</div>
						<div class="form-group">
							<input type="text" class="form-input" name="studFName" value="<?php echo $row['studFName'];?>" placeholder="First Name" required />
						</div>
						<div class="form-group">
							<input type="text" class="form-input" name="studMName" placeholder="Middle Name" value="<?php echo $row['studMName'];?>" />
						</div>
						<div class="form-group">
							<input type="text" class="form-input" name="studLName" placeholder="Last Name" value="<?php echo $row['studLName'];?>" required />
						</div>
						<hr>
						<div class="">
							<input type="submit"  class="w3-button w3-iskalar border-radius w3-right" style="margin-top:-10px" name="submit" value="Save" />
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
