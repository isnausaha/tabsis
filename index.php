<?php
  include "koneksi.php";
  session_start();
  if (empty($_SESSION['username'])) {
    echo "<script>location='login.php'</script>";
  }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
  <title>tabungan admin</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TABUNGAN ADMIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?hal=home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="index.php?hal=data_admin">Data admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="index.php?hal=data_siswa">Data siswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="index.php?hal=transaksi">Transaksi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="index.php?hal=laporan">Laporan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
  if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "home") {
      include "home.php";
    } elseif ($_GET['hal'] == "data_siswa") {
      include "data_siswa.php";
    } elseif ($_GET['hal'] == "data_admin") {
      include "data_admin.php";
    } elseif ($_GET['hal'] == "tambah_admin") {
      include "tambah_admin.php";
    } elseif ($_GET['hal'] == "hapus_admin") {
      include "hapus_admin.php";
    } elseif ($_GET['hal'] == "edit_admin") {
      include "edit_admin.php";
    } elseif ($_GET['hal'] == "tambah_siswa") {
      include "tambah_siswa.php";
    } elseif ($_GET['hal'] == "hapus_siswa") {
      include "hapus_siswa.php";
    } elseif ($_GET['hal'] == "edit_siswa") {
      include "edit_siswa.php";
    } elseif ($_GET['hal'] == "detail_siswa") {
      include "detail_siswa.php";
    } elseif ($_GET['hal'] == "transaksi") {
      include "transaksi.php";
    } elseif ($_GET['hal'] == "penyetoran") {
      include "penyetoran.php";
    } elseif ($_GET['hal'] == "penarikan") {
      include "penarikan.php";
    } elseif ($_GET['hal'] == "laporan") {
      include "laporan.php";
    } elseif ($_GET['hal'] == "riwayat") {
      include "riwayat.php";
    }
  } else {
    include "home.php";
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready(function () {
    $('#data').DataTable();
  });
  </script>
</body>

</html>