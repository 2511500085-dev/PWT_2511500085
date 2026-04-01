<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Mata Pelajaran</h1>
            </div>
        </div>
    </div>
</div>
    
    <?php
    $kd = $_GET['kd'];
    $edit = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM mapel WHERE kd_mapel='$kd' "));

    if(isset($_POST['tambah'])) {
        $kd_mapel = $_POST['kd_mapel'];
        $nm_mapel = $_POST['nm_mapel'];
        $kkm = $_POST['kkm'];

        $insert = mysqli_query($koneksi,"UPDATE mapel SET nm_mapel='$nm_mapel', kkm='$kkm' WHERE kd_mapel='$kd_mapel' ");
    }