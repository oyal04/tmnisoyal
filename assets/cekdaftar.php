<?php
//Script ini disimpan dengan nama file sendiri. Misalkan insertAdmin.php
// koneksi database
include 'konektor.php';

//Fungsi untuk mencegah inputan karakter yang tidak sesuai
include 'cekinput.php';
 
// menangkap data yang di kirim dari form
$fariabel1 = input($_POST['tanggaldaftar']);
$fariabel2 = input($_POST['nik']);
$fariabel3 = input($_POST['nokk']);
$fariabel4 = input($_POST['namalengkap']);
$fariabel5 = input($_POST['namapanggilan']);
$fariabel6= input($_POST['tempatlahir']);
$fariabel7 = input($_POST['tanggallahir']);
$fariabel8 = input($_POST['jeniskelamin']);
$fariabel9 = input($_POST['namaibukandung']);
$fariabel10 = input($_POST['alamat']);
$fariabel11 = input($_POST['idstatustempattinggal']);
$fariabel12 = input($_POST['rt']);
$fariabel13 = input($_POST['rw']);
$fariabel14 = input($_POST['idkeldesa']);
$fariabel15 = input($_POST['idagama']);
$fariabel16 = input($_POST['statusperkawinan']);
$fariabel17 = input($_POST['idpekerjaan']);
$fariabel18 = input($_POST['namatempatkerja']);
$fariabel19 = input($_POST['alamattempatkerja']);
$fariabel20 = input($_POST['idbidangusaha']);
$fariabel21 = input($_POST['idpendidikanterakhir']);
$fariabel22 = input($_POST['teleponanggota']);
$fariabel23 = input($_POST['teleponkerabat']);
$fariabel24 = input($_POST['email']);
$fariabel25 = input($_POST['norekbri']);
$fariabel26 = input($_POST['namanasabah']);
$fariabel27 = input($_POST['npwp']);
$fariabel28 = input($_POST['ahliwaris1']);
$fariabel29 = input($_POST['ahliwaris2']);
$fariabel30 = input($_POST['kategorianggota']);
$fariabel31 = input($_POST['statuskeanggotaan']);
$fariabel32 = input($_POST['statusakun']);
$fariabel33 = input($_POST['password']);
$fariabel34 = input($_POST['iduv']);
$fariabel35 = input($_POST['idua']);
$fariabel36 = input($_POST['kodeamal']);

// menginput data ke database
mysqli_query($konektor,"insert into manggota values ('','$fariabel1','$fariabel2','$fariabel3','$fariabel4','$fariabel5','$fariabel6','$fariabel7','$fariabel8','$fariabel9','$fariabel10','$fariabel11','$fariabel12','$fariabel13','$fariabel14','$fariabel15','$fariabel16','$fariabel17','$fariabel18','$fariabel19','$fariabel20','$fariabel21','$fariabel22','$fariabel23','$fariabel24','$fariabel25','$fariabel26','$fariabel27','$fariabel28','$fariabel29','$fariabel30','$fariabel31','$fariabel32','$fariabel33','$fariabel34','$fariabel35','$fariabel36')");

// mengalihkan halaman kembali ke index.php
header("location:../index.php?q=1");




/*
//Script ini diletakan pada halaman cekLogin.php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'konektor.php';

//Fungsi untuk mencegah inputan karakter yang tidak sesuai
include 'cekinput.php'; 

// menangkap data yang dikirim dari form
$email = input($_POST['mail']);
$password = input($_POST['pass']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($konektor,"INSERT INTO manggota (email,password) VALUES ('$email','$password')");
if($data > 0){
	$_SESSION['email'] = $email;
	$_SESSION['status'] = "login";
	header("location:../index.php?pesan=berhasil!");
}else{
	header("location:../index.php?pesan=gagal");
}
*/
?>


