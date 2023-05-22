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
				<h1>Question List</h1>
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
							<td>No.</td>
							<td>Question</td>
							<td>Option 1</td>
							<td>Option 2</td>
							<td>Option 3</td>
							<td>Option 4</td>
							<td>Answer</td>
							<td >Actions</td>
						</tr>
					</thead>
					<tbody>
					<?php
					$sql ="SELECT * FROM `question`";
					$query=$conn->query($sql);
					$count=1;
					while($row=$query->fetch_assoc()){
					echo "
						<tr>
							<td>".$count."</td>
							<td>".$row['queMain']."</td>
							<td>".$row['queOpt1']."</td>
							<td>".$row['queOpt2']."</td>
							<td>".$row['queOpt3']."</td>
							<td>".$row['queOpt4']."</td>
							<td>".$row['queAns']."</td>
							<td>
							<button onclick='edit(".$row['queID'].");' class='w3-button w3-iskalar border-radius'>Edit</button>
							<button onclick='deletes(".$row['queID'].");' class='w3-button w3-red border-radius'>Delete</button>
							</td>
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

