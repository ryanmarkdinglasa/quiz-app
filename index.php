<?php
	session_start();
	include("includes/config.php");
	include("includes/header.php");
?>
	<body>
		<div class="w3-container">
			<div class="login-con border-radius w3-white">
				<label>HOME</label><br>
				<hr>
				<h5><a href="students/." class="btn w3-button w3-light-grey border-radius">Manage Students</a></h5>
				<h5><a href="questions/." class="btn w3-button w3-light-grey border-radius">Manage Questions</a></h5>
				<h5><a href="examination/." class="btn w3-button w3-light-grey border-radius">Take Examination</a></h5>
				<h5><a href="reports/." class="btn w3-button w3-light-grey border-radius">Examination Reports</a></h5>
			</div>
		</div>
	</body>
</html>

