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
				<h1>Examination Reports</h1>
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
				<table class="w3-table-all">
					<thead>
						<tr>
							<td>No.</td>
							<td>Student IDNO</td>
							<td>Started</td>
							<td>Finished</td>
							<td>Score</td>
						</tr>
					</thead>
					<tbody>
					<?php
					//MAKE THE REPORTS LIST ACCORDING TO SCORE, HIGH TO LOW
					$sql ="SELECT * FROM `studentexam` ORDER BY `score` DESC";
					$query=$conn->query($sql);
					$count=1;
					while($row=$query->fetch_assoc()){
					echo "
						<tr>
							<td>".$count."</td>
							<td>".$row['studID']."</td>
							<td>".$row['started']."</td>
							<td>".$row['finished']."</td>
							<td>".$row['score']."</td>
						</tr>
					";
					$count++;
					}
					?>
					</tbody>
				</table>
			</div>
			<br>
			<br>
			<br>
		</div>
	</body>
</html>

