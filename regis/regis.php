<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>RegistrationForm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="wrapper" style="background-image: url('bg.jpg');">
        <div class="inner">
            <div class="image-holder">
                <img src="pic.jpg" alt="">
            </div>
            <form action="" method="POST">
                <h3>Registration Form</h3>

                <div class="form-wrapper">
                    <input type="text" placeholder="Username" class="form-control" name="username">
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Nama" class="form-control" name="nama">
                </div>
                <div class="form-wrapper">
                        <select name="jk" id="" class="form-control">
							<option value="" disabled selected>Jenis Kelamin</option>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
                </div>
                <div class="form-wrapper">
                    <input type="text" placeholder="Telepon" class="form-control" name="tlp">
                </div>
                <div class="form-wrapper">
                    <input type="email" placeholder="Email Address" class="form-control" name="email">
                </div>
                <div class="form-wrapper">
                    <input type="password" placeholder="Password" class="form-control" name="pass">
                </div>
                <button type="submit" name="add">Register
                </button>
            </form>
        </div>
    </div>
    <?php
   
    require_once "../connection.php";
    if (isset($_POST["add"])){
        $user = $_POST['username'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $tlp = $_POST['tlp'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $cek = "SELECT*FROM anggota WHERE anggota_usrnm='$user' OR anggota_email='$email'";
        $q = mysqli_num_rows(mysqli_query($db, $cek));

        if ($q > 0){
        echo "<script>window.alert('Username atau Email yang Anda Masukan Sudah Terdaftar')
		window.location='regis.php'</script>";
	    }else {
		mysqli_query($db, 
		"INSERT INTO anggota (anggota_usrnm, anggota_nama, anggota_jk, anggota_telp, anggota_email, anggota_pass) 
		VALUES ('$user', '$nama', '$jk', '$tlp', '$email', '$pass' )");
		
		echo "<script>window.alert('Berhasil, Silahkan Login')
		window.location='regis.php'</script>";
        }
            echo "Koneksi Gagal". mysqli_error($db);
    }

    ?>

</body>

</html>