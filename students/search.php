<?php
	include("../includes/config.php");
	include("../includes/header.php");
	session_start();
?>
	<body>
		<div class="w3-container">
			<br>
			<button onclick="location.href='index.php'" class="w3-button w3-iskalar border-radius" >Back</button>
			<div class="border-radius">
				<h1>Student Search</h1>
				<?php
				if(isset($_GET['message'])){
				echo "
				<div class='prompt w3-khaki border-radius w3-right'>
					<span>";
						echo"<label>".$_GET['message']."</label>";
					echo"
					</span>
				</div>";
				unset($_SESSION['message']);
				}
				?>
				<hr>
				<table class="w3-table-all">
					<thead>
						<tr>
							<td>Student ID</td>
							<td>First Name</td>
							<td>Middle Name</td>
							<td>Last Name</td>
							<td >Actions</td>
						</tr>
					</thead>
					<tbody>
					<?php
					if(isset($_POST['search'])){
						$searchID = trim($_POST['searchID']);
						$sql = "SELECT * FROM `student`
								WHERE `studID` LIKE '%".$searchID."%'
								OR `studFName` LIKE '%".$searchID."%'
								OR `studMName` LIKE '%".$searchID."%'
								OR `studLName` LIKE '%".$searchID."%'
								";
						$query = $conn->query($sql);
						if(empty($searchID) or !$query or $query->num_rows == 0){
							$_SESSION['message']="No student record found.";
							header("location:index.php");
							exit();
						}
						while($row = $query->fetch_assoc()){
							echo "
								<tr>
									<td>".$row['studID']."</td>
									<td>".$row['studFName']."</td>
									<td>".$row['studMName']."</td>
									<td>".$row['studLName']."</td>
									<td>
										<button onclick='edit(".$row['studID'].");' class='w3-button w3-iskalar border-radius'>Edit</button>
										<button onclick='deletes(".$row['studID'].");' class='w3-button w3-red border-radius'>Delete</button>
									</td>
								</tr>
							";
						}
					} else {
						$_SESSION['message']="Search something!";
						header("location:index.php");
						exit();
					}

					?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>



