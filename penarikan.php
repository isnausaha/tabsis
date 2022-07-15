<div class="container mt-5">
<h3>penarikan</h3><hr>
    <div class="card shadow-lg p-3 mb-5">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">nama siswa</label>
                    <select name="nis" class="form-control">
                        <?php
                            $no=1;
                            $query=mysqli_query($koneksi,"SELECT * FROM tb_siswa");
                            while($rows=mysqli_fetch_array($query)){
                        ?>
                            <option value="<?= $rows['NIS']?>"><?= $rows['nama_lengkap']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">nominal</label>
                    <input class="form-control" name="nominal" placeholder="masukkan nominal setoran"></input>
                    <input name="waktu" type="datetime" value="<?=date('Y-m-d H:i:s');?>" hidden></input>
                </div>
                <br>
                <button type="submit" name="simpan" class="btn btn-success" onclick="return confirm('anda yakin ingin melakukan penarikan?')">tarik</button>
            </form>
        </div>
    </div>
</div>
<?php
    if (isset($_POST['simpan'])) {
        $nis        = $_POST['nis'];
        $nominal    = $_POST['nominal'];
        $waktu      = $_POST['waktu'];
        $query = mysqli_query($koneksi,"INSERT INTO tb_transaksi VALUES(null,'$nis',0,'$nominal','$waktu')");
        mysqli_query($koneksi,"UPDATE tb_siswa SET saldo=saldo-$nominal WHERE NIS = '$nis'");
        if ($query) {
            echo "<script>alert('penarikan berhasil')</script>";
            echo "<script>location='index.php?hal=transaksi'</script>";
        }else{
            echo "<script>alert('penarikan gagal')</script>";
            echo "<script>location='index.php?hal=penarikan'</script>";
        }
    }
?>