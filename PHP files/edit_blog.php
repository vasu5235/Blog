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

    <title>New Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		
		.form-area
		{
			background-color: #FAFAFA;
			padding: 10px 40px 60px;
			margin: 10px 0px 60px;
			border: 1px solid GREY;
		}
		#submit
		{
			background-color: #000000;
		}
	</style>
</head>

<body>
	<?php 
		$blogger_user_name = $_SESSION["blogger_user_name"];
		$blog_id = $_GET['var'];
		$_SESSION['blog_id'] = $blog_id;
		
	
		require 'connect_to_db.php';
		
		$sql = "SELECT blog_id, blog_title,blog_desc, blog_category, creation_date FROM blog_master WHERE blog_id = '{$blog_id}' AND blog_author = '{$blogger_user_name}'";
		
		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result) <=0){
			echo "<script>";
			echo "alert('Something wrong happened.');      
					window.location.href='".site_url('home_page_blogger.php')."';
				</script>";
		}
		
		$row = mysqli_fetch_assoc($result);
		$_SESSION['blog_title'] = $row['blog_title'];
		$_SESSION['blog_desc'] = $row['blog_desc'];
		$_SESSION['blog_category'] = $row['blog_category'];;
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
                        <a href="#">About</a>
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-8">
            	<div class="form-area" style="
    margin-right: -121px;
    margin-left: 181px;
"> 
			<!--	<div class="form-area">  -->
					<form role="form" action="edit_blog_2.php" method="POST" id="form1">
					<br style="clear:both">
								<h3 style="margin-bottom: 25px; text-align: center;">Edit your Blog</h3>
								<div class="form-group">
									<textarea type="textarea" class="form-control" id="name" name="blog_title"><?php echo $row['blog_title']; ?>
									</textarea>
								</div>
								<div class="form-group">
								<textarea class="form-control" type="textarea" id="message" name="blog_desc" rows="7"><?php echo $row['blog_desc']; ?></textarea>
								</div>
								<div class="form-group">
									<textarea type="textarea" class="form-control" id="subject" name="blog_category"><?php echo $row['blog_category']; ?>
									</textarea>
								</div>
								<div class="form-group">
									Upload image:
									<input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
								</div>
								
					<button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
					</form>
				</div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
