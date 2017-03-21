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

    <title>Admin Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">

   <script>
		var redirect = function(blogger_id){
			var r = confirm('Are You Sure?');
			if(r == true){
				/* // var b = <?php echo $blogger_user_name ; ?>; */
				/* // console.log(b); */
				location = "set_blogger_permission.php?var="+blogger_id;
			}
		}
	</script>
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
	<!-- for hover text enable -->
	<script>
		$(function() {
			$('#toggle-event').change(function() {
			  $('#console-event').html('Toggle: ' + $(this).prop('checked'))
			})
		})
	</script>
</head>

<body>
	<?php
			$a = $_SESSION["blogger_user_name"];
			
			require 'connect_to_db.php'; 
			//echo $blogger_user_name;
			if ($_SESSION["blogger_user_type"] == 1)
			{
				$sql = "SELECT blogger_id,blogger_username, blogger_creation_date, blogger_updated_date, blogger_is_active FROM blogger_info WHERE blogger_user_type = 0 ORDER BY blogger_username";
			
			
				$result = mysqli_query($conn, $sql);
				
				
				$user_array = array();
				if (mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_assoc($result)) {
							$user_array[] = $row;
						}
				}
			}
			else
			{
				echo "YOU ARE NOT PERMITTED TO ACCESS THIS PAGE.";
			}	
			$blogger_user_name = $_SESSION["blogger_user_name"];		
			
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

    <div class="container">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<?php
				foreach($user_array as $user)
				{
					if($user['blogger_is_active'] == 1){
						//not active
						$button = 'Click to Disable';
						
					}
					else{
						$button = "Click to Enable";
					}
					echo '<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title"><a href="test.php?var='.$user['blogger_id'].'" data-toggle="tooltip" title="Click Here!">'.$user['blogger_username'].'</a></h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class=" col-md-12 col-lg-12 "> 
										<table class="table table-user-information">
											<tbody>
												<tr>
													<td>Join Date : </td>
													<td>'.$user['blogger_creation_date'].'</td>
												</tr>
												<tr>
													<td>Latest Updation On : </td>
													<td>'.$user['blogger_updated_date'].'</td>
												</tr>
												<tr>
													<td><h4>Allow user to post!</h4></td>
													<td> 
														<button class="btn btn-primary btn-xs" onclick="redirect('.$user['blogger_id'].')">'.$button.'</button>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>';
				}
			?>
		</div>
    </div>
    <!-- /.container -->
<script>
	$(function() {
		$('#toggle-event').change(function() {
		  $('#console-event').html('Toggle: ' + $(this).prop('checked'))
		})
	})

	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
	});

</script>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>

</body>

</html>
