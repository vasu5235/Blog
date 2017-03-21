<?php
// Start the session
	session_start();
?>
<?php
	$blog_id = $_GET['blogid'];
	$isadmin = $_GET['isadmin'];
	$blogger_id = $_GET['bloggerid'];
	require 'connect_to_db.php'; 
	$sql = "DELETE FROM blog_master where blog_id = '{$blog_id}'";
			
			
	if(mysqli_query($conn, $sql)){
		if($isadmin == 1){
			header('Location: test.php?var='.$blogger_id);
		}else{
			header('Location: home_page_blogger.php');
		}
			
	}
	mysqli_close($conn);
?>
