<html>
	<style>
		.modal{
			//display:none;
		}
		body{
			background:rgb(240,240,242);
		}
		.border-radius{
			border-radius:10px;
		}
		.login-con{
			width:800px;
			/height:400px;
			margin:10% auto;
			border:1px solid grey;
			padding:20px 20px;
			font-size:25px;
			background:#FFF;
		}
		.form-input{
			border-radius:5px;
			width:100%;
			height:40px;
			border:1px solid grey;
			padding:10px 10px;
		}
		.form-group{
			margin-top:10px;
		}
		.btn{
			width:150px;
			height:40px;
		}
		.btn-success{
			background:rgb(	115,43,245);
			color:#FFF;
			border:none;
			width:100px;
			height:40px;
			cursor:pointer;
		}
		.btn-danger{
			background:rgb(	235,51,36);
			color:#FFF;
			border:none;
			width:100px;
			height:40px;
			cursor:pointer;
		}
		.btn-success:hover{
			background:rgba(	115,43,245,0.7);
		}
		.pull-right{
			margin-left:150px;
		}

		.btn {
			width:100%;
			color:white;
			background:red;
		}
		.prompt{
			width:300px;
			height:50px;
			padding:10px 10px;
			margin-top:-30px;
			text-align:center;
			line-height:30px;
		}
		.card{
			width:500px;
			margin:0 auto;
			padding:20px 20px;
			background:#FFF;
			border-radius:10px;
		}
	</style>
	<script>
		function deletes(id){
			if (confirm("Are you an orphan?") == true) {
				location.href='delete.php?id='+id;
			  } 
		}
		function edit(id){
			location.href='edit.php?id='+id;
		}
		
	</script>
	<head>
		<title>Skill Test 42</title>
		<link rel="stylesheet" href="includes/w3.css">
		<link rel="stylesheet" href="../includes/w3.css">
	</head>