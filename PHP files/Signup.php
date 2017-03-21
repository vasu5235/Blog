<html>
<title>
</title>

	<body>
		<?php
			require 'connect_to_db.php';

			$do_nothing = 0;	
			$not_found = 0;

			print_r[$_POST];
			/*
			$blogger_user_name = mysqli_real_escape_string($conn,$_POST["username"]);
			
			$temp_pass = mysqli_real_escape_string($conn,$_POST["password"]);
			
			$blogger_password = sha1($_POST["password"]);
			
			$blogger_password = mysqli_real_escape_string($conn,$blogger_password);

			echo $blogger_username;	
			echo $temp_pass;
			echo $blogger_password;							
			$temp_pass2 = mysqli_real_escape_string($conn,$_POST["confirm_password"]);
			echo $temp_pass2;

			$blogger_confirm_password = sha1($_POST["confirm_password"]);
			$blogger_confirm_password = mysqli_real_escape_string($conn,$blogger_confirm_password);
			echo $blogger_confirm_password;
			*/
			/*
			if($blogger_password != $blogger_confirm_password){
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
					else{
						echo "Error:" . $sql . "<br>" . mysqli_error($conn); 
					}
				}
				
				mysqli_close($conn);
			}
			*/
			
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
			
		?>
	</body>
</html>