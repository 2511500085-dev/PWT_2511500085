<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Guru</h1>
        </div>
    </div>
  </div>
</div>
<?php
$carikode = mysqli_query($koneksi, "select max(kd_guru) from guru") or die (
    mysqli_error());
$datakode = mysqli_fetch_array($carikode);
if($datakode)  {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode ="G-" .str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode ="G-"; }
$_SESSION["KODE"] = $hasilkode;

if(isset($_POST['tambah'])){
    $kd_guru = $_POST['kd_guru'];
    $id_user = $_POST['id_user'];
    $nm_guru = $_POST['nm_guru'];
    $jenkel = $_POST['jenkel'];
    $pend_terakhir = $_POST['pend_terakhir'];
    $HP = $_POST['HP'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($koneksi,"INSERT INTO guru value ('$kd_guru','$id_user','$nm_guru', '$jenkel','$pend_terakhir','$HP','$alamat')");
    $insertuser = mysqli_query($koneksi,"INSERT INTO admin (username,password,role) VALUES ('$kd_guru','1234','siswa')");
    if($insert && $insertuser) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert"
        aria-hidden="true">X</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=guru">';
    }else{
        echo '<div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"
        aria-hidden="true">X</button
        <h5> <i class="icon fas fa-info"></i> Info </h5>
        <h4>Gagal Disimpan</h4></div>';
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
                                <label for="kd_mapel">Kode Guru</label>
                                <input type="text" name="kd_guru" value="<?= $hasilkode; ?>" placeholder="Id Kat" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <Label for="id_user">Id User</label>
                                <input type="text" name="id_user" id="id_user" placeholder="Id User" class="form-control">
                            </div>
                             <div class="form-group">
                                <Label for="nm_guru">Nama Guru</label>
                                <input type="text" name="nm_guru" id="nm_guru" placeholder="Nama Guru" class="form-control">
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
                                <label for="pend_terakhir">Pendidikan Terakhir</label>
                                <select name="pend_terakhir" id="pend_terakhir" class="form-control">
                                    <option value="">pilih Pendidikan Terakhir</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMK">SMK</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <Label for="HP">HP</label>
                                <input type="text" name="HP" id="HP" placeholder="HP" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" placeholder="alamat" class="form-control">
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        