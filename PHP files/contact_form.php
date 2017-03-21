
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../css/login.css"> 
	<link rel="stylesheet" type="text/css" href="../css/navigation_bar.css">
	<script >
		function alert(){
			var x;
			if (confirm("Are you sure?") == true) {
				window.location = "submit_contact_form.php";
			} else {
				window.location = "contact_form.php";
			}
		}
	</script>
  </head>


  <body>
	<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog">
		  <div class="loginmodal-container">
			<h1>Contact Form</h1><br>
			<form role="form" method="POST" action="submit_contact_form.php"> 
				<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
				</div>
				<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
				</div>
				<input type="submit" name="Submit Form" class="login loginmodal-submit" value="Submit"> <!--onclick="alert()" -->
				<input type="submit" onclick="location='home_page.php';" name="Submit Form" class="login loginmodal-submit" value="Return to HomePage">
			</form>
		  </div>
	  </div>
	</div>
  </body>
</html>