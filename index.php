<?php
ob_start();
session_start();

//cek session
if (isset($_SESSION['admin'])) {
    header("Location: ./admin.php");
    die();
}

require_once 'koneksi.php';
//require_once 'functions.php';
//$config = conn($db_host, $db_username, $db_password, $db_database);
?>
<!--
    Name        : Sistem Informasi Kendaraan Operasional
    Version     : v1.0.5
    Description : Tugas Matakuliah IMK dan DBL, Universitas Pakuan 2021
    Date        : 2021
    Modifier    : Kelompok3
-->

<!doctype html>
<html lang="en">

<!-- <?php include "head.php" ?> -->

    <!-- Body START -->

<body class="blue-grey lighten-3 bg">

    <!-- Container START -->
    <div class="container">

        <!-- Row START -->
        <div class="row">

            <!-- Col START -->
            <div class="col s12 m5 offset-m4 offset-m4">

                <!-- Box START -->
                <div class="card-panel z-depth-2">

                    <!-- Row Form START -->
                    <div class="row">
                        <div class="col s12">
                            <div class="card-content">
                                <h5 class="center" id="title">SIsKO</h5>
                                <h6 font-size=12px class=center> Sistem Informasi Kendaraan Operasional</h6>
                                <h5 class="center"> <i class="material-icons large">drive_eta</i> </h5>
                                <div class="batas"></div>
                            </div>
                        </div>
                        <?php
                        if (isset($_REQUEST['submit'])) {

                            //validasi form kosong
                            if ($_REQUEST['username'] == "" || $_REQUEST['password'] == "") {
                                echo '<div class="upss red-text"><i class="material-icons">error_outline</i> <strong>ERROR!</strong> Username dan Password wajib diisi.
                                <a class="btn-large waves-effect waves-light blue-grey col s11" href="" style="margin: 20px 0 0 5px;"><i class="material-icons md-24">arrow_back</i> Kembali ke login form</a></div>';
                            } else {

                                $username = trim(htmlspecialchars(mysqli_real_escape_string($conn, $_REQUEST['username'])));
                                $password = trim(htmlspecialchars(mysqli_real_escape_string($conn, $_REQUEST['password'])));

                                //$query = mysqli_query($conn, "SELECT id_user, username, nama, email admin FROM tbl_user WHERE username=BINARY'$username' AND password=MD5('$password')");
                                $query = mysqli_query($conn, "SELECT id_user, username, nama, email, admin FROM tbl_user WHERE username=BINARY'$username' AND password=MD5('$password')");
                                if (mysqli_num_rows($query) > 0) {
                                    list($id_user, $username, $nama, $email, $admin) = mysqli_fetch_array($query);

                                    //buat session
                                    $_SESSION['id_user'] = $id_user;
                                    $_SESSION['username'] = $username;
                                    $_SESSION['nama'] = $nama;
                                    $_SESSION['email'] = $email;
                                    $_SESSION['admin'] = $admin;

                                    header("Location: ./admin.php");
                                    die();
                                } else {

                                    //session error
                                    $_SESSION['errLog'] = '<center>Username & Password tidak ditemukan!</center>';
                                    header("Location: ./");
                                    die();
                                }
                            }
                        } else {
                        ?>

                            <!-- Form START -->
                            <form class="col s12 m12 offset-4 offset-4" method="POST" action="">
                                <div class="row">
                                    <?php
                                    if (isset($_SESSION['errLog'])) {
                                        $errLog = $_SESSION['errLog'];
                                        echo '<div id="alert-message" class="error red lighten-5"><div class="center"><i class="material-icons">error_outline</i> <strong>LOGIN GAGAL!</strong></div>
                                    ' . $errLog . '</div>';
                                        unset($_SESSION['errLog']);
                                    }
                                    if (isset($_SESSION['err'])) {
                                        $err = $_SESSION['err'];
                                        echo '<div id="alert-message" class="error red lighten-5"><div class="center"><i class="material-icons">error_outline</i> <strong>ERROR!</strong></div>
                                    ' . $err . '</div>';
                                        unset($_SESSION['err']);
                                    }
                                    ?>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix md-prefix">account_circle</i>
                                    <input id="username" type="text" class="validate" name="username" required>
                                    <label for="username">Kata Sandi</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix md-prefix">lock</i>
                                    <input id="password" type="password" class="validate" name="password" required">
                                    <label for="password">Nama Pengguna</label>
                                </div>
                                <div class="input-field col s12">
                                    <button type="submit" class="btn-large waves-effect waves-light blue-grey col s12" name="submit">LOGIN</button>
                                </div>
                            </form>
                            <!-- Form END -->
                        <?php
                        }
                        ?>
                    </div>
                    <!-- Row Form START -->

                </div>
                <!-- Box END-->

            </div>
            <!-- Col END -->

        </div>
        <!-- Row END -->

    </div>
    <!-- Container END -->

    <!-- Javascript START -->
    <script type="text/javascript" src="asset/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="asset/js/materialize.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
    <script data-pace-options='{ "ajax": false }' src='./asset/js/pace.min.js'></script>

    <!-- Jquery auto hide untuk menampilkan pesan error -->
    <script type="text/javascript">
        $("#alert-message").alert().delay(3000).slideUp('slow');
    </script>
    <!-- Javascript END -->

    <noscript>
        <meta http-equiv="refresh" content="0;URL='/enable-javascript.html'" />
    </noscript>

</body>
<!-- Body END -->

</html>