<!--
	Title: Bhmui Creatives - Reset Password
-->
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../../assets/css/gen/styles.css">
	<link rel="icon" type="image/png" href="../../assets/img/siteicon.png" />
</head>
<body>

	<?php
		session_start();

		if(isset($_SESSION['user']))
			$user = $_SESSION['user'];
		else
			header("Location:index.php");

		if(isset($_POST['subPass']))
		{
			include '../common/connection.php';

			$pass = mysqli_real_escape_string($conn, $_POST['pass']);
			$conPass = $_POST['conPass'];

			if($pass == $conPass)
			{
				$salted = '24@fu'.$pass.'45&deo';
				$hashed = hash('sha512', $salted);

				$sql = "UPDATE ulogin SET password='".$hashed."' WHERE uname='".$user."';";
				$result = $conn->query($sql);

        		header('location:index.php');
        		exit();
			}
			else{
				echo "<center><h3>Both Passwords not same.Try again !!</h3></center>";
			}
			$conn->close();
		}
		?>
		<div class="container-fluid">
		blah
		</div>
	<!-- PHP Close -->
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="assets/img/logo.jpg" alt="Bhumi logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<form method="post" action="resetPass.php">
								<h4 class="card-title">Reset Password</h4>
								<div class="form-group">
									<input type="password" name="pass" class="form-control" placeholder="Enter New Password" required/><br>
									<input type="password" name="conPass" class="form-control" placeholder="Enter New Password Again" required/><br><br>
									<input type="submit" name="subPass" class="btn btn-primary btn-block" value="Change Password" class="button" />
								</form>
							</div>
						</div>
</body>
</html>
