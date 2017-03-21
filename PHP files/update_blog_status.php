<?php
	$blog_id = $_GET['blogid'];
	$isadmin = $_GET['isadmin'];
	$blogger_id = $_GET['bloggerid'];
	require 'connect_to_db.php'; 
	$sql = "SELECT  blog_is_active FROM blog_master WHERE blog_id='{$blog_id}'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		if($row['blog_is_active'] == 0){
			$sql = "UPDATE blog_master SET blog_is_active = 1 WHERE blog_id = '{$blog_id}'";
		}
		else{
			$sql = "UPDATE blog_master SET blog_is_active = 0 WHERE blog_id = '{$blog_id}'";
		}
	}
			
	if(mysqli_query($conn, $sql)){
		header('Location: test.php?var='.$blogger_id);
	}
	mysqli_close($conn);
?>