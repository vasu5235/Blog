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

    <title></title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">

	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
	
	<style>
		.btn.active {                
			display: none;		
		}

		.btn span:nth-of-type(1)  {            	
			display: none;
		}
		.btn span:last-child  {            	
			display: block;		
		}

		.btn.active  span:nth-of-type(1)  {            	
			display: block;		
		}
		.btn.active span:last-child  {            	
			display: none;			
		}
	</style>
	<script>
		var redirect = function(blog_id,blogger_id){
			var r = confirm('Are You Sure?\nThe post will be deleted permanent.');
			if(r == true){
				/* // var b = <?php echo $blogger_user_name ; ?>; */
				/* // console.log(b); */
				location = "delete_blog.php?blogid="+blog_id+"&isadmin=1&bloggerid="+blogger_id;
			}
		}
		
		var redirect2 = function(blog_id,blogger_id){
			var r = confirm('Are You Sure?');
			if(r == true){
				/* // var b = <?php echo $blogger_user_name ; ?>; */
				/* // console.log(b); */
				location = "update_blog_status.php?blogid="+blog_id+"&isadmin=1&bloggerid="+blogger_id;
			}
		}

	</script>
</head>

<body>
	<?php
			$blogger_user_name = $_SESSION["blogger_user_name"];
			//username whose blogs are to be retrieved
			$blogger_id = $_GET['var'];
			$blogger_username;
			require 'connect_to_db.php'; 
			//echo "Connected successfully";
			$sql ="SELECT blogger_username from blogger_info WHERE blogger_id = '{$blogger_id}'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)) {
						$blogger_username = $row['blogger_username'];
					}
			}
			$sql = "SELECT blog_id, blog_title,blog_desc, blog_category, blog_is_active, creation_date FROM blog_master WHERE blogger_id = '{$blogger_id}'";
					
			$result = mysqli_query($conn, $sql);
			
			$blog_array = array();
			if (mysqli_num_rows($result)>0){
					while($row = mysqli_fetch_assoc($result)) {
						$blog_array[] = $row;
					}
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
                <a class="navbar-brand" href="admin_page.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="admin_page.php">All Users</a>
                    </li>
					<li>
                        <a href="contact_queries.php">Contact Queries</a>
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

    <div class="container-fluid">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo 'Blogs of '.$blogger_username;?></h3>
				</div>
				<div class="panel-body">
				<?php
					foreach($blog_array as $blog)
					{	if($blog['blog_is_active'] == 0){
							$button = 'Approve';
						}
						else{
							$button = 'Disapprove';
						}
						echo '<div class="row">
								<div class="col-md-9 col-lg-9"> 
									<h2>'.$blog['blog_title'].'</h2>
									<p>
										<span class="glyphicon glyphicon-time"></span> Posted on '.$blog['creation_date'].'
									</p>
									<p>'.$blog['blog_desc'].'</p>
									<p>Category : '.$blog['blog_category'].'</p>
									<button class="btn btn-success btn-xs" onclick="redirect2('.$blog['blog_id'].','.$blogger_id.')">'.$button.'</button>
									<button onclick="redirect('.$blog['blog_id'].','.$blogger_id.')" class="btn btn-danger btn-xs">DELETE</button>
								</div>
							</div><hr>';
					}
				?>
				</div>
			</div>
		</div>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>

</body>

</html>
