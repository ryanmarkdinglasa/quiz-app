<?php
	include("../includes/config.php");
	include("../includes/header.php");
	session_start();
	if(isset($_POST['add'])){	
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
		$sql="SELECT * FROM `question` WHERE `queMain`='$queMain'";
		$query=$conn->query($sql);
		$row=$query->fetch_assoc();
		if(!empty($row)){
			$_SESSION['message']="Question already exist!";
			header("location:index.php");
			exit();
		}
		$sql ="INSERT INTO `question`(`queMain`, `queOpt1`, `queOpt2`, `queOpt3`, `queOpt4`, `queAns`) VALUES ('$queMain','$queOpt1','$queOpt2', '$queOpt3', '$queOpt4', '$queAns')";
		$query=$conn->query($sql);
		if(!$query){
			$_SESSION['message']="Something went wrong!";
			header("location:index.php");
			exit();
		}
			$_SESSION['message']="New Question added!";
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
							<h4>New Question</h4>
							<hr>
							<div class="gorm-group">
							<input type="text" class="form-input" name="queMain" placeholder="Enter the Question.." />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queOpt1" placeholder="Enter the Option 1" />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queOpt2" placeholder="Enter the Option 2" />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queOpt3" placeholder="Enter the Option 3" />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queOpt4" placeholder="Enter the Option 4" />
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="queAns" placeholder="Enter the Answer" />
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
