<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login SIsKO</title>
</head>

<body>
  <center>
    <form action="logincontroller.php" methode="POST" style="margin-top: 200px;">
      <h1>Masuk</h1>
      <label>Nama Pengguna:</label>
      <input type="text" name="username" placeholder="Masukkan Nama Pengguna " required="" autofocus="">
      <br>
      <br>
      <label>Kata Sandi :</label>
      <input type="password" name="password" placeholder="Masukkan Sandi Pengguna" required="" autofocus="">
      <br>
      <br>
      <button type="submit">MASUK</button>
    </form>
    <?php if (isset($_GET['pesan'])) {  ?>
      <label style="color:red;"><?php echo $_GET['pesan']; ?></label>
    <?php } ?>
  </center>
</body>

</html>