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
			  $blog_title = test_input($_POST["blog_title"]);
			  $blog_desc = $POST["blog_desc"];
			  $blog_category = test_input($_POST["blog_category"]);
		}

			function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
			}
/*
		$blog_title = mysqli_real_escape_string($conn,$_POST["blog_title"]);
		
		$blog_desc = mysqli_real_escape_string($conn,$_POST["blog_desc"]);
		$blog_category = mysqli_real_escape_string($conn,$_POST["blog_category"]);

*/
		$blogger_id = $_SESSION["blogger_id"];
		$blogger_user_name = $_SESSION["blogger_user_name"];
		
		//$target_file =  $_FILES["fileToUpload"]["name"];
		//$imgi = $_FILES["fileToUpload"]["tmp_name"];
		
		// Create connection
		//$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		} 
		//echo "Connected successfully";
		//move_uploaded_file($imgi,'images/'.$target_file);
		//$sql = "INSERT INTO blog_master (blog_title, blogger_id, blog_desc, blog_category,blog_author,blog_image, creation_date,updated_date) VALUES('{$blog_title}','{$blogger_id}','{$blog_desc}','{$blog_category}','{$blogger_user_name}','{$target_file}', NOW(),NOW())" ;
		$sql = "INSERT INTO blog_master (blog_title, blogger_id, blog_desc, blog_category,blog_author, creation_date,updated_date) VALUES('{$blog_title}','{$blogger_id}','$blog_desc','{$blog_category}','{$blogger_user_name}', NOW(),NOW())" ;
				
		//$result = mysqli_query($conn, $sql);
				
		if (mysqli_query($conn, $sql)){
			

			$sql2 = $conn->query("SELECT blog_id FROM blog_master WHERE blogger_id = '$blogger_id' ORDER BY blog_id DESC");
			$row = $sql2->fetch_object();
			$temp = $row->blog_id;
			$folder = "myimages";
			$upload_image = $_FILES["fileToUpload"]["name"];
//!---------------------------------------------------------------------------------------------------------------------------------------
			$target_dir = "myimages/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        //echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
//!-----------------------------------------------------------------------------------------------------------------------------
			$sql3 = $conn->query("INSERT INTO blog_detail (blog_id, image_name, blog_detail_image) VALUES ('$temp','$folder', '$target_file')");

			$sql1 = "UPDATE blogger_info SET blogger_updated_date = NOW() WHERE blogger_username = '{$blogger_user_name}'";
			if (mysqli_query($conn, $sql1)){
				header('Location: home_page_blogger.php');
			}
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
		}
				
		mysqli_close($conn);
	?>
</body>
</html>