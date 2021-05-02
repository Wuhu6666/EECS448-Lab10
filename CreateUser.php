<?php
	$users = new mysqli("mysql.eecs.ku.edu","yuyingli","chie7eek","yuyingli");
	$user_id = $_POST["user"];
	if ($users->connect_errno) {
		printf("Connect failed: %s\n", $users->connect_error);
		exit();
	}
    echo"<link rel='stylesheet' type='text/css' href='style.css' />
	<title>Create User</title>
	<br><h1 align='center'>Create User</h1><br>";

	$query = "INSERT INTO Users VALUES ('$user_id')";
	if ($users->query($query)) {
		echo "
		<body align='center'>
			<h3>
			<font color='#eeb08d' size='5'>Username added successfully</font> 
			</h3><br>
			<form method='get' action='CreateUser.html'>
			<button type='submit'>Add More</button>
			</form>
		</body>
		";

	} 
	else {
		echo "
		<body align='center'>
			<h3>
			<font color='#eeb08d' size='5'>This username has been taken:</font> 
			</h3><br>
			<form method='get' action='CreateUser.html'>
			<button type='submit'>Try Again</button>
			</form>
		</body>
			";
	}
	echo"<form method='get' action='index.html'>
	<button type='submit'>Back to Main Page</button>
	</form>";
	$users->close();
?>