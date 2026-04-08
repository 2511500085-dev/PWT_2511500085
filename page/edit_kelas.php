<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Kelas</h1>
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
    $query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id'");
    $edit = mysqli_fetch_array($query);
} else {
    $edit = null;
}

// PROSES UPDATE
if(isset($_POST['tambah'])){
    $id_kelas = $_POST['id_kelas'];
    $nm_kelas = $_POST['nm_kelas'];

    if($id_kelas != '' && $nm_kelas != ''){
        $update = mysqli_query($koneksi, "UPDATE kelas 
        SET nm_kelas='$nm_kelas' 
        WHERE id_kelas='$id_kelas'");

        if($update){
            echo '<div class="alert alert-success">Berhasil Disimpan</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=kelas">';
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
                        <label>Id Kelas</label>
                        <input type="text" name="id_kelas"
                        value="<?= isset($edit['id_kelas']) ? $edit['id_kelas'] : ''; ?>"
                        class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" name="nm_kelas"
                        value="<?= isset($edit['nm_kelas']) ? $edit['nm_kelas'] : ''; ?>"
                        class="form-control">
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary">
                        Simpan
                    </button>

                </form>

            </div>
        </div>
    </div>
</section>