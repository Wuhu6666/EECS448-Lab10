<?php
	$sql = new mysqli("mysql.eecs.ku.edu","yuyingli","chie7eek","yuyingli");
	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}

	$userquery = "SELECT * FROM Users WHERE true";
	echo "<title>View Users</title>
	<link rel='stylesheet' type='text/css' href='style.css' />
    <body align='center'>
    <br><h1>View Users</h1><br>
    <table border ='1' style='width: 30%;margin:auto' bgcolor='#e3effd'>
          <tr><th>Username</th></tr>";
	if ($result = $sql->query($userquery)) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr><td align='center'>" . $row["user_id"] . "</td></tr>";
		}
		$result->free();
	}
	echo "</table></body><br><br>
        <form method='get' action='AdminHome.html'>
		<button type='submit'>Back to Admin Home</button>
		</form>
    ";
	$sql->close();
?>