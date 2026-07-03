<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Jadwal</h1>
            </div>
        </div>
    </div>
</div>

<?php

if(isset($_POST['tambah'])){

    $kd_jadwal     = $_POST['kd_jadwal'];
    $guru          = $_POST['guru'];
    $semester      = $_POST['semester'];
    $tahun_ajaran  = $_POST['tahun_ajaran'];
    $kd_mapel      = $_POST['kd_mapel'];
    $hari          = $_POST['hari'];
    $jam           = $_POST['jam'];

    $allSuccess = true;

    // Simpan ke tabel jadwal
    $cek = mysqli_query($koneksi,"
        SELECT * FROM jadwal
        WHERE kd_jadwal='$kd_jadwal'
    ");

    if(mysqli_num_rows($cek)==0){

        $insertjadwal = mysqli_query($koneksi,"
            INSERT INTO jadwal
            (kd_jadwal,Guru,Semester,tahun_ajaran)
            VALUES
            ('$kd_jadwal','$guru','$semester','$tahun_ajaran')
        ");

        if(!$insertjadwal){
            die(mysqli_error($koneksi));
        }
    }

    // Simpan detail
    for($i=0;$i<count($kd_mapel);$i++){

        $mapel = $kd_mapel[$i];
        $hri   = $hari[$i];
        $jm    = $jam[$i];

        $pecahJam = explode('-', $jm);

        $jam_mulai   = trim($pecahJam[0]);
        $jam_selesai = trim($pecahJam[1]);

        $insertdetail = mysqli_query($koneksi,"
            INSERT INTO detail_jadwal
            (
                Id_jadwal,
                Kd_mapel,
                Kd_guru,
                Hari,
                Jam_mulai,
                Jam_selesai
            )
            VALUES
            (
                '$kd_jadwal',
                '$mapel',
                '$guru',
                '$hri',
                '$jam_mulai',
                '$jam_selesai'
            )
        ");

        if(!$insertdetail){
            $allSuccess = false;
            echo mysqli_error($koneksi)."<br>";
        }
    }

    if($allSuccess){

        echo "
        <div class='alert alert-success'>
            Data berhasil disimpan
        </div>";

        echo "<meta http-equiv='refresh' content='1;url=index.php?page=jadwal'>";

    }else{

        echo "
        <div class='alert alert-danger'>
            Gagal menyimpan data detail
        </div>";

    }

}
?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

<?php
// Generate kode jadwal otomatis
$q = mysqli_query($koneksi, "SELECT MAX(kd_jadwal) AS kode FROM jadwal");
$d = mysqli_fetch_assoc($q);

if ($d['kode']) {
    $no = (int) substr($d['kode'], 2);
    $no++;
    $hasilkode = "J-" . sprintf("%03d", $no);
} else {
    $hasilkode = "J-001";
}
?>
<h3>Tambah Jadwal</h3>
<form method="POST">
    <div class="form-group">
        <label>Kode Jadwal</label>
        <input type="text" name="kd_jadwal" value="<?= $hasilkode ?>" class="form-control" readonly>
    </div>

                     <label>Guru</label>
                    <select name="guru" class="form-control" required>
                    <option value="">-- Pilih Guru --</option>

        <?php
        $qguru = mysqli_query($koneksi, "SELECT * FROM guru");

        while($g = mysqli_fetch_assoc($qguru)){
            echo "<option value='".$g['kd_guru']."'>".$g['nm_guru']."</option>";
        }
        ?>
                        </select>
</div>
                    <div class="form-group">
                    <label>Semester</label>
                    <select name="semester" class="form-control" required>
                        <option selected disabled>--Pilih semester--</option>
                        <option>Ganjil</option>
                        <option>Genap</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <select name="tahun_ajaran" class="form-control" required>
                        <option selected disabled>--Pilih Tahun Ajaran--</option>
                        <option>2024-2025</option>
                        <option>2025-2026</option>
                    </select>
                </div>

                <hr>
                <h5>Detail Jadwal</h5>

<div id="detail-jadwal">
    <div class="row mb-2">

        <div class="col-md-3">
            <select name="kd_mapel[]" class="form-control">
                <option selected disabled>--Pilih Mapel--</option>
                <?php
                $mapel = mysqli_query($koneksi, "SELECT * FROM mapel");
                while ($m = mysqli_fetch_assoc($mapel)) {
                    echo "<option value='{$m['kd_mapel']}'>{$m['nm_mapel']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="col-md-3">
            <select name="hari[]" class="form-control" required>
                <option selected disabled>--Pilih Hari--</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option>Jumat</option>
                <option>Sabtu</option>
            </select>
        </div>

        <div class="col-md-3">
            <select name="jam[]" class="form-control" required>
                <option selected disabled>--Pilih Jam--</option>
                <option>08.00-10.00</option>
                <option>08.00-09.30</option>
                <option>10.30-12.00</option>
                <option>12.30-14.00</option>
            </select>
        </div>

        <div class="col-md-3">
            <input type="text" name="kelas[]" class="form-control" placeholder="Kelas" required>
        </div>

    </div>
</div>

    <button type="button" class="btn btn-info" onclick="tambahBaris()">
    + Tambah Mapel </button>
    <br><br>
    <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
</form>

<script>
function tambahBaris() {
    let container = document.getElementById('detail-jadwal');
    let row = container.firstElementChild.cloneNode(true);
    row.querySelectorAll('input').forEach(input => input.value = '');
    container.appendChild(row);
}
</script>

        </div>
    </div>
</div>
</div>
                    



