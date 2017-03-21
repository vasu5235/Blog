<html>
<title>
</title>

	<body>
	<?php
// define variables and set to empty values
		$do_nothing = 0;	
		$not_found = 0;		

		$username = $password = $confirm_password = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  $blogger_user_name = test_input($_POST["username"]);
		  $blogger_password = test_input($_POST["password"]);
		  $blogger_confirm_password = test_input($_POST["confirm_password"]);
		  
		  $blogger_password = sha1(test_input($_POST["password"]));
		  $blogger_confirm_password = sha1(test_input($_POST["confirm_password"]));
		  //echo $username." ".$password, $confirm_password;
		  //echo "\n".$epass." ".$econfirmpass;
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		if($blogger_password != $blogger_confirm_password)
		{
			echo "<script type='text/javascript'>alert('Passwords do not match');</script>";
			$do_nothing = 1;
			$location = "Signup.html";
		}

		if($do_nothing == 0)
		{
			require 'connect_to_db.php'; 
			//Check for existing username
			$sql = "SELECT blogger_username FROM blogger_info where blogger_username = '{$blogger_user_name}' ";
				
			$result = mysqli_query($conn, $sql);
				
			if (mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					if((strcmp($row["blogger_username"],$blogger_user_name)) == 0)
					{
						echo "<script>alert('Same Username already exists.Try with a different name.');</script>";
						$location = "Signup.html";
						//no need to change location page ie Signup.html
						$not_found = 1;
					}
				}
			}
		

			if($not_found == 0)
			{
				//echo "record not found";

				$sql = "INSERT INTO blogger_info (blogger_username, blogger_password,blogger_creation_date) VALUES ('{$blogger_user_name}','{$blogger_password}',NOW()) ";
								
				if(mysqli_query($conn, $sql))
				{
					//echo "Registration successfull!";
					echo "<script>alert('Your account has been created successfully');</script>";
					$location = "home_page.php";
				}
				else
				{
					echo "Error:" . $sql . "<br>" . mysqli_error($conn); 
				}
			}
			mysqli_close($conn);
		}	
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
			
		?>
	</body>
</html>
