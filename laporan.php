<div class="container mt-5">
    <h2>transaksi</h2><br>
    <div class="d-flex flex-row">
    <a href="index.php?hal=penyetoran" class="btn btn-success me-2"><i class="bi bi-plus-square-fill"></i> Penyetoran</a><br>
    <a href="index.php?hal=penarikan" class="btn btn-danger"><i class="bi bi-dash-square-fill"></i> Penarikan</a><br>
    </div>
    <hr>
    <table id="data" class="table table_striped">
        <thead>
            <th>NO</th>
            <th>id transaksi</th>
            <th>nama siswa</th>
            <th>keterangan</th>
            <th>nominal</th>
            <th>tanggal transaksi</th>
        </thead>
        <tbody>
            <?php
                $no=1;
                $query=mysqli_query($koneksi,"SELECT concat('TRX', id_transaksi) as id,setoran,penarikan,tanggal_transaksi,nama_lengkap FROM tb_transaksi INNER JOIN tb_siswa ON tb_siswa.NIS = tb_transaksi.nis_siswa");
                while($rows=mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $rows['id']?></td>
                    <td><?= $rows['nama_lengkap']?></td>
                    <td><?= ($rows['setoran']==0 ? "penarikan" : 'penyetoran');?></td>
                    <td><?= ($rows['setoran']==0 ? $rows['penarikan'] : $rows['setoran']);?></td>
                    <td><?= $rows['tanggal_transaksi']?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>