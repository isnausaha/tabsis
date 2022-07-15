<?php
    $nis    = $_GET['nis'];
    $query  = mysqli_query($koneksi,"SELECT * FROM tb_siswa WHERE NIS='$nis'");
    $row    = mysqli_fetch_array($query);
    $gambar = $row['gambar'];
    if (file_exists("gambar/$gambar")) {
        unlink("gambar/$gambar");
    }

    $hapus  = mysqli_query($koneksi,"DELETE FROM tb_siswa WHERE NIS='$nis'");

    if ($hapus) {
        echo "<script>alert('data berhasil dihapus')</script>";
        echo "<script>location='index.php?hal=data_siswa'</script>";
    } else {
        echo "<script>alert('data gagal dihapus')</script>";
        echo "<script>location='index.php?hal=data_siswa'</script>";
    }
?>