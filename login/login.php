<!DOCTYPE html>
<html lang="en">

<head>
	<title>login</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- Material Dashboard CSS -->
	<link rel="stylesheet" href="../assets/css/material-dashboard.css">
</head>

<body class="dark-edition">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="col-lg-6 col-md-12">
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title">Login</h4>
						</div>
						<div class="card-body table-responsive">
							<form method="POST" class="my-login-validation" novalidate>
								<div class="form-group">
									<label for="username">Username or Email</label>
									<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										Password is required
									</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remember Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" name="btnlogin">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="register.php">Create One</a>
								</div>
							</form>
						</div>
					</div>
				</div>
	</section>

	<?php
	session_start();
	if (isset($_SESSION['username'])) {
		header('Location: ../home/dashboard.php');
		exit();
	   }
	require("../includes/koneksi.php");
	if (isset($_POST['btnlogin'])) {

		$user_login = $_POST['username'];
		$pass_login = md5($_POST['password']);

		$sql = "SELECT * FROM user WHERE (username = '$user_login' OR email = '$user_login') and password = '$pass_login'";
		$query = mysqli_query($db, $sql);

		while ($row = mysqli_fetch_array($query)) {
			$user = $row['username'];
			$pass = $row['password'];
			$nama = $row['nama'];
			$email = $row['email'];
			$level = $row['level'];
			$id = $row['id'];
		}
		if ($user_login == $user || $user_login == $email  && $pass_login == $pass) {
			echo "Username : $user_login dan Password : $pass_login";
			header("Location: ../home/dashboard.php");
			$_SESSION['username'] = $user;
			$_SESSION['nama'] = $nama;
			$_SESSION['email'] = $email;
			$_SESSION['level'] = $level;
			$_SESSION['id'] = $id;


		} else {
			echo "<script>window.alert('User Tidak Ditemukan')
			window.location='login.php'</script>";
		}
	}
	?>

	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/bootstrap-material-design.js"></script>

	<script src="https://unpkg.com/default-passive-events"></script>

	<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
	<script src="assets/js/plugins/bootstrap-notify.js"></script>

	<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
	<script src="assets/js/core/chartist.min.js"></script>

	<!-- Plugin for Scrollbar documentation here: https://github.com/utatti/perfect-scrollbar -->
	<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>


	<!-- Demo init -->
	<script src="assets/js/plugins/demo.js"></script>

	<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
	<script src="assets/js/material-dashboard.js?v=2.1.0"></script>
</body>

</html>