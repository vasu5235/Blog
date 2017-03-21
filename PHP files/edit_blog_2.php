<?php
// Start the session
session_start();
?>
<?php 

		require 'connect_to_db.php';

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		
			$blogger_user_name = $_SESSION["blogger_user_name"];
			$blog_id = $_SESSION['blog_id'];

			if(empty($_POST["blog_title"]))
			{
				$blog_title = $_SESSION["blog_title"];
			} 
			else
			{
				$blog_title = $_POST["blog_title"];
			}
			if(empty($_POST["blog_desc"])){
				$blog_desc = $_SESSION["blog_desc"];

			} else{
				$blog_desc = mysqli_real_escape_string($conn,$_POST["blog_desc"]) ;
			}
			if(empty($_POST["blog_category"])){
				$blog_category = $_SESSION["blog_category"];
			} else{
				$blog_category = $_POST["blog_category"];
			}
			
			require 'connect_to_db.php';
			
			$sql = "UPDATE blog_master SET blog_title = '{$blog_title}', blog_desc = '$blog_desc', blog_category = '{$blog_category}',updated_date = NOW(),blog_is_active = 0 WHERE blog_id = '{$blog_id}' AND blog_author='{$blogger_user_name}'";
			
			if(mysqli_query($conn, $sql)){
				$sql = "UPDATE blogger_info SET blogger_updated_date = NOW() WHERE blogger_username = '{$blogger_user_name}'";

//***************************************************************************
$target_dir = "myimages/";
$folder = "myimages";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
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
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//$queryimg = $conn->query("UPDATE blog_detail SET image_name='$folder', blog_detail_image='$target_file' WHERE blog_id='$blog_id' ");
//$sql3 = $conn->query("INSERT INTO blog_detail (blog_id, image_name, blog_detail_image) VALUES ('$temp','$folder', '$target_file')");
//***************************************************************************				




				if(mysqli_query($conn, $sql)){
					header('Location: home_page_blogger.php');
				}
			}
			 else {
				echo "Error updating record: " . mysqli_error($conn);
			}
			
			mysqli_close($conn);
		}
	?>