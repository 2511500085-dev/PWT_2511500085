<?php
if (isset($_GET['hapus'])) {

    $kd_jadwal = $_GET['hapus'];

    mysqli_query($koneksi, "DELETE FROM detail_jadwal WHERE Id_jadwal='$kd_jadwal'");

    $hapus = mysqli_query($koneksi, "DELETE FROM jadwal WHERE kd_jadwal='$kd_jadwal'");

    if ($hapus) {
        echo "Data berhasil dihapus";
    } else {
        echo "Data gagal dihapus";
    }
}
?>

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Jadwal</h1>
        </div>
    </div>
</div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_jadwal" class="btn btn-primary btn-sm">
                    Tambah Jadwal
                </a>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode Jadwal</th>
                            <th>Guru</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Detail Jadwal</th>
                            <th>Jam</th>
                            <th>Hari</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
$query = mysqli_query($koneksi, 
"SELECT * FROM jadwal j
 JOIN Detail_jadwal D ON j.kd_jadwal = D.id_jadwal
 JOIN guru g ON d.kd_guru = g.kd_guru");

while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>
        <td>{$row['Id_jadwal']}</td>
        <td>{$row['nm_guru']}</td>
        <td>{$row['Semester']}</td>
        <td>{$row['tahun_ajaran']}</td>
        <td>{$row['Jam']}</td>
        <td>{$row['Hari']}</td>
        <td>
            <ul>";

$sql = "
SELECT d.*, m.nm_mapel
FROM detail_jadwal d
JOIN mapel m ON d.kd_mapel = m.kd_mapel
WHERE d.Id_jadwal = 'J-001'
";

$result = mysqli_query($koneksi, $sql);

if (!$result) {
    die(mysqli_error($koneksi));
}

    echo "</ul>
        </td>
        <td>
            <a href='index.php?page=jadwal&hapus={$row['kd_jadwal']}'
               onclick=\"return confirm('Yakin ingin menghapus data ini?')\"
               class='btn btn-danger btn-sm'>Hapus</a>
        </td>
    </tr>";
}
?>
</tbody>
</table>

</div>
</div>
</div>
</div>