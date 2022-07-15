<div class="container mt-5">
<h3>edit admin</h3><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <?php
                $id_admin = $_GET['id_admin'];
                $query =mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin='$id_admin'");
                $rows=mysqli_fetch_array($query);
            ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">nama admin</label>
                    <input class="form-control" name="nama_admin" value="<?=$rows['nama_admin']?>" placeholder="masukkan nama admin">
                    <input type="hidden" value="<?=$rows['id_admin']?>" name="id_admin">
                </div>
                <div class="form-group">
                    <label for="">username</label>
                    <input class="form-control" name="username" value="<?=$rows['username']?>" placeholder="masukkan username admin">
                </div>
                <div class="form-group">
                    <label for="">password</label>
                    <input class="form-control" name="password" placeholder="masukkan password admin">
                </div>
                <br>
                <button type="submit" name="simpan" class="btn btn-success">perbarui</button>
            </form>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['simpan'])) {
        $nama_admin = $_POST['nama_admin'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $id_admin = $_POST['id_admin'];

        $query=mysqli_query($koneksi,"UPDATE tb_admin SET nama_admin='$nama_admin',username='$username',password='$password' WHERE id_admin='$id_admin'");
        if ($query) {
            echo "<script>alert('data berhasil diedit')</script>";
            echo "<script>location='index.php?hal=data_admin'</script>";
        }else{
            echo "<script>alert('data gagal diedit')</script>";
            echo "<script>location='index.php?hal=edit_admin'</script>";
        }
    }
?>