<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu","yuyingli","chie7eek","yuyingli");
	$user = $_POST["user"];
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

	$query = "SELECT * FROM Posts WHERE  author_id = '" . $mysqli->real_escape_string($user) . "'";
	if ($result = $mysqli->query($query)) {
		echo "
		<link rel='stylesheet' type='text/css' href='style.css' />
        <body align='center'>
        <title>ViewUserPosts</title>
        <br><h1>View User Posts</h1><br>
        <table border ='1' style='width: 30%;margin:auto' bgcolor='#e3effd'> 
        <tr><th>Post ID</th><th>Content</th>";
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td align='center'>" . $row["post_id"] . "</td><td>" . $row['content'] . "</td></tr>"; 
		}
		$result->free();
		echo "</table><br><br>
        <form method='get' action='ViewUserPostshtml.php'>
		<button type='submit'>Search For Another User Post</button>
		</form>
        <form method='get' action='AdminHome.html'>
		<button type='submit'>Back to Admin Home</button>
		</form>
        ";
	} else {
		echo "Error: " . $result . "<br>" . $mysqli->error;
		echo "
        <form method='get' action='ViewUserPostshtml.php'>
		<button type='submit'>Search For Another User Post</button>
		</form>
        <form method='get' action='AdminHome.html'>
		<button type='submit'>Back to Admin Home</button>
		</form>
        ";
	}
	$mysqli->close();
?>