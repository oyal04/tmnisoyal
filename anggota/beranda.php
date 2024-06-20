<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:index.php?pesan=belum_login");
}
?>

<?php include '../assets/konektor.php'; ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title></title>
    <?php include 'assets/cdn.php'; ?>

</head>

<body>
    <div class="container pt-0 shadow p-0 mb-0 bg-dark">
        <?php include 'assets/navbar.php'; ?>

        <div class="row ms-2">
            <div class="col-sm-4">
                <div class="alert alert-warning">
                    Menu: Beranda Anggota
                </div>
            </div>
            <div class="col-sm-8">Sesuatu yang luar biasa akan segera hadir di sini</div>
        </div>
        <br>
        <br>
        <?php include 'assets/kaki.php'; ?>
    </div>


</body>

</html>