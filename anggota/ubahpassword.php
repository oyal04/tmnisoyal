<?php 
session_start();
include '../assets/konektor.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passlama = $_POST['passlama'];
    $passbaru = $_POST['passbaru'];

    $email = $_SESSION['email'];
    $sql = "SELECT password FROM manggota WHERE email='$email'";
    $result = $konektor->query($sql);

        $row = $result->fetch_assoc();
        $password_database = $row["password"];
        
        if ($passlama == $password_database) {
            // Enkripsi password baru sebelum disimpan
           // $passbaru_encrypted = password_hash($passbaru, PASSWORD_DEFAULT);
            $konektor->query("UPDATE manggota SET password = '$passbaru' WHERE email='$email'");
            echo "Password berhasil diperbaharui";
        } else {
            echo "Password lama tidak valid";
        }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <title>Bootstrap Example</title>
  <?php include 'assets/cdn.php'; ?>
  <link rel="stylesheet" href="simpok.css">
</head>
<body>

<div class="container-fluid pt-0 shadow p-0 mb-0 bg-dark">   
    <?php include 'assets/navbar.php'; ?> 

    <div class="row ms-2">
        <div class="col-sm-6">
            <div class="alert alert-info">
                <br>
                <form action="" method="post">
                    <div class="input-group">
                        <span class="input-group-text">Masukkan password lama:</span>
                        <input type="password" class="form-control" name="passlama">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Masukkan password baru:</span>
                        <input type="password" class="form-control" name="passbaru">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Ubah Password</button>
                </form>
            </div>                                 
        </div>
    </div>
    <br>
    <button type="submit" class="btn btn-success" id="kembaliBtn">Kembali</button>
    <script>
                                        // Menambahkan event listener untuk tombol "Ubah Password"
                                        document.getElementById('kembaliBtn').addEventListener('click', function() {
                                        // Mengarahkan pengguna ke halaman lain
                                        window.location.href = 'keanggotaan.php'; // Ganti 'halaman-tujuan.html' dengan URL halaman yang diinginkan
                                        });
                                    </script>

    <br><br>
    <?php include 'assets/kaki.php'; ?>          
</div>


</body>
</html>
