<?php
	session_start();
	if (isset($_SESSION['username'])) {
		header('Location: ../home/dashboard.php');
		exit();
	   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>register</title>
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

                    <div class="card fat">
                        <div class="card-header card-header-primary">
                            <h3 class="card-title">Register</h3>
                        </div>
                        <div class="card-body">

                            <form method="POST" class="my-login-validation" action="">
                                <div class="form-group">
                                    <label for="anggota_usrnm">Username</label>
                                    <input id="angggota_usrnm" type="text" class="form-control" name="anggota_usrnm" required autofocus>
                                    <div class="invalid-feedback">
                                        What's your username?
                                    </div>


                                    <div class="form-group">
                                        <label for="anggota_nama">Nama</label>
                                        <input id="anggota_nama" type="text" class="form-control" name="anggota_nama" required autofocus>
                                        <div class="invalid-feedback">
                                            What's your name?
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="anggota_jk">Jenis Kelamin</label>
                                        <div class="form-check form-check-radio">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="anggota_jk" id="exampleRadios1" value="L">
                                                Laki-Laki
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="anggota_jk" id="exampleRadios2" value="P">
                                                Perempuan
                                                <span class="circle">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="anggota_telp">No. Telp</label>
                                            <input id="anggota_telp" type="text" class="form-control" name="anggota_telp" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="anggota_email">Email</label>
                                            <input id="anggota_email" type="email" class="form-control" name="anggota_email" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="anggota_pass">Password</label>
                                            <input id="anggota_pass" type="password" class="form-control" name="anggota_pass" required data-eye>
                                            <div class="invalid-feedback">
                                                Password is required
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <select name="level" class="custom-select" id="" disabled>
                                                <option value="anggota">anggota</option>
                                            </select>

                                        </div>

                                        <div class="form-group m-0">
                                            <button type="submit" name="btnRegister" class="btn btn-primary btn-block">
                                                Register
                                            </button>
                                        </div>
                                        <div class="mt-4 text-center">
                                            Already have an account? <a href="login.php">Login</a>
                                        </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php
    require("../includes/koneksi.php");
    if (isset($_POST['btnRegister'])) {
        $username = $_POST['anggota_usrnm'];
        $nama = $_POST['anggota_nama'];
        $jk = $_POST['anggota_jk'];
        $telp = $_POST['anggota_telp'];
        $email = $_POST['anggota_email'];
        $password = md5($_POST['anggota_pass']);
        $level = $_POST['level'];

        $sql = "INSERT INTO user (username, email, nama, jk, telp, password, level) VALUES ('$username','$email','$nama','$jk','$telp','$password','anggota')";

        $pemeriksaan_username = mysqli_num_rows(mysqli_query($db, "SELECT * FROM user WHERE username='$username' or email='$email'"));

        if ($pemeriksaan_username > 0) {
            echo "<script>alert('Username atau Email Anda Sudah Terdaftar!')</script>";
            header ("location: register.php");
        } elseif ($db->query($sql) === TRUE) {
            echo "<script>alert('Registrasi Akun Anda Berhasil!')</script>";
            header ("location: ../home/dashboard.php");
        } else {
            echo "Terjadi kesalahan: " . $sql . "<br/>" . $db->error;
        }
    }
    $db->close();
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
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