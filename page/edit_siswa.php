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
$Nis = $_GET['Nis'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE Nis='$Nis' "));

// PROSES UPDATE
if(isset($_POST['tambah'])){
    $Nis = $_POST['Nis'];
    $Id_user = $_POST['Id_user'];
    $Nm_siswa = $_POST['Nm_siswa'];
    $Jenkel = $_POST['Jenkel'];
    $HP = $_POST['HP'];
    $Id_siswa = $_POST['Id_siswa'];

    if($Id_siswa != '' && $Nm_siswa != ''){
        $update = mysqli_query($koneksi, "UPDATE siswa 
        SET Nm_siswa='$Nm_siswa' 
        WHERE Id_siswa='$Id_siswa'");

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
                                <label for="Nis">Nis</label>
                                <input type="text" name="Nis" value="<?= $edit['Nis']; ?>" class="form-control" readonly>
                            </div>
                             <div class="form-group">
                                <Label for="Id_user">Id User</label>
                                <input type="text" name="Id_user" value="<?= $edit['Id_user']; ?>" id="Id_user" placeholder="Id User" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="Nm_siswa">Nama Siswa</label>
                                <input type="text" name="Nm_siswa" value="<?= $edit['Nm_siswa']; ?>" id="Nm_siswa" placeholder="Nama Siswa" class="form-control">
                            </div>
                             <div class="form-group">
                                <Label for="Jenkel">Jenis Kelamin</label>
                                <input type="text" name="Jenkel" value="<?= $edit['Jenkel']; ?>" id="Jenkel" placeholder="Jenkel" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="HP">HP</label>
                                <input type="text" name="HP" value="<?= $edit['HP']; ?>" id="HP" placeholder="HP" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="Id_siswa">Id Siswa</label>
                                <input type="text" name="Id_siswa" value="<?= $edit['Id_siswa']; ?>" id="Id_siswa" placeholder="id_siswa" class="form-control">
                            </div>

                    <button type="submit" name="tambah" class="btn btn-primary">
                        Simpan
                    </button>

                </form>

            </div>
        </div>
    </div>
</section>