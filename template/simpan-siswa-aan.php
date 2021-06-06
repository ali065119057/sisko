<?php

//include koneksi database
include('koneksi.php');

if (isset($_SESSION['id_user'])) {
    header("Location: ./index.php");
}

//get data dari form
$tgl_berangkat  = $_POST['tgl_berangkat'];
$id_user       = $_POST['id_user'];
$id_pengemudi   = $_POST['id_pengemudi'];
$alamat_tujuan  = $_POST['alamat_tujuan'];
$jml_penumpang  = $_POST['jml_penumpang'];
$km_awal        = $_POST['km_awal'];


//query insert data ke dalam database
$query = "INSERT INTO perjalanan (tgl_berangkat, id_pengemudi, id_user, alamat_tujuan, jml_penumpang, km_awal) VALUES ('$tgl_berangkat', '$id_pengemudi', '$id_user', '$alamat_tujuan', '$jml_penumpang', '$km_awal')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}
