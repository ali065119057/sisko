<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="./asset/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>SIsKO 1.0.10</title>
  <title>Form Pinjam</title>
</head>

<body>

  <div class="container-fluid" style="margin-top: 80px">
    <div class="row">
      <div class="col">
        <!-- <div class="card">
          <div class="card-header"> -->
        FORMULIR PEMINJAMAN KENDARAAN
        <hr size="4px">
        <!-- </div>
          <div class="card-body"> -->
        <form action="request.php" method="POST">
          <div class="row g-5">
            <div class="col-2">
              <div class="form">
                <label for="tgl_berangkat" class="form-label">TANGGAL BERANGKAT</label>
                <input type="date" name="tgl_berangkat" class="date">
              </div>
            </div>
            <div class="col-2">
              <div class="form">
                <label for="tgl_pulang" class="form-label">TANGGAL PULANG</label>
                <input type="date" name="tgl_pulang" class="date-picker">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="tgl_pulang" class="form-label">Nama Lengkap</label>
            <input type="text" name="user_id" placeholder="Masukkan Nama Peminjam" class="form-control">
          </div>
          <div class="form-group">
            <label>alamat tujuan</label>
            <textarea class="form-control" name="alamat_tujuan" placeholder="Masukkan Alamat Tujuan"></textarea>
          </div>
          <hr size="4px">
        </form>
        <button type="submit" class="btn btn-success">SIMPAN</button>
        <button type="reset" class="btn btn-warning">RESET</button>

      </div>
    </div>

    <!-- Mulai Carousel Pilihan Kendaraan-->

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/asset/img/background.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
      </div>
    </div>
    <!-- Akhir Carousel Pilihan Kendaraan -->
  </div>
  <script src="./asset/js/bootstrap.min.js"></script>
  <!-- <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
  <!-- <script> -->
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  <!-- </script> -->
</body>

</html>