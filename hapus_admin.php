<?php
    $id_admin = $_GET['id_admin'];
    $query = mysqli_query($koneksi,"DELETE FROM tb_admin WHERE id_admin='$id_admin'");

    if ($query) {
        echo "<script>alert('data berhasil dihapus')</script>";
        echo "<script>location='index.php?hal=data_admin'</script>";
    } else {
        echo "<script>alert('data gagal dihapus')</script>";
        echo "<script>location='index.php?hal=data_admin'</script>";
    }
?>