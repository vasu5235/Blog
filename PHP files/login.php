<?php
	// Start the session
	session_start();
?>
<html>
<title>
</title>

	<body>
		<?php
			require 'connect_to_db.php';
			$blogger_user_name = mysqli_real_escape_string($_POST["username"]);
			$blogger_password = sha1($_POST["password"]);
			$blogger_password = mysqli_real_escape_string($blogger_password); 
			// Create connection
			
			//echo "Connected successfully";
			
			$sql = "SELECT blogger_id, blogger_username, blogger_password,blogger_user_type,blogger_is_active FROM blogger_info where blogger_username = '{$blogger_user_name}' AND blogger_password = '{$blogger_password}'";
			
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					if((strcmp($row["blogger_username"],$blogger_user_name)) == 0 && (strcmp($row["blogger_password"],$blogger_password)) == 0)
					{
						$_SESSION["blogger_id"] = $row["blogger_id"];
						$_SESSION["blogger_user_name"] = $blogger_user_name;
						if($row["blogger_user_type"] == 0)
						{
							//header('Location: home_page_blogger.php');
							$location = "home_page_blogger.php";
						}
						else
						{
							//header('Location: admin_page.php');
							$location = "admin_page.php";
						}
						
					}	
				}
			}
			else
			{
				echo $row["blogger_password"];
				echo $blogger_password;
				echo "<script>alert('Incorrect Username Or Password');</script>";
				$location = "home_page.php";
			}
			
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
			
			mysqli_close($conn);
			
		
		?>
	</body>
</html>