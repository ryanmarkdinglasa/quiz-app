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
				<h1>Student List</h1>
				<?php
				if(isset($_SESSION['message'])){
				echo "
				<div class='prompt w3-khaki border-radius w3-right'>
					<span>";
						echo"<label>".$_SESSION['message']."</label>";
					echo"
					</span>
				</div>";
				unset($_SESSION['message']);
				}
				?>
				<br>
				<br>
				<form action="search.php" method="POST">
					<div class="form-group">
						<input type="text" class="w3-input border-radius"  name="searchID" placeholder="Search..." required />
						<input type="submit" class="w3-button w3-iskalar border-radius w3-right" style="margin-top:10px;" name="search" value="Search" />
					</div>
				</form>
				<br>
				<hr style="border:1px solid rgba(0,0,0,0.1);">
				<button onclick="location.href='add.php'" class="w3-button w3-iskalar border-radius " style="margin-top:0px;" >+ New</button><br><br>
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
					$sql ="SELECT * FROM `student`";
					$query=$conn->query($sql);
					while($row=$query->fetch_assoc()){
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

