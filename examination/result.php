<?php
	include("../includes/config.php");
	include("../includes/header.php");
	session_start();
	//
	if(isset($_SESSION['result'])){
		$id=$_SESSION['result'];
	}else{
		header("Location:index.php");
		exit();
	}
	error_reporting(E_ALL);
?>
	<body>
		<div class="w3-container">
			<br>
			<button onclick="location.href='../.'" class="w3-button w3-iskalar border-radius" >Back</button>
			<div class="border-radius">
				<h1>Examination</h1>
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
				<hr style="border:1px solid rgba(0,0,0,0.1);">
			</div>
				<div>
			</div>
			<br>
			<?php
			$sql = "SELECT `question`.*, `studentaker`.*
					FROM `studentaker` 
					INNER JOIN `question` ON `question`.`queID` = `studentaker`.`queID`
					WHERE `studID` = '".$id."'";
			$query = $conn->query($sql);
			$total = $query->num_rows;
			$score = 0;
			while ($row = $query->fetch_assoc()) {
				if (strtoupper($row['queAns']) == strtoupper($row['studAns'])) {
					$score++;
				}
			}
			?>

			<div class="border-radius">
				<div class="container modal" id="">
					<div class="w3-container border-radius">
						<div class="card w3-card-4">
							<h4>Student IDNO: <?php echo $id; ?></h4>
							<hr>
							<div class="form-group">
								<label>Score: <?php echo $score.'/'.$total; ?></label>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div>

			<?php
			$finished = date('Y-m-d H:i:s');
			$sql = "UPDATE `studentexam` SET `finished` = '".$finished."', `score` = '".$score."' WHERE `studID` = '".$id."' ORDER BY `started` DESC LIMIT 1";
			$query = $conn->query($sql);
			unset($_SESSION['result']);
			session_unset();
			session_destroy();
			?>

	</body>
</html>

