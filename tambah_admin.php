<div class="container mt-5">
<h3>tambah admin</h3><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">nama admin</label>
                    <input class="form-control" name="nama_admin" placeholder="masukkan nama admin"></input>
                </div>
                <div class="form-group">
                    <label for="">username</label>
                    <input class="form-control" name="username" placeholder="masukkan username admin"></input>
                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input class="form-control" name="password" placeholder="masukkan password admin"></input>
                </div>
                <br>
                <button type="submit" name="simpan" class="btn btn-success">simpan</button>
            </form>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['simpan'])) {
        $nama_admin = $_POST['nama_admin'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        
        $query=mysqli_query($koneksi,"INSERT INTO tb_admin VALUES(null,'$nama_admin','$username','$password')");
        if ($query) {
            echo "<script>alert('data berhasil ditambahkan')</script>";
            echo "<script>location='index.php?hal=data_admin'</script>";
        }else{
            echo "<script>alert('data gagal ditambahkan')</script>";
            echo "<script>location='index.php?hal=tambah_admin'</script>";
        }
    }
?>