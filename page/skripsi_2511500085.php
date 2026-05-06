<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data skripsi</h1>
            </div>
        </div>
    </div>
</div>

<?php
include "config/koneksi.php";

if(isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $id = $_GET['id'];

        $query = mysqli_query($koneksi, "DELETE FROM skripsi_2511500085 WHERE id_skripsi='$id'");
        if ($query) {
            echo '<div class="alert alert-warning">Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_2511500085">';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <a href="index.php?page=tambah_skripsi" class="btn btn-primary btn-sm">
                    Tambah Skripsi
                </a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID skripsi</th>
                            <th>Judul skripsi</th>
                            <th>topik085</th>
                            <th>semester085</th>
                            <th>thn_ajaran085</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT * FROM skripsi_2511500085");
                    while ($result = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $result['id_skripsi']; ?></td>
                            <td><?= $result['judul_skripsi']; ?></td>
                            <td><?= $result['topik085']; ?></td>
                            <td><?= $result['semester085']; ?></td>
                            <td><?= $result['thn_ajaran085']; ?></td>
                            <td>
                                <a href="index.php?page=skripsi_2511500085&action=hapus&id=<?= $result['id_skripsi'] ?>">
                                    <span class="badge badge-danger">Hapus</span>
                                </a>

                                <a href="index.php?page=edit_skripsi&id=<?= $result['id_skripsi'] ?>">
                                    <span class="badge badge-warning">Edit</span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>