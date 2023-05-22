<?php
	include("../includes/config.php");
	include("../includes/header.php");
	session_start();
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
			<div class="border-radius">
				<div class="container modal" id="">
					<div class="w3-container border-radius">
						<div class="card w3-card-4">
							<form action="filter.php" method="POST">
							<h4>Student IDNO</h4>
							<hr>
							<div class="gorm-group">
							<input type="text" class="form-input" name="studID" placeholder="Enter Student IDNO.." required />
							</div>
							<hr>
							<div class="">
								<input type="submit"  class="w3-button w3-iskalar border-radius w3-right" style="margin-top:-10px" name="start-exam" value="Start" />
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

