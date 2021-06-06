<?php
//cek session
if (!empty($_SESSION['admin'])) {
?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light color: rgb(100 103 142 / 90%)">
    <div class="container-fluid">
      <a class="navbar-brand" href="admin.php">
        <label style="color: blueviolet;font-size:30px;font-family: monospace;/* align-self: stretch; */">SIsKO 1.0.10</label>
      </a>

      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="material-icons">account_circle</i> <?php echo $_SESSION['nama']; ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Action</a></li>
          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php"><i class="material-icons">settings_power</i> Logout</a></li>
        </ul>
      </div>
      <!-- </a> -->

    </div>
  </nav>
<?php
} else {
  header("Location: ../");
  die();
}
?>