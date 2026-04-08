<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Siswa</h1>
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
    $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id'");
    $edit = mysqli_fetch_array($query);
} else {
    $edit = null;
}

// PROSES UPDATE
if(isset($_POST['tambah'])){
    $nis = $_POST['nis'];
    $id_user = $_POST['id_user'];
    $nm_siswa = $_POST['nm_siswa'];
    $jenkel = $_POST['jenkel'];
    $HP = $_POST['HP'];
    $id_siswa = $_POST['id_siswa'];

    if($id_siswa != '' && $nm_siswa != ''){
        $update = mysqli_query($koneksi, "UPDATE siswa 
        SET nm_siswa='$nm_siswa' 
        WHERE id_siswa='$id_siswa'");

        if($update){
            echo '<div class="alert alert-success">Berhasil Disimpan</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
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
                                <label for="nis">Nis</label>
                                <input type="text" name="nis" value="<?= $edit['nis']; ?>" class="form-control" readonly>
                            </div>
                             <div class="form-group">
                                <Label for="id_user">Id User</label>
                                <input type="text" name="id_user" value="<?= $edit['id_user']; ?>" id="id_user" placeholder="Id User" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="nm_siswa">Nama Siswa</label>
                                <input type="text" name="nm_siswa" value="<?= $edit['nm_siswa']; ?>" id="nm_siswa" placeholder="Nama Siswa" class="form-control">
                            </div>
                             <div class="form-group">
                                <Label for="jenkel">Jenis Kelamin</label>
                                <input type="text" name="jenkel" value="<?= $edit['jenkel']; ?>" id="jenkel" placeholder="jenkel" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="HP">HP</label>
                                <input type="text" name="HP" value="<?= $edit['HP']; ?>" id="HP" placeholder="HP" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="id_siswa">Id Siswa</label>
                                <input type="text" name="Id_siswa" value="<?= $edit['id_siswa']; ?>" id="id_siswa" placeholder="id_siswa" class="form-control">
                            </div>

                    <button type="submit" name="tambah" class="btn btn-primary">
                        Simpan
                    </button>

                </form>

            </div>
        </div>
    </div>
</section>