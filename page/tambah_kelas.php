<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data kelas</h1>
        </div>
    </div>
  </div>
</div>

<?php


if(isset($_POST['tambah'])){
    $pl = $_POST['pl'];
    $pb = $_POST['pb'];
    $cek = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' "));

    if($cek){
    $update = mysqli_query($koneksi,"UPDATE user SET password = '$pb' WHERE password = '$pl' AMD username = '$username' ");
    if($update){
        echo "benar";
    }
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
                                <label for="id_kelas">Id Kelas</label>
                                <input type="text" name="id_kelas" value="<?= $hasilkode; ?>" placeholder="Id Kat" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <Label for="nm_kelas">Nama Kelas</label>
                                <input type="text" name="nm_kelas" id="nm_kelas" placeholder="Nama kelas" class="form-control">
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

