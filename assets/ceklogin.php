<?php 
//Script ini diletakan pada halaman cekLogin.php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'konektor.php';

//Fungsi untuk mencegah inputan karakter yang tidak sesuai
include 'cekinput.php'; 

// menangkap data yang dikirim dari form
$email = input($_POST['email']);
$password = input($_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($konektor,"select * from manggota where email='$email' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	header("location:../anggota/beranda.php");
}else{
	header("location:../index.php?pesan=gagal");
}
?>

