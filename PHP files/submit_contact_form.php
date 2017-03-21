<html>
<head>
</head>
<body>

<?php
		require 'connect_to_db.php';

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$name = test_input($_POST["name"]);
			$email = $_POST["email"];
			$subject = test_input($_POST["subject"]);
		}

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}


	
	
	$sql = "INSERT INTO contact_form (name, email,subject) values('{$name}','{$email}','{$subject}')";
		
	if(mysqli_query($conn,$sql)){
		/*echo '<script>';
		echo 'alert("Succesfully Completed");';
		echo 'window.loction = "home_page.php";';
		echo '</script>';*/
		header('Location: home_page.php');
	}

?>
</body>
</html>