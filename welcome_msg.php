<?php ?>
<html>
<div class="col s12">
  <!-- <div class="card">
    <div class="card-content"> -->
  <h4 class="text-center">Selamat datang <?php echo $_SESSION['nama']; ?></h4>
  <p align="justify">Anda login sebagai
    <?php
    if ($_SESSION['admin'] == 1) {
      echo "<strong>Super Admin</strong>. Anda memiliki akses penuh terhadap sistem.";
    } elseif ($_SESSION['admin'] == 2) {
      echo "<strong>Administrator</strong>. Berikut adalah statistik data yang tersimpan dalam sistem.";
    } else {
      echo "<strong>Pegawai </strong>. PENGAJUAN PEMINJAMAN KENDARAAN HARAP DILAKUKAN 2 HARI SEBELUM KEBERANGKATAN";
    } ?></p>
  <hr / size="4px">
  <!-- </div>
  </div> -->
</div>

</html>