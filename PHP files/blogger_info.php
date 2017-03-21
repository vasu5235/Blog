<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">
	
	<link href="../css/blog_info.css" rel="stylesheet">

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="../js/blogger_info.js"></script>
</head>
<body>
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
                <a class="navbar-brand" href="home_page.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="contact_form.php">Contact Us!</a>
                    </li>
                </ul>
				
				<ul class="nav navbar-nav navbar-right">
				<li><p class="navbar-text">Already have an account?</p></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
					<ul id="login-dp" class="dropdown-menu">
						<li>
							 <div class="row">
									<div class="col-md-12">
										 <form class="form" role="form" method="post" action="login.php" accept-charset="UTF-8" id="login-nav">
												<div class="form-group">
													 <input type="text" class="form-control"name="username" placeholder="Username" required>
												</div>
												<div class="form-group">
													 <input type="password" class="form-control" name="password" placeholder="Password" required>
												</div>
												<div class="form-group">
													 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
												</div>
										 </form>
									</div>
									<div class="bottom text-center">
										New here ? <a href="Signup.html"><b>Join Us</b></a>
									</div>
							 </div>
						</li>
					</ul>
				</li>
			  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	<?php
			
			require 'connect_to_db.php'; 
			
			$blogger_user_name = $_GET['var'];
			
			$sql = "SELECT blogger_username, blogger_creation_date,blogger_updated_date FROM blogger_info where blogger_username = '{$blogger_user_name}'";
			
			$result = mysqli_query($conn, $sql);
			
			$row = mysqli_fetch_assoc($result);
	?>
    <!-- Page Content -->
    <div class="container">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
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
	
	<!--<script src="js/abc.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</body>

</html>
