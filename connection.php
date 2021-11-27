<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
//mysqli_report(MYSQLI_REPORT_ERROR);

$host = "localhost";
$user = "root";
$pass = "";
$database = "db_perpus";

$db = mysqli_connect("localhost","root","","db_perpus");

if(mysqli_connect_errno()){
    echo "Koneksi Database Gagal : " .mysqli_connect_error();
}
?>