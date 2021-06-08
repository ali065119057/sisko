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
  <?php include 'navbar.php';
  //include 'head.php';
  ?>

  <style type="text/css">
    body {
      background: #fff;
    }

    .bg::before {
      content: '';
      background-image: url('./asset/img/background.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      position: absolute;
      z-index: -1;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      opacity: 0.15;
      filter: alpha(opacity=15);
      height: 100%;
      width: 100%;
      size: auto;
    }
  </style>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>SIsKO 1.0.10</title>
  </head>

  <body class="blue-grey lighten-3 bg">

    <div class="container" style="margin-top: 80px">
      <?php
      if (isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
        switch ($page) {
          case 'brw':
            include "pinjam.php";
            break;
          case 'vch':
            include "kendaraan.php";
            break;
          case 'rtn':
            include "pegawai.php";
            break;
          case 'rprt':
            include "lapor.php";
            break;
        }
      } else {
      ?>

        <?php include "welcome_msg.php" ?>
        <div class="row row-cols-12 justify-content-md-center g-4">
          <!-- ikon dan link pinjam -->
          <div class="col">
            <div class="card text-dark bg-white h-85">
              <div class="card-body">
                <a href="?page=brw">
                  <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">drive_eta</span></h1>
                </a>
              </div>
              <h6 class="text-center"> PINJAM KENDARAAN </h6>
            </div>
          </div>
          <?php
          if ($_SESSION['admin'] <= 2) { ?>
            <!-- ikon dan link kembali -->
            <div class="col">
              <div class="card text-dark bg-white mb-3 h-85">
                <div class="card-body">
                  <a href="?page=vhc">
                    <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">assignment</span></h1>
                  </a>
                </div>
                <h6 class="text-center"> Kendaraan </h6>
              </div>
            </div>
            <!-- ikon dan link Riwayat -->
            <div class="col">
              <div class="card text-dark bg-white mb-3 h-85">
                <div class="card-body">
                  <a href="?page=drv">
                    <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">history</span></h1>
                  </a>
                </div>
                <h6 class="text-center"> Pengemudi </h6>
              </div>
            </div>
            <!-- ikon dan link Riwayat -->
            <div class="col">
              <div class="card text-dark bg-white mb-3 h-85">
                <div class="card-body">
                  <a href="?page=drv">
                    <h1 class="text-center card-title"><span class="material-icons" style="font-size: 64px">report</span></h1>
                  </a>
                </div>
                <h6 class="text-center"> Laporan </h6>
              </div>
            </div>

          <?php
          }
          ?>
        </div>

        <!-- </div> -->
        <!-- </div> -->
        <hr size="4px">
        <div class="row">
          <!-- <div class="card "> -->
          <div class="card-header text-left">
            <!-- <div class="card-body"> -->
            <!-- <div class="col"> -->
            <h6 class="strong"> RIWAYAT PENGGUNAAN KENDARAAN OPERASIONAL</h6>
            <div class="table-responsive">
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
                    <th scope="col" onclick="sortTable(8)">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include 'koneksi.php';
                  $no = 1;
                  // echo $_SESSION['admin'];
                  if ($_SESSION['admin'] <= 2) {
                    $sql = "SELECT * FROM perjalanan \n"
                      . "JOIN tbl_user ON perjalanan.id_user=tbl_user.id_user \n"
                      . "JOIN pengemudi ON perjalanan.id_pengemudi = pengemudi.id_pengemudi \n"
                      . "ORDER BY `perjalanan`.`tgl_berangkat` DESC";
                  } else {
                    $sql = "SELECT * FROM perjalanan JOIN tbl_user USING (id_user) JOIN pengemudi USING (id_pengemudi)  \n"
                      . " WHERE id_user =$_SESSION[id_user] ORDER BY `perjalanan`.`tgl_berangkat` DESC";

                    // $sql = "SELECT * FROM perjalanan WHERE id_user=$_SESSION[id_user]";
                  };
                  $query = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_array($query)) {
                  ?>

                    <?php if ($row['km_awal'] > $row['km_akhir']) { ?>
                      <tr class="table-danger">
                      <?php } else { ?>
                      <tr class="table-success">
                      <?php } ?>

                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['tgl_berangkat'] ?></td>
                      <td><?php echo $row['nama'] ?></td>
                      <td><?php echo $row['nama_pengemudi'] ?></td>
                      <td><?php echo $row['jml_penumpang'] ?></td>
                      <td><?php echo $row['alamat_tujuan'] ?></td>
                      <td><?php echo $row['km_awal'] ?></td>
                      <td><?php echo $row['km_akhir'] ?></td>
                      <td class="text-left">
                        <?php if ($row['km_awal'] > $row['km_akhir']) { ?>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span class="material-icons two-tone">
                              assignment_return
                            </span><br>
                            Pengembalian
                          </button>
                        <?php } ?>
                        <?php if ($_SESSION['admin'] <= 2) { ?>
                          <button active type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span class="material-icons two-tone">
                              check_circle
                            </span><br>
                            Persetujuan
                          </button>

                          <!-- <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span class="material-icons two-tone">
                              assignment_return
                            </span><br>
                            Catatan
                          </button>
                        <?php } ?> -->

                      </td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- </div> -->
            <!-- </div> -->
          </div>
          <!-- </div> -->
        <?php
      }
        ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">KM AKHIR:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">CATATAN:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
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