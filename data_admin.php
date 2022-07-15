<div class="container mt-5">
    <h2>data admin</h2><br>
    <a href="index.php?hal=tambah_admin" class="btn btn-info"><i class="bi bi-plus-square-fill"></i> tambah data</a><br>
    <hr>
    <table id="data" class="table table_striped table_bordered">
        <thead>
            <th>NO</th>
            <th>Nama admin</th>
            <th>Username</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
                $no=1;
                $query=mysqli_query($koneksi,"SELECT * FROM tb_admin");
                while($rows=mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $rows['nama_admin']?></td>
                <td><?= $rows['username']?></td>
                <td>
                    <a href="index.php?hal=edit_admin&id_admin=<?= $rows['id_admin'] ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> edit</a>
                    <a onclick="return confirm('anda yakin hapus data?')" href="index.php?hal=hapus_admin&id_admin=<?= $rows['id_admin'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i> hapus</a>
                </td>
            </tr>
                <?php
                }
                ?>
        </tbody>
    </table>
</div>