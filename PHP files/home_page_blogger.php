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
				location = "delete_blog.php?blogid="+blog_id+"&isadmin=0&bloggerid="+blogger_id;
			}
		}

	</script>
</head>

<body>
	<?php
			$noblog = 0;
			$blogger_user_name = $_SESSION["blogger_user_name"];
			$bogger_is_active;
			require 'connect_to_db.php'; 
			//echo "Connected successfully";
			$sql = "SELECT blogger_is_active FROM blogger_info WHERE blogger_username = '{$blogger_user_name}'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
				$blogger_is_active = $row['blogger_is_active'];
				$_SESSION['blogger_is_active'] = $blogger_is_active;
			}
			
			$sql = "SELECT * FROM blog_master WHERE blog_author = '{$blogger_user_name}'";
			
			
			$result = mysqli_query($conn, $sql);
			
			
			$blog_array = array();
			if (mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)) {
					$blog_array[] = $row;
				}
			}
			else{
				$noblog = 1;
			}
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
                        <a href="insert_blog.php?blogger_is_active=<?php echo $blogger_is_active;?>">New Blog</a>
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

    <!-- Page Content -->
    <div class="container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
			<?php
				if($noblog == 1 && $blogger_is_active == 0){
					echo '<div class="alert alert-danger center">
					  <strong>You are BANNED!</strong><br>You cannot write new blogs. Please, Contact Administrator.
					</div>';
					echo '<h4>You have zero blogs.</p>';
				}elseif($noblog == 1 && $blogger_is_active == 1){
					
					echo '<h4>You have zero blogs.<p><a href="insert_blog.php">Click here to write a new blog</a></p>';	
				}
				elseif($blogger_is_active == 0 && $noblog == 0){
					echo '<div class="alert alert-danger center">
							  <strong>You are BANNED!</strong><br>You cannot write new blogs. Please, Contact Administrator.
							</div>';
					foreach($blog_array as $blog)
					{	
						echo '<div class="panel panel-info">
								<div class="panel-heading">
									<div class="row">
										<div class ="col-md-10">
											<h3 class="panel-title">
												<a href="edit_blog.php?var='.$blog['blog_id'].' data-toggle="tooltip" title="Click Here to edit the blog.">'.$blog['blog_title'].'</a>';if($blog['blog_is_active'] == 1){ echo '<span class="label label-success" data-toggle="tooltip" title="The post has been approved."><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>';}else{ echo '<span class="label label-danger" data-toggle="tooltip" title="The post has not been approved"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span>';}
										echo '</h3>
										</div>
										<div class = "col-md-2">
											<button onclick="redirect('.$blog['blog_id'].','.$blog['blogger_id'].')" class="btn btn-danger btn-sm"> DELETE</button>
										</div>
									</div>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class=" col-md-12 col-lg-12 ">
											<div class="row">
												<div class="col-md-6">
													<p><span class="glyphicon glyphicon-time"></span> Posted on '.$blog['creation_date'].'</p>
												</div>
												<div class="col-md-6">
													<p><span class="glyphicon glyphicon-time"></span> Updated on '.$blog['updated_date'].'</p>
												</div>
											</div>
											<p>'.$blog['blog_desc'].'</p>
											<p>Category : '.$blog['blog_category'].'</p>
										</div>
									</div>
								</div>
							</div>';
					}
				}else{
					foreach($blog_array as $blog)
					{	echo '<div class="panel panel-info">
								<div class="panel-heading">
									<div class="row">
										<div class ="col-md-9">
											<h3 class="panel-title">
												<a href="edit_blog.php?var='.$blog['blog_id'].' data-toggle="tooltip" title="Click Here to edit the blog.">'.$blog['blog_title'].'</a>';if($blog['blog_is_active'] == 1){ echo '<span class="label label-success" data-toggle="tooltip" title="The post has been approved."><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>';}else{ echo '<span class="label label-danger" data-toggle="tooltip" title="The post has not been approved"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span>';}
										echo '</h3>
										</div>
										<div class = "col-md-3">
											<button onclick="redirect('.$blog['blog_id'].','.$blog['blogger_id'].')" class="btn btn-danger btn-sm"> DELETE</button>
										</div>
									</div>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class=" col-md-12 col-lg-12 ">
											<div class="row">
												<div class="col-md-6">
													<p><span class="glyphicon glyphicon-time"></span> Posted on '.$blog['creation_date'].'</p>
												</div>
												<div class="col-md-6">
													<p><span class="glyphicon glyphicon-time"></span> Updated on '.$blog['updated_date'].'</p>
												</div>
											</div>
											<p>'.$blog['blog_desc'].'</p>
											<p>Category : '.$blog['blog_category'].'</p>
										</div>
									</div>
								</div>
							</div>';
					}
				}
				
			?>
		</div>
    </div>
    <!-- /.container -->
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
