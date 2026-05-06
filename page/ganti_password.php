<?php
include "config/koneksi.php";

$username = $_SESSION['Username'];

if (isset($_POST['simpan'])) {

    $password_baru = $_POST['password_baru'];

    $update = mysqli_query($koneksi, "
        UPDATE admin
        SET Password='$password_baru'
        WHERE Username='$username'
    ");

    if ($update) {
        echo "<script>
            alert('Password berhasil diganti');
            window.location='index.php';
        </script>";
    } else {
        echo "Gagal : " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Ganti Password</title>
</head>
<body>

<form method="POST">
    <h2>Ganti Password</h2>
    <input type="Password" name="password_baru" placeholder="Password Baru" required>
    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>