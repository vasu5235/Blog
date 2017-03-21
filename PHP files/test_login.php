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

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			  $blogger_user_name = test_input($_POST["username"]);
			  $blogger_password = test_input($_POST["password"]);
			  $blogger_password = sha1(test_input($_POST["password"]));
		}

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
			//echo $blogger_password." ".$blogger_user_name;

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
							$_SESSION["blogger_user_type"] = 0;
							$location = "home_page_blogger.php";
						}
						else
						{
							$_SESSION["blogger_user_type"] = 1;
							
							$location = "admin_page.php";
						}
						
					}	
				}
			}
			else
			{
				//echo $row["blogger_password"];
				//echo $blogger_password;
				echo "<script>alert('Incorrect Username Or Password');</script>";
				$location = "home_page.php";
			}
			
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
			
			mysqli_close($conn);
	?>
	</body>
</html>