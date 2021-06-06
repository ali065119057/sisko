<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
//var_dump($username, $password);

// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($koneksi, "SELECT * FROM user where `username` ='$username' AND `password` ='$password'");
$cek = mysqli_num_rows($result);
if ($cek > 0) {

  //menyimpan session user, nama, status dan id login
  $_SESSION['username'] = $username;
  $_SESSION['status'] = "sudah_login";
  $data = mysqli_fetch_assoc($result);
  $_SESSION['nama'] = $data['nama'];
  $_SESSION['id_login'] = $data['id'];
  header("location:halaman_admin.php");
} else {
  header("location:login.php?pesan= gagal login data tidak ditemukan.");
}
