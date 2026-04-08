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
$carikode = mysqli_query($koneksi, "select max(nis) from siswa") or die (
    mysqli_error());
$datakode = mysqli_fetch_array($carikode);
if($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode ="S-" .str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode ="S-"; }
$_SESSION["KODE"] = $hasilkode;

if(isset($_POST['tambah'])){
    $nis = $_POST['nis'];
    $id_user = $_POST['id_user'];
    $nm_siswa = $_POST['nm_siswa'];
    $jenkel = $_POST['jenkel'];
    $HP = $_POST['HP'];
    $id_siswa = $_POST['id_siswa'];

    $insert = mysqli_query($koneksi,"INSERT INTO siswa value ('$nis','$id_user','$nm_siswa', '$jenkel','$HP','$id_siswa')");
    if($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert"
        aria-hidden="true">X</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
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
                                <Label for="jenkel">Jenis Kelamin</label>
                                <input type="text" name="jenkel" id="jenkel" placeholder="Jenis Kelamin" class="form-control">
                            </div>
                             <div class="form-group">
                                <Label for="HP">HP</label>
                                <input type="text" name="HP" id="HP" placeholder="HP" class="form-control">
                            </div>
                            <div class="form-group">
                                <Label for="id_siswa">Id Siswa</label>
                                <input type="text" name="id_siswa" id="id_siswa" placeholder="id_siswa" class="form-control">
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

