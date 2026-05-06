<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data skripsi</h1>
        </div>
    </div>
  </div>
</div>

<?php
$carikode = mysqli_query($koneksi, "select max(id_skripsi) from skripsi_2511500085") or die (
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
    $id_skripsi = $_POST['id_skripsi'];
    $judul_skripsi = $_POST['judul_skripsi'];
    $topik085 = $_POST['topik085'];
    $semester085 = $_POST['semester085'];
    $thn_ajaran085 = $_POST['thn_ajaran085'];

    $insert = mysqli_query($koneksi,"INSERT INTO skripsi_2511500085 value ('$id_skripsi','$judul_skripsi','$topik085','$semester085','$thn_ajaran085')");
    if($insert) {
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert"
        aria-hidden="true">X</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil DIsimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=skripsi_2511500085">';
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
                                <label for="id_skripsi">Id skripsi</label>
                                <input type="text" name="id_skripsi" value="<?= $hasilkode; ?>" placeholder="Id Kat" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <Label for="nm_skripsi">judul_skripsi</label>
                                <input type="text" name="judul_skripsi" id="judul_skripsi" placeholder="judul_skripsi" class="form-control">
                            </div>
                             <div class="form-group">
                                <Label for="topik085">topik085</label>
                                <input type="text" name="topik085" id="topik085" placeholder="topik085" class="form-control">
                            </div>
                             <div class="form-group">
                                <Label for="semester085">semester085</label>
                                <select name="semester085" id="semester085" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Gasal">Gasal</option>
                                <option value="Genap">Genap</option>
                            </select>
                            </div>
                             <div class="form-group">
                                <Label for="thn_ajaran085">thn_ajaran085</label>
                                 <select name="thn_ajaran085" id="thn_ajaran085" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="2025/2026">2025/2026</option>
                                <option value="2027/2028">2027/2028</option>
                                <option value="2029/2030">2029/2030</option>
                                <option value="2031/2032">2031/2032</option>
                            </select>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

