<?php
// Start the session
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blogger Home!</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">

	<script>
		var redirect = function(blog_id,blogger_id){
			var r = confirm('Are You Sure?\nThe post will be deleted permanent.');
			if(r == true){
				/* // var b = <?php echo $blogger_user_name ; ?>; */
				/* // console.log(b); */
				location = "delete_blog.php?blogid="+blog_id+"&isadmin=1&bloggerid="+blogger_id;
			}
		}

	</script>
</head>

<body>
	<?php
			$noblog = 0;
			$blogger_user_name = $_SESSION["blogger_user_name"];
			$blogger_is_active = $_SESSION['blogger_is_active'];
			require 'connect_to_db.php'; 
			
			
			$sql = "SELECT blogger_username, blogger_creation_date,blogger_updated_date FROM blogger_info where blogger_username = '{$blogger_user_name}'";
			
			$result = mysqli_query($conn, $sql);
			
			$row = mysqli_fetch_assoc($result);
	?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home_page_blogger.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="blogger_info_logged.php">About</a>
                    </li>
                    <li>
                        <a href="insert_blog.php">New Blog</a>
                    </li>
                </ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<b><?php  echo $blogger_user_name;?><span class="caret"></span></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="icon-wrench"></i> Settings</a></li>
							<li class="divider"></li>
							<li><a href="logout.php"><i class="icon-share"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
		<div class="col-md-12" >
			<?php
				if($blogger_is_active == 0){
					echo '<div class="alert alert-danger center">
						  <strong>You are BANNED!</strong><br>You cannot write new blogs. Please, Contact Administrator.
						</div>';
				}
			?>
			<div class="panel panel-info">
				<div class="panel-heading">
				  <h3 class="panel-title"><?php echo $row['blogger_username'];?></h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class=" col-md-12 col-lg-12 "> 
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>Join Date:</td>
										<td><?php echo $row['blogger_creation_date'];?></td>
									</tr>
									<tr>
										<td>Last Updation on :</td>
										<td><?php echo $row['blogger_updated_date'];?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
