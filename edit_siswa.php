<div class="container mt-5">
<h3>edit siswa</h3><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <?php
                $nis = $_GET['nis'];
                $query =mysqli_query($koneksi,"SELECT * FROM tb_siswa WHERE NIS='$nis'");
                $rows=mysqli_fetch_array($query);
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <label>nis</label>
                    <input class="form-control" name="nis" value="<?=$rows['NIS']?>" placeholder="masukkan nis" readonly></input>
                </div>
                <div class="form-group">
                    <label>nama lengkap</label>
                    <input class="form-control" name="nama_lengkap" value="<?=$rows['nama_lengkap']?>" placeholder="masukkan nama lengkap"></input>
                </div>
                <div class="form-group">
                    <label>nama lengkap</label>
                    <input class="form-control" name="username" value="<?=$rows['username']?>" placeholder="masukkan username"></input>
                </div>
                <div class="form-group">
                    <label>gambar</label>
                    <input class="form-control" type="file" name="gambar" placeholder="pilih gambar"></input><br>
                    <img src="gambar/<?=$rows['gambar']?>" width="100" alt="" srcset="">
                </div>
                <br>
                <button type="submit" name="simpan" class="btn btn-success">perbarui</button>
            </form>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['simpan'])) {
        $nis            = $_POST['nis'];
        $nama_lengkap   = $_POST['nama_lengkap'];
        $username       = $_POST['username'];

        // script upload gambar
        $file           = $_FILES['gambar']['name'];
        $lokasi         = $_FILES['gambar']['tmp_name'];
        $y              = explode('.',$file);
        $format         = strtolower(end($y));
        $namabaru       = uniqid();
        $namabaru       .= '.';
        $namabaru       .= $format;

        if (!empty($lokasi)) {
            if (strlen($file)>0) {
                move_uploaded_file($lokasi,'gambar/'.$namabaru);
            }
            $gambar = $rows['gambar'];
            if (file_exists("gambar/$gambar")) {
               unlink("gambar/$gambar");
            }
            $query  = mysqli_query($koneksi,"UPDATE tb_siswa SET nama_lengkap='$nama_lengkap',username='$username',gambar='$namabaru' WHERE NIS='$nis'");

            if ($query) {
                echo "<script>alert('data berhasil diubah')</script>";
                echo "<script>location='index.php?hal=data_siswa'</script>";
            }else{
                echo "<script>alert('data gagal diubah')</script>";
                echo "<script>location='index.php?hal=tambah_siswa'</script>";
            }
        }else{
            $query  = mysqli_query($koneksi,"UPDATE tb_siswa SET nama_lengkap='$nama_lengkap',username='$username' WHERE NIS='$nis'");

            if ($query) {
                echo "<script>alert('data berhasil diubah')</script>";
                echo "<script>location='index.php?hal=data_siswa'</script>";
            }else{
                echo "<script>alert('data gagal diubah')</script>";
                echo "<script>location='index.php?hal=tambah_siswa'</script>";
            }
        }
    }
?>