<?php
	session_start();
	include("../includes/config.php");
	include("../includes/header.php");
	
	if(isset($_GET['id'])){
		$id =trim($_GET['id']);	
		$sql ="SELECT * FROM `question` WHERE `queID`='$id'";
		$query=$conn->query($sql);
		$row=$query->fetch_assoc();
	}//if
	else{
		header("location:index.php");
	}//edit student
	
	if(isset($_POST['edit'])){
		$queMain =trim($_POST['queMain']);
		$queOpt1 =trim($_POST['queOpt1']);
		$queOpt2 =trim($_POST['queOpt2']);
		$queOpt3 =trim($_POST['queOpt3']);
		$queOpt4 =trim($_POST['queOpt4']);
		$queAns =trim($_POST['queAns']);
		$message="";
		if(empty($queMain) or empty($queOpt1) or empty($queOpt2) or empty($queOpt3) or empty($queOpt4) or empty($queAns)){
			$_SESSION['message']="All fields are required";
			header("location:index.php");
			exit();
		}
		$sql ="UPDATE `question` SET `queMain`='$queMain',`queOpt1`='$queOpt1',`queOpt2`='$queOpt2',`queOpt3`='$queOpt3',`queOpt4`='$queOpt4',`queAns`='$queAns' WHERE `queID`='$id'";
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
				<div class="container modal" id="edit">
					<div class="w3-container border-radius">
						<div class="card w3-card-4">
							<form action="" method="POST">
							<h4>Edit Question</h4>
							<hr>
							<div class="gorm-group">
							<input type="number" class="form-input" name="queID" placeholder="Question ID" value="<?php echo $row['queID'];?>" readonly />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queMain" value="<?php echo $row['queMain'];?>" placeholder="Enter the Question..." required />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queOpt1" value="<?php echo $row['queOpt1'];?>" placeholder="Enter the Option 1..." required />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queOpt2" value="<?php echo $row['queOpt2'];?>" placeholder="Enter the Option 1..." required />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queOpt3" value="<?php echo $row['queOpt3'];?>" placeholder="Enter the Option 1..." required />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queOpt4" value="<?php echo $row['queOpt4'];?>" placeholder="Enter the Option 1..." required />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queAns" value="<?php echo $row['queAns'];?>" placeholder="Enter the Option 1..." required />
							</div>
							<hr>
							<div class="">
								<input type="submit"  class="w3-button w3-iskalar border-radius w3-right" style="margin-top:-10px" name="edit" value="Save" />
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
