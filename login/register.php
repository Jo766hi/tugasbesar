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
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Register</title>
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
                        <?php
                            require("../includes/koneksi.php");
                            if (isset($_POST['btnRegister'])) {
                                $username = $_POST['anggota_usrnm'];
                                $nama = $_POST['anggota_nama'];
                                $jk = $_POST['anggota_jk'];
                                $telp = $_POST['anggota_telp'];
                                $email = $_POST['anggota_email'];
                                $password = md5($_POST['anggota_pass']);
                                $konfigurasi = md5($_POST['konfigurasi']);
                                $level = 'anggota';

                                $cek1 = mysqli_num_rows(mysqli_query($db, "SELECT * FROM user WHERE username='$username'"));
                                $cek2 = mysqli_num_rows(mysqli_query($db, "SELECT * FROM user WHERE email='$email'"));

                                if ($cek1 > 0) {
                                    echo "<div class=alert alert-danger role=alert>
                                    Username sudah Terdaftar
                                </div>";
                                    return false;
                                } 
                                if ($cek2 > 0) {
                                    echo "<div class=alert alert-danger role=alert>
                                    Email sudah Terdaftar
                                </div>";
                                    return false;
                                }
                                if ($konfigurasi == $password) { 
                                    $query = "INSERT INTO user (username, email, nama, jk, telp, password, level) 
                                    VALUES ('$username', '$email', '$nama', '$jk', '$telp', '$konfigurasi', '$level')";
                                    $hasil = mysqli_query($db, $query);
                        
                                    if ($hasil == true) {
                                    echo "<script>window.alert('Data Berhasil di Tambah')
                                    window.location='login.php'</script>";
                                    } else {
                                    echo "koneksi gagal" .mysqli_error($db);
                                    }
                                }
                                else {
                                    echo "<div class=alert alert-danger role=alert>
                                    Konfigurasi Password Salah
                                    </div>";
                                    return false;
                                    }
                            }
                            $db->close();
                            ?>

                            <form method="POST" class="my-login-validation" action="" id="user" onsubmit="return validation()">
                                <div class="form-group">
                                    <label for="anggota_usrnm">Username</label>
                                    <input id="angggota_usrnm" type="text" class="form-control" name="anggota_usrnm" required>
                                </div><br/>

                                    <div class="form-group">
                                        <label for="anggota_nama">Nama</label>
                                        <input id="anggota_nama" type="text" class="form-control" name="anggota_nama" required/>
                                    </div><br/>
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
                                            <input id="anggota_telp" type="text" class="form-control" name="anggota_telp" minlength="11" maxlength="13" placeholder="08xxxxxxxxxx" required/>

                                        </div><br/>
                                        <div class="form-group">
                                            <label for="anggota_email">Email</label>
                                            <input id="anggota_email" type="email" class="form-control" name="anggota_email" placeholder="JohnDoe23@gmail.com" required/>

                                        </div><br/>
                                        <div class="form-group">
                                            <label for="anggota_pass">Password</label>
                                            <input id="anggota_pass" type="password" class="form-control" name="anggota_pass" required/>
                                        </div><br/>
                                        <div class="form-group">
                                            <label for="konfigurasi">Konfigurasi Password</label>
                                            <input id="konfigurasi" type="password" class="form-control" name="konfigurasi"  required/>
                                        </div><br/>
                

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

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/jquery.validate.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/bootstrap-material-design.js"></script>

    <script src="https://unpkg.com/default-passive-events"></script>

    <!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>

    <!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
    <script src="../assets/js/core/chartist.min.js"></script>

    <!-- Plugin for Scrollbar documentation here: https://github.com/utatti/perfect-scrollbar -->
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>


    <!-- Demo init -->
    <script src="../assets/js/plugins/demo.js"></script>

    <!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.validator.addMethod("EMAIL", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9._-]+@[g]+[m]+[a]+[i]+[l]+\.[c]+[o]+[m]$/i.test(value);
        }, "Email Address is invalid: Please enter a valid email address.");
        $.validator.addMethod("TELEPHONE",function(value,element){
                return this.optional(element) || /^[0]+[8]+\d{9,11}/i.test(value);
            },"Please enter the valid code.");
        $.validator.addMethod("PASSWORD",function(value,element){
                return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
            },"Passwords are 8-16 characters with uppercase letters, lowercase letters and at least one number.");

    $('#user').validate({
        rules: {
            anggota_email: "required EMAIL",
            anggota_telp: "required TELEPHONE",
            anggota_pass: "required PASSWORD",
            konfigurasi: "required PASSWORD",
        },
    }); 

});
</script>
</body>

</html>