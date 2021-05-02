<?php
	$sql = new mysqli("mysql.eecs.ku.edu","yuyingli","chie7eek","yuyingli");
	if ($sql->connect_errno) {
		printf("Connect failed: %s\n", $sql->connect_error);
		exit();
	}
    echo"<title>Delete Post</title>
	<link rel='stylesheet' type='text/css' href='style.css' />
    <body align='center'>
    <br><h1>Delete Posts</h1><br>
    ";
	if ($result = $sql->query("SELECT * FROM Posts WHERE true")) {
		while ($row = $result->fetch_assoc()) {
			$postid = $row["post_id"];
			$shoulddelete = $_POST["$postid"];
			if ($shoulddelete) {
				if ($sql->query("DELETE FROM Posts WHERE post_id='$postid'")) {
					echo "
                    <h3>
					<font color='#eeb08d' size='5'>You Deleted Post $postid Successfully.</font>
					</h3>";
				} else {
					echo "<h3><font color='#eeb08d' size='5'>Delete Post $postid Failed.</font></h3><br>
                    ";
				}
			}
		}
		$result->free();
	}
	echo "
    <br><form method='get' action='DeletePosthtml.php'>
    <button type='submit'>Delete More</button>
    </form>
    <form method='get' action='AdminHome.html'>
    <button type='submit'>Back to Admin Home</button>
    </form>
    </body>";
	$sql->close();
?>