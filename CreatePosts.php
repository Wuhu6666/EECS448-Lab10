<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu","yuyingli","chie7eek","yuyingli");
	$content = $_POST["content"];	
	$user_id = $_POST["user"];
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$userquery = "SELECT * FROM Users WHERE user_id='$user_id'";
	echo"<title>Create Posts</title>
	<link rel='stylesheet' type='text/css' href='style.css' />
	<br><h1 align='center'>Create Posts</h1><br>";
	if ($mysqli->query($userquery)->num_rows) {
		//since author id refrences the user id
		//insert user id as author id
		$postquery = "INSERT INTO Posts (content,author_id) VALUES ('$content','$user_id')";
		if ($mysqli->query($postquery)) {
			echo"
			<body align='center'>
				<h3 align='center'>
				<font color='#eeb08d' size='5'>Post Saved Successfully.</font> 
				</h3><br>
				<form method='get' action='CreatePosts.html'>
				<button type='submit'>Add more Post</button>
				</form>
			</body>
				";
		} 
		else {
		echo"
		<body align='center'>
			<h3 align='center'>
			<font color='#eeb08d' size='5'>Error:" . $mysqli->error . "</font>
			</h3><br>
			<form method='get' action='CreatePosts.html'>
			<button type='submit'>Try Again</button>
			</form>
		</body>
			";
		}
	} 
	else {
		echo"
		<body align='center'>
			<h3 align='center'>
			<font color='#eeb08d' size='5'>Invalid Username: The username doesn't exist.</font>
			</h3><br>
			<form method='get' action='CreatePosts.html'>
			<button type='submit'>Try Again</button>
			</form>
		</body>
			";
	}
	echo"<form method='get' action='index.html'>
	<button type='submit'>Back to Main Page</button>
	</form>";
	$mysqli->close(); 
?>