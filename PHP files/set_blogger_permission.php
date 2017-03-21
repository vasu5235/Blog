<?php
// Start the session
session_start();
?>
<?php
	$blogger_id = $_GET['var'];
	//$blogger_user_name = $_SESSION["blogger_user_name"];
	require 'connect_to_db.php'; 
	$sql = "SELECT blogger_is_active FROM blogger_info WHERE blogger_id='{$blogger_id}'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		$row = mysqli_fetch_assoc($result);
		if($row['blogger_is_active'] == 0){
			$sql = "UPDATE blogger_info SET blogger_is_active = 1 WHERE blogger_id = '{$blogger_id}'";
		}else{
			$sql = "UPDATE blogger_info SET blogger_is_active = 0 WHERE blogger_id = '{$blogger_id}'";
		}
	}
	if(mysqli_query($conn, $sql)){
		header('Location: admin_page.php');
	}
	mysqli_close($conn);
?>