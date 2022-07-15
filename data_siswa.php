<div class="container mt-5">
    <h2>data siswa</h2><br>
    <a href="index.php?hal=tambah_siswa" class="btn btn-info"><i class="bi bi-plus-square-fill"></i> tambah data</a><br>
    <hr>
    <table id="data" class="table table_striped">
        <thead>
            <th>NO</th>
            <th>Foto</th>
            <th>NIS</th>
            <th>Nama siswa</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
                $no=1;
                $query=mysqli_query($koneksi,"SELECT * FROM tb_siswa");
                while($rows=mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <img src="gambar/<?= $rows['gambar']?>" width="50" height="60" style="object-fit: cover;">
                    </td>
                    <td><?= $rows['NIS']?></td>
                    <td><?= $rows['nama_lengkap']?></td>
                    <td>
                        <a href="index.php?hal=edit_siswa&nis=<?= $rows['NIS'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> edit</a>
                        <a href="index.php?hal=detail_siswa&nis=<?= $rows['NIS'] ?>" class="btn btn-primary btn-sm"><i class="bi bi-file-earmark-richtext-fill"></i> detail</a>
                        <a onclick="return confirm('anda yakin hapus data?')" href="index.php?hal=hapus_siswa&nis=<?= $rows['NIS'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>