<?php
	session_start();
	include("../includes/config.php");
	include("../includes/header.php");
?>
	<body>
		<div class="w3-container">
			<br>
			<button onclick="location.href='index.php'" class="w3-button w3-iskalar border-radius" >Back</button>
			<div class="border-radius">
				<h1>Question Search</h1>
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
				<hr>
				<table class="w3-table-all">
					<thead>
						<tr>
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
					if(isset($_POST['search'])){
						$searchID = trim($_POST['searchID']);
						$sql = "SELECT * FROM `question`
								WHERE `queMain` LIKE '%".$searchID."%'
								OR `queOpt1` LIKE '%".$searchID."%'
								OR `queOpt2` LIKE '%".$searchID."%'
								OR `queOpt3` LIKE '%".$searchID."%'
								OR `queOpt4` LIKE '%".$searchID."%'
								OR `queAns` LIKE '%".$searchID."%'
								";
						$query = $conn->query($sql);
						if(empty($searchID) or !$query or $query->num_rows == 0){
							$_SESSION['message']="No question record found.";
							header("location:index.php");
							exit();
						}
						while($row = $query->fetch_assoc()){
							echo "
								<tr>
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



