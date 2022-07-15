<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>tabungan admin</title>
</head>

<body class="bg-info">
  <div class="container mt-5">
    <h2 class="text-center"><b>TABUNGAN ADMIN</b></h2>
    <br>
    <div class="card shadow-lg p-3 mb-5 w-50 mx-auto">
      <div class="card-body">
        <h3 class="card-title text-center"><b>FORM LOGIN</b></h3>
        <hr>
        <form action="" method="POST">
        <div class="form-group">
          <label for="">username</label>
          <input type="text" class="form-control" name="username" placeholder="Masukkan username anda">
        </div>
        <div class="form-group">
          <label for="">password</label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan password anda">
        </div>
        <div class="d-grid gap-2 mt-4">
          <button class="btn btn-info" name="login" type="submit"><b>LOGIN</b></button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php

  include "koneksi.php";

  session_start();

  if (isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query=mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE username = '$username' and password ='$password'");
    $rows=mysqli_fetch_array($query);

    if ($rows) {
      $_SESSION['login']=$rows;
      $_SESSION['username']=$username;
      echo "<script>location='index.php'</script>";
    }else{
      echo "<script>alert('anda gagal login')</script>";
      echo "<script>location='login.php'</script>";
    }
  }
  ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>