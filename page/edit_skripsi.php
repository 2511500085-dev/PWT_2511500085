<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit skripsi</h1>
            </div>
        </div>
    </div>
</div>

<?php
include "config/koneksi.php";

// AMBIL ID DARI URL (AMAN)
$id = isset($_GET['id']) ? $_GET['id'] : '';

// AMBIL DATA
if ($id != '') {
    $query = mysqli_query($koneksi, "SELECT * FROM skripsi_2511500085 WHERE id_skripsi='$id'");
    $edit = mysqli_fetch_array($query);
} else {
    $edit = null;
}

// PROSES UPDATE
if(isset($_POST['tambah'])){
    $id_skripsi = $_POST['id_skripsi'];
    $judul_skripsi = $_POST['judul_skripsi'];
    $topik085 = $_POST['topik085'];
    $semester085 = $_POST['semester085'];
    $thn_ajaran085 = $_POST['thn_ajaran085'];

    if($id_skripsi != '' && $judul_skripsi != ''){
        $update = mysqli_query($koneksi, "UPDATE skripsi_2511500085 
        SET judul_skripsi='$judul_skripsi', topik085='$topik085', semester085='$semester085', thn_ajaran085='$thn_ajaran085' 
        WHERE id_skripsi='$id_skripsi'");

        if($update){
            echo '<div class="alert alert-success">Berhasil Disimpan</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_2511500085">';
        } else {
            echo '<div class="alert alert-danger">Gagal Disimpan</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Data tidak boleh kosong!</div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <form method="POST">

                    <div class="form-group">
                        <label>Id skripsi</label>
                        <input type="text" name="id_skripsi"
                        value="<?= isset($edit['id_skripsi']) ? $edit['id_skripsi'] : ''; ?>"
                        class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>judul skripsi</label>
                        <input type="text" name="judul_skripsi"
                        value="<?= isset($edit['judul_skripsi']) ? $edit['judul_skripsi'] : ''; ?>"
                        class="form-control">
                    </div>

                    <div class="form-group">
                        <label>topik085</label>
                        <input type="text" name="topik085"
                        value="<?= isset($edit['topik085']) ? $edit['topik085'] : ''; ?>"
                        class="form-control">
                    </div>

                    <div class="form-group">
                        <label>semester085</label>
                            <select name="semester085" id="semester085" class="form-control">
                                <option value="Gasal">Gasal</option>
                                <option value="Genap">Genap</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label>thn_ajaran085</label>
                        <select name="thn_ajaran085" id="thn_ajaran085" class="form-control">
                                 <option value="2025/2026">2025/2026</option>
                                <option value="2027/2028">2027/2028</option>
                            </select>
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary">
                        Simpan
                    </button>

                </form>

            </div>
        </div>
    </div>
</section>