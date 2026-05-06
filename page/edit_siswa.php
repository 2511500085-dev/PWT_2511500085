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

// PDPWKOEKFEOKFE
if(isset($_POST['tambah'])){
    $Nis = $_POST['Nis'];
    $Id_user = $_POST['Id_user'];
    $Nm_siswa = $_POST['Nm_siswa'];
    $Jenkel = $_POST['Jenkel'];
    $HP = $_POST['HP'];
    $Id_siswa = $_POST['Id_siswa'];

    if($Id_siswa != '' && $Nm_siswa != ''){
        $update = mysqli_query($koneksi, "UPDATE siswa 
        SET Nm_siswa='$Nm_siswa',Id_user='$Id_user',Jenkel='$Jenkel',HP='$HP',Id_kelas='$Id_kelas'  
        WHERE Nis='$Nis'");

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
                        <label>Nis</label>
                        <input type="text" name="Nis"
                        value="<?= isset($edit['Nis']) ? $edit['Nis'] : ''; ?>"
                        class="form-control">
                    </div>
                                <div class="form-group">
                        <label>id user</label>
                        <input type="text" name="Id_user"
                        value="<?= isset($edit['Id_user']) ? $edit['Id_user'] : ''; ?>"
                        class="form-control">
                    </div>
                            <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="Nm_siswa"
                        value="<?= isset($edit['Nm_siswa']) ? $edit['Nm_siswa'] : ''; ?>"
                        class="form-control">
                    </div>
                             <div class="form-group">
                                <Label for="Jenkel">Jenis Kelamin</label>
                                <select name="Jenkel" id="Jenkel" class="form-control">
                                <option value="laki">laki</option>
                                <option value="puan">puan</option>
                            </select>
                            </div>
                             <div class="form-group">
                        <label>HP</label>
                        <input type="text" name="HP"
                        value="<?= isset($edit['HP']) ? $edit['HP'] : ''; ?>"
                        class="form-control">
                    </div>
                            <div class="form-group">
                                <Label for="id_kelas">id kelas</label>
                                <select class="form-control" name="id_kelas" required>
                                    <option value="" disable selected>--Pilih Kelas--</option>
                                    <?php
                                    $getkelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                                    while ($returnkelas = mysqli_fetch_array($getkelas)){
                                        ?>
                                        <option value="<?= $returnkelas['id_kelas']; ?>"><?= $returnkelas['nm_kelas']; ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        <div class="card-footer">
                    <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                </form>
                </div>
            </div>
        </div>
    </div>
</section>