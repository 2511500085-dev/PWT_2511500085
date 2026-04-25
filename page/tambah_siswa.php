<?php
$carikode = mysqli_query($koneksi, "SELECT MAX(nis) as kode FROM siswa") or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($carikode);

if($data['kode'] != NULL) {
    $nilaikode = substr($data['kode'], 2);
    $kode = (int)$nilaikode + 1;
    $hasilkode ="S-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode ="S-001";
}

$_SESSION["KODE"] = $hasilkode;

if(isset($_POST['tambah'])){
    $nis = $_POST['nis'];
    $id_user = $_POST['id_user'];
    $nm_siswa = $_POST['nm_siswa'];
    $jenkel = $_POST['jenkel'];
    $HP = $_POST['HP'];
    $id_siswa = $_POST['id_siswa'];
    $id_kelas = $_POST['id_kelas'];

    // INSERT KE SISWA
    $insert = mysqli_query($koneksi,"
    INSERT INTO siswa (nis,id_user,nm_siswa,jenkel,HP,id_siswa,id_kelas)
    VALUES ('$nis','$id_user','$nm_siswa','$jenkel','$HP','$id_siswa','$id_kelas')
    ");

    // INSERT KE USER (PERBAIKAN!)
    $insertuser = mysqli_query($koneksi,"
    INSERT INTO admin (username,password,role)
    VALUES ('$nis','1234','siswa')
    ");

    if($insert){
        echo '<div class="alert alert-success">Berhasil Disimpan</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
    }else{
        echo '<div class="alert alert-danger">Gagal Disimpan</div>';
    }
}
?>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="card-body p-2">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nis">Nis</label>
                                <input type="text" name="nis" value="<?= $hasilkode; ?>" placeholder="Id Kat" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <Label for="id_user">Id User</label>
                                <input type="text" name="id_user" id="id_user" placeholder="Id User" class="form-control">
                            </div>
                             <div class="form-group">
                                <Label for="nm_siswa">Nama Siswa</label>
                                <input type="text" name="nm_siswa" id="nm_siswa" placeholder="Nama Siswa" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="id_siswa">Id Siswa</label>
                                <input type="text" name="id_siswa" id="id_siswa" placeholder="id_siswa" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jenkel">Jenis Kelamin</label>
                                <select name="jenkel" id="jenkel" class="form-control">
                                    <option value="">pilih jenis kelamin</option>
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="HP">No HP</label>
                                <input type="number" name="HP" id="HP" placeholder="No HP" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="id_kelas">ID kelas</label>
                                <select class="form-control" name="id_kelas" required>
                                    <option value="" disabled selected>--Pilih Kelas--</option>
                                    <option value="TKJ1">TKJ1</option>
                                    <option value="TKJ2">TKJ2</option>
                                    <option value="TKJ3">TKJ3</option>
                                    <?php
                                    $getkelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                                    while ($returnkelas = mysqli_fetch_array($getkelas)) {
                                        ?>
                                        <option value="<?= $returnkelas['id_kelas']; ?></option>
                                        <?php } ?>
                                    </select>

                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

