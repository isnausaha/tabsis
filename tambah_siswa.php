<div class="container mt-5">
<h3>tambah siswa</h3><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="">NIS</label>
                    <input class="form-control" name="nis" placeholder="masukkan NIS"></input>
                </div>
                <div class="form-group">
                    <label for="">nama lengkap</label>
                    <input class="form-control" name="nama_lengkap" placeholder="masukkan nama lengkap"></input>
                </div>
                <div class="form-group">
                    <label for="">username</label>
                    <input class="form-control" name="username" placeholder="masukkan username"></input>
                </div>
                <div class="form-group">
                    <label for="">gambar</label>
                    <input class="form-control" type="file" name="gambar" placeholder="pilih gambar"></input>
                </div>
                <br>
                <button type="submit" name="simpan" class="btn btn-success">simpan</button>
            </form>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['simpan'])) {
        $nis            = $_POST['nis'];
        $nama_lengkap   = $_POST['nama_lengkap'];
        $username   = $_POST['username'];

        // script upload gambar
        $file           = $_FILES['gambar']['name'];
        $lokasi         = $_FILES['gambar']['tmp_name'];
        $y              = explode('.',$file);
        $format         = strtolower(end($y));
        $namabaru       = uniqid();
        $namabaru       .= '.';
        $namabaru       .= $format;

        
        $query = mysqli_query($koneksi,"INSERT INTO tb_siswa VALUES('$nis','$nama_lengkap','$username','$namabaru',0)");

        if (strlen($file)>0) {
            move_uploaded_file($lokasi,'gambar/'.$namabaru);
        }

        if ($query) {
            echo "<script>alert('data berhasil ditambahkan')</script>";
            echo "<script>location='index.php?hal=data_siswa'</script>";
        }else{
            echo "<script>alert('data gagal ditambahkan')</script>";
            echo "<script>location='index.php?hal=tambah_siswa'</script>";
        }
    }
?>