<div class="container mt-5">
    <?php
        $nis = $_GET['nis'];
        $query = mysqli_query($koneksi,"SELECT * FROM tb_siswa WHERE NIS='$nis'");
        $rows=mysqli_fetch_array($query);
    ?>
    <h3>Biodata <?= $rows['nama_lengkap'] ?></h3><br><br>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td><?= $rows['NIS'] ?></td>
                </tr>
                <tr>
                    <td>Nama siswa</td>
                    <td>:</td>
                    <td><?= $rows['nama_lengkap'] ?></td>
                </tr>
                <tr>
                    <td>kelas</td>
                    <td>:</td>
                    <td>kelas 5A</td>
                </tr>
                <tr>
                    <td>Saldo</td>
                    <td>:</td>
                    <td>Rp <?= number_format($rows['saldo'],2,',','.') ?></td>
                </tr>
            </table>
            <a href="index.php?hal=data_siswa" class="btn btn-danger">kembali</a>
            <a href="index.php?hal=riwayat&nis=<?= $rows['NIS'] ?>" class="btn btn-info">riwayat transaksi</a>
        </div>
        <div class="col-md-6">
            <img src="gambar/<?= $rows['gambar'] ?>" width="200px" height="300px" style="object-fit: cover;">
        </div>
    </div>
</div>