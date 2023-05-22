<?php
	include("config.php");
?>
		<div class="container modal" id="add">
			<form action="" method="POST">
			<div class="login-con border-radius">
				<label>New Student</label>
				<hr style="border:1px solid rgba(0,0,0,0.2);">
				<div class="gorm-group">
				<input type="text" class="form-input" name="student_id" placeholder="Student IDNO" />
				</div>
				<div class="form-group">
					<input type="text" class="form-input" name="firstname" placeholder="First Name" />
				</div>
				<div class="form-group">
					<input type="text" class="form-input" name="middlename" placeholder="Middle Name" />
				</div>
				<div class="form-group">
					<input type="text" class="form-input" name="lastname" placeholder="Last Name" />
				</div>
				
				<div class="form-group">
					<input type="email" class="form-input" name="email" placeholder="Email Address" />
				</div>
				<div class="form-group">
					<input type="text" class="form-input" name="course" placeholder="Course" />
				</div>
				<div class="form-group">
					<input type="submit"  class="btn btn-success border-radius" name="add" value="Save" />
				</div>
			</div>
			</form>
		</div>
		<!--
<div class="container modal" id="edit">
			<form action="" method="POST">
			<div class="login-con border-radius">
				<label>Edit Student</label>
				<hr style="border:1px solid rgba(0,0,0,0.2);">
				<div class="gorm-group">
				<input type="text" class="form-input" id="student_id" name="student_id" placeholder="Student IDNO" />
				</div>
				<div class="form-group">
					<input type="text" class="form-input" id="firstname" name="firstname" placeholder="First Name" />
				</div>
				<div class="form-group">
					<input type="text" class="form-input" id="middlename" name="middlename" placeholder="Middle Name" />
				</div>
				<div class="form-group">
					<input type="text" class="form-input" id="lastname" name="lastname" placeholder="Last Name" />
				</div>
				
				<div class="form-group">
					<input type="email" class="form-input" id="email" name="email" placeholder="Email Address" />
				</div>
				<div class="form-group">
					<input type="text" class="form-input" id="course" name="course" placeholder="Course" />
				</div>
				<div class="form-group">
					<input type="submit"  class="btn btn-success border-radius" name="edit" value="Save" />
				</div>
			</div>
			</form>
		</div>
-->