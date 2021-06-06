<?php
ob_start();
//cek session
session_start();
if (empty($_SESSION['admin'])) {
  $_SESSION['err'] = '<center>Anda harus login terlebih dahulu!</center>';
  header("Location: ./");
  die();
} else {
?>

  <!doctype html>
  <html lang="en">
  <?php include 'navbar.php' ?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>SIsKO 1.0.10</title>
  </head>

  <body>

    <div class="container -md" style="margin-top: 80px">
      <?php
      if (isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
        switch ($page) {
          case 'brw':
            include "tambah-siswa.php";
            break;
          case 'rtn':
            include "edit-siswa.php";
            break;
        }
      } else {

      ?>
        <!-- Baris Awal               -->
        <!-- Pesan pembuka -->
        <?php include "welcome_msg.php" ?>
        <div class="row row-cols-1 justify-content-md-center">
        </div>

        <div class="card-body">

          <!-- <div class="row justify-content-md-center"> -->
          <div class="row row-cols-1 justify-content-md-center row-cols-md-3 g-4">
            <!-- ikon dan link pinjam -->
            <div class="col">
              <a href="?page=brw">
                <div class="card text-dark bg-white h-100">
                  <div class="card-body">
                    <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">drive_eta</span></h1>
              </a>
              <h3 class="text-center"> Pinjam Kendaraan </h3>
            </div>
          </div>
        </div>
        <!-- ikon dan link kembali -->
        <div class="col">
          <a href="?page=brw">
            <div class="card text-dark bg-white mb-3 h-100">
              <div class="card-body">
                <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">assignment</span></h1>
          </a>
          <h3 class="text-center"> Pengembalian Kendaraan </h3>
        </div>
    </div>
    </div>
    <!-- ikon dan link Riwayat -->
    <div class="col">
      <a href="?page=brw">
        <div class="card text-dark bg-white mb-3 h-100">
          <div class="card-body">
            <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">history</span></h1>
      </a>
      <h3 class="text-center"> Riwayat Penggunaan </h3>
    </div>
    </div>
    </div>
    <?php
        if ($_SESSION['id_user'] == 1 || $_SESSION['admin'] == 2) { ?>
      <!-- ikon dan link Laporan -->
      <div class="col">
        <a href="?page=rpt">
          <div class="card text-white bg-info mb-3 h-100">
            <div class="card-body">
              <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">report</span></h1>
        </a>
        <h3 class="text-center"> Laporan </h3>
      </div>
      </div>
      </div>
      
      <!-- ikon dan link Kendaraan -->
      <div class="col">
        <a href="?page=vch">
          <div class="card text-white bg-info mb-3 h-100">
            <div class="card-body">
              <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">airport_shuttle</span></h1>
        </a>
        <h3 class="text-center"> Kendaraan</h3>
      </div>
      </div>
      </div>
      
      <!-- ikon dan link Pegawai -->
      <div class="col">
        <a href="?page=epl">
          <div class="card text-white bg-info mb-3 h-100">
            <div class="card-body">
              <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">manage_accounts</span></h1>
        </a>
        <h3 class="text-center"> Pegawai </h3>
      </div>
      </div>
      </div>
    <?php
        }
    ?>

    </div>
    </div>
    <hr size="4px">
    <div class="row">
      <div class="card-body">
        <div class="col">
          <div class="card">
            <div class="card-header text-center">
              <h6> HISTORY PERJALANAN </h6>
              <table class="table table-succes table-stripped table-bordered responsive-table" id="myTable">
                <thead>
                  <tr>
                    <th scope="col" onclick="sortTable(0)">NO.</th>
                    <th scope="col" onclick="sortTable(1)">TANGGAL</th>
                    <th scope="col" onclick="sortTable(2)">PENGGUNA</th>
                    <th scope="col" onclick="sortTable(3)">PENGEMUDI</th>
                    <th scope="col" onclick="sortTable(4)">JUMLAH PENUMPANG</th>
                    <th scope="col" onclick="sortTable(5)">TUJUAN</th>
                    <th scope="col" onclick="sortTable(6)">KM AWAL</th>
                    <th scope="col" onclick="sortTable(7)">KM AKHIR</th>
                    <!-- <th scope="col">AKSI</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include 'koneksi.php';
                  // include 'functions.php';
                  //$config = conn($db_host, $db_username, $db_password, $db_database);
                  $no = 1;
                  $query = mysqli_query($conn, "SELECT * FROM perjalanan");
                  while ($row = mysqli_fetch_array($query)) {
                  ?>

                    <?php if ($row['km_awal'] > $row['km_akhir']) { ?>
                      <tr class="table-danger">
                      <?php } else { ?>
                      <tr class="table-white">
                      <?php } ?>

                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['tgl_berangkat'] ?></td>
                      <td><?php echo $row['id_user'] ?></td>
                      <td><?php echo $row['id_pengemudi'] ?></td>
                      <td><?php echo $row['jml_penumpang'] ?></td>
                      <td><?php echo $row['alamat_tujuan'] ?></td>
                      <td><?php echo $row['km_awal'] ?></td>
                      <td><?php echo $row['km_akhir'] ?></td>
                      <!-- <td class="text-center">
                            <a href="edit-siswa.php?id=<?php echo $row['no'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                            <a href="hapus-siswa.php?id=<?php echo $row['no'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                          </td> -->
                      </tr>
                    <?php }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php
      }
    ?>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script> -->
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#myTable').DataTable();
      });
    </script>

  </body>

  </html>
<?php
}
?>