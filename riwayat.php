<div class="container mt-5">
    <h2>Riwayat Transaksi</h2><br>
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
                $nis=$_GET['nis'];
                $query=mysqli_query($koneksi,"SELECT concat('TRX', id_transaksi) as id,setoran,penarikan,tanggal_transaksi,nama_lengkap FROM tb_transaksi INNER JOIN tb_siswa ON tb_siswa.NIS = tb_transaksi.nis_siswa WHERE NIS='$nis'");
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