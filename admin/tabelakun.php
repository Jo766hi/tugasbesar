<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Email</th>
    </tr>
    <?php
    require ("../Login/includes/koneksi.php");
    $akun = mysqli_query($koneksi, "SELECT * from akun");
    $id=1;
    foreach ($akun as $row){
        echo "<tr>
            <td>$id</td>
            <td>".$row['username']."</td>
            <td>".$row['nama']."</td>
            <td>".$row['email']."</td>
              </tr>";
        $id++;
    }
    ?>
</table>
</body>
</html>