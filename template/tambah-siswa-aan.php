<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Tambah Siswa</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              Form Peminjaman
            </div>
            <div class="card-body">
              <form action="simpan-siswa.php" method="POST">
                
                <div class="form-group">
                  <label>Tgl.Berangkat</label>
                  <input type="text" name="tgl_berangkat" placeholder="dd-mm-yyyy" class="form-control">
                </div>

                <div class="form-group">
                  <label>NIK Pengguna</label>
                  <input type="text" name="id_user" placeholder="contoh: 1" class="form-control">
                </div>

                <div class="form-group">
                  <label>NIK Pengemudi</label>
                  <input type="text" name="id_pengemudi" placeholder="contoh: 1" class="form-control">
                </div>

                <div class="form-group">
                  <label>Tujuan</label>
                  <input type="text" name="alamat_tujuan" placeholder="contoh: Bogor" class="form-control">
                </div>

                <div class="form-group">
                  <label>Penumpang</label>
                  <textarea class="form-control" name="jml_penumpang" placeholder="contoh: 2"></textarea>
                </div>
                
                <div class="form-group">
                  <label>KM Awal</label>
                  <textarea class="form-control" name="km_awal" placeholder="contoh: 3000"></textarea>
                </div>
                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>