<?php
	session_start();
	include("../includes/config.php");
	include("../includes/header.php");
	
	if(isset($_GET['id'])){
		$id =trim($_GET['id']);	
		$sql ="SELECT * FROM `student` WHERE `studID`='$id'";
		$query=$conn->query($sql);
		$student=$query->fetch_assoc();
	}//if
	else{
		header("location:index.php");
	}//edit student
	//
	if(isset($_POST['submit'])){
		$studID=$id;
		$queID =trim($_POST['queID']);
		$studAns =trim($_POST['studAns']);
		$message="";
		if(empty($queID) or empty($studAns)){
			$_SESSION['message']="All fields are required";
			header("location:index.php");
			exit();
		}
		//
		$sql ="INSERT `studentaker`(`studID`,`queID`,`studAns`) VALUES('$studID','$queID','$studAns')";
		$query=$conn->query($sql);;
		if(!$query){
			//unset($_SESSION['displayedQuestionIds']);
			$_SESSION['message']="Something went wrong!";
			header("location:exam.php?id=".$studID);
			exit();
		}else{
		//$_SESSION['message']="Student updated!";
		header("location:exam.php?id=".$studID);
		exit();
		}
	}
?>
	<body>
		<div class="w3-container">
			<?php
				if(isset($_SESSION['message'])){
				echo "
				<div class='prompt w3-khaki border-radius w3-right'>
					<span>";
						echo"<label>".$_SESSION['message']."</label>";
					echo"
					</span>
				</div>";
				}
				unset($_SESSION['message']);
			?>
			<br>
			<button onclick="location.href='index.php'" class="w3-button w3-iskalar border-radius" >Back</button>
			<?php
				// Retrieve the already displayed question IDs from the session
				$displayedQuestionIds = $_SESSION['displayedQuestionIds'] ?? [];
				
				$count=count($displayedQuestionIds);
				// Query to fetch a random question that has not been displayed yet
				if (!empty($displayedQuestionIds)) {
					$query = "SELECT * FROM `question` WHERE `queID` NOT IN (".implode(",", $displayedQuestionIds).") ORDER BY RAND() LIMIT 1";
				} else {
					$query = "SELECT * FROM `question` ORDER BY RAND() LIMIT 1";
				}
				$result = $conn->query($query);
				//
				/*if($no===$count){
					unset($_SESSION['displayedQuestionIds']);
					$_SESSION['message']="Exam ended!";
					header("location:index.php");
					exit();
				}\*/
				if ($result->num_rows > 0) {
					$question = $result->fetch_assoc();
					// Store the displayed question ID in the session
					$_SESSION['displayedQuestionIds'][] = $question['queID'];
			?>
			<div class="border-radius">
				<div class="container modal" id="edit">
					<div class="w3-container border-radius">
						<div class="card w3-card-4">
							<form action="" method="POST">
							<h4>Question No. <?php echo $count;?></h4>
							<hr>
							<div class="form-group">
								<span>
									<label><?php echo $question['queMain'];?></label>
								</span>
							</div>
							<div class="form-group">
								<span>
									<label><?php echo $question['queOpt1'];?></label>
								</span>
							</div>
							<div class="form-group">
								<span>
									<label><?php echo $question['queOpt2'];?></label>
								</span>
							</div>
							<div class="form-group">
								<span>
									<label><?php echo $question['queOpt3'];?></label>
								</span>
							</div>
							<div class="form-group">
								<span>
									<label><?php echo $question['queOpt4'];?></label>
								</span>
							</div>
							<div class="form-group">
								<input type="text" class="form-input" name="studAns" value="" placeholder="Enter the letter of your answer..." required />
								<input type="hidden" class="form-input" name="queID" value="<?php echo $question['queID'];?>"/>
								
								<span>
									<small>*Enter the letter of your answer.</small>
								</span>
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
			<?php
				}else{
					$sql="SELECT `queID` FROM `question`";
					$query=$conn->query($sql);
					$no=$query->num_rows;
					if($no===$count){
						unset($_SESSION['displayedQuestionIds']);
						$_SESSION['result']=$id;
						header("location:result.php");
						exit();
					}else{
						unset($_SESSION['displayedQuestionIds']);
						$_SESSION['message']="No question listed.";
						header("location:index.php");
						exit();
					}
				}
			?>
		</div>
	</body>
</html>
