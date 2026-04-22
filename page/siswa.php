<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Siswa</h1>
            </div>
        </div>
    </div>
</div>

<?php
include "config/koneksi.php";

if(isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $Nis = $_GET['Nis'];

        $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE Nis='$Nis'");
        if ($query) {
            echo '<div class="alert alert-warning">Berhasil Di Hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
        }
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <a href="index.php?page=tambah_siswa" class="btn btn-primary btn-sm">
                    Tambah Siswa
                </a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nis</th>
                            <th>Id user</th>
                            <th>Nama siswa</th>
                            <th>jenis kelamin</th>
                            <th>HP</th>
                            <th>Id kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas=kelas.id_kelas");
                    while ($result = mysqli_fetch_array($query)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $result['Nis']; ?></td>
                            <td><?= $result['Id_user']; ?></td>
                            <td><?= $result['Nm_siswa']; ?></td>
                            <td><?= $result['Jenkel']; ?></td>
                            <td><?= $result['HP']; ?></td>
                            <td><?= $result['Id_siswa']; ?></td>
                            <td>
                                <a href="index.php?page=siswa&action=hapus&Nis=<?= $result['Nis'] ?>" title="">
                                    <span class="badge badge-danger">Hapus</span>
                                </a>

                                <a href="index.php?page=edit_siswa&Nis=<?= $result['Nis'] ?>" title="">
                                    <span class="badge badge-succes">Edit</span>
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