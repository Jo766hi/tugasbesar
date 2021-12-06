<?php
include "layout/header.php";

?>




<div class="container-fluid">

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">tabel akun</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    $query = "SELECT * FROM akun";
                    $hasil = mysqli_query($koneksi, $query);
                    echo "<table class='table table-bordered'>";
                    echo "<tr><th>Username</th><th>Password</th><th>Nama</th><th>Email</th></tr>";
                    foreach ($hasil as $data) {
                        echo "<tr>";
                        echo "<td>$data[username]";
                        echo "<td>$data[password]";
                        echo "<td>$data[nama]";
                        echo "<td>$data[email]";
                        //tombol update
                        echo "<td> <form method='POST' action='ubah.php'>
                                        <input hidden type='text' name='id' value=" . $data['id'] . ">
                                        <button type='submit' name='btnUpdate' class='btn btn-success'>
                                        Update</button></form></td>";

                        //tombol delete
                        echo "<td><form onsubmit=\"return confirm ('Anda Yakin Mau Menghapus Data?');\"method='POST';>";
                        echo "<input hidden name='id' type='text' value=" . $data['id'] . ">";
                        echo "<button type='submit' name='btnHapus' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button>";
                        echo "</form></td>";
                        echo "<tr>";

                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>

                    <?php
                    if (isset($_POST['btnHapus'])) {
                        $id = $_POST['id'];

                        if ($koneksi) {
                            $sql = "DELETE FROM akun WHERE id=$id";
                            mysqli_query($koneksi, $sql);
                            echo "<p class='alert alert-success text-center'><b> Data Akun berhasil dihapus.</b></p>";
                        } elseif ($koneksi->connect_error) {
                            echo "<p class='alert alert-danger text-center><b> Data gagal dihapus. Terjadi kesalahan: ";
                            echo $koneksi->connect_error . "</b></p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include "layout/footer.php";

?>