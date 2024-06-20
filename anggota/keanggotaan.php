<?php 
session_start();
include '../assets//konektor.php';


$simwajib =1000000;
$_SESSION['simwajib'] = $simwajib;



$simsukrel = 800000;
$_SESSION['simsukrel'] = $simsukrel;

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>T Manis 21120111</title>
    <?php include '../assets/cdn.php'; ?>


    <style>
        .card-container{
            width: 85.6mm;
            height: 54mm;
            border: 1px solid #000;
            padding: 10px;
            margin: 20px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            background-image: linear-gradient(#7a73cc, white, #7a73cc);
            color : green;
            
        }
        .card-container img {
            width: 20%;
            height: auto; 
            position: absolute;        
        }

        .koperasi {
            position: absolute;   
            margin-left:85px;   
            top:20px;   
        }

        .member-info {
            position: absolute;      
            top:80px;   
        }

    

        .download-btn {
            margin-top: 230px;
            margin-left: 60px;
            text-align: center;
            position: absolute; 
        }
    </style>
</head>

<body>

<div class="container pt-0 shadow p-0 mb-0 bg-dark">
        <?php include 'assets/navbar.php'; ?>
    
        <div class="row ms-2">

            <div class="col-sm-4">
                <div class="alert alert-warning">
                   <b> Menu</b>: Keanggotaan      
                </div>


                <div class="container">
                    <?php
                                $no = 1;
                                $data = mysqli_query($konektor,"select * from manggota");
                                while($d = mysqli_fetch_array($data)){
                                ?>                                       
        
                        <div class="card-container" id="card">
                            <img src="../assets/logokop.png" alt="Kartu Anggota" width="200" height="auto"><br><br>
                                    <div class="koperasi">
                                        <h5>KOPERASI PINJAMAN<h5>
                                    </div>
                                <div class="member-info">
                                    <h6>Nama : <?php echo $d['namalengkap'];?></h6> <?php $_SESSION['namal'] = $d['namalengkap']; ?>
                                    <h6>NIK :  <?php echo $d['nik'];?></h6>
                                    <h6>Alamat:  <?php echo $d['alamat'];?></h6>
                                    <h6>Bergabung Sejak: 2024</h6>
                                </div>
                        </div>
                        <div class="download-btn">
                            <button id="downloadBtn" class="btn btn-primary">Download Kartu Anggota</button>
                        </div>
                    <?php }?>
                </div>   
                        <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
                        <script>
                            document.getElementById('downloadBtn').addEventListener('click', function() {
                                html2canvas(document.getElementById('card')).then(canvas => {
                                    let link = document.createElement('a');
                                    link.download = 'kartu_anggota.jpeg';
                                    link.href = canvas.toDataURL('image/jpeg');
                                    link.click();
                                });
                            });
                        </script>
            </div>

            <div class="col-sm-4">                 
                    <?php
                             $no = 1;
                             $data = mysqli_query($konektor,"select * from manggota");
                             
                                while($d = mysqli_fetch_array($data)){
                                ?>                                                            
                                    <ul>
                                        <li>ID Anggota : <?php echo $no++;?></li>
                                        <li>TANGGAL DAFTAR : <?php echo $d['tanggaldaftar'];?></li>
                                        <li>NIK : <?php echo $d['nik'];?></li>
                                        <li>NOKK : <?php echo $d['nokk'];?></li>
                                        <li>NAMA LENGKAP : <?php echo $d['namalengkap'];?></li>
                                        <li>NAMA PANGGILAN : <?php echo $d['namapanggilan'];?></li>
                                        <li>TEMPAT LAHIR : <?php echo $d['tempatlahir'];?></li>
                                        <li>JENIS KELAMIN : <?php echo $d['jeniskelamin'];?></li>
                                        <li>NAMA IBU KANDUNG : <?php echo $d['namaibukandung'];?></li>
                                        <li>ALAMAT : <?php echo $d['alamat'];?></li>
                                        <li>ID STATUS TEMPAT TINGGAL : <?php echo $d['idstatustempattinggal'];?></li>
                                        <li>RT : <?php echo $d['rt'];?></li>
                                        <li>RW : <?php echo $d['rw'];?></li>
                                        <li>IDKELDESA : <?php echo $d['idkeldesa'];?></li>
                                        <li>AGAMA : <?php echo $d['agama'];?></li>
                                        <li>STATUS PERKAWINAN : <?php echo $d['statusperkawinan'];?></li>
                                        <li>ID PEKERJAAN : <?php echo $d['idpekerjaan'];?></li>   
                                        <li>NAMA TEMMPAT KERJA : <?php echo $d['namatempatkerja'];?></li>                                    
            </div>
            <div class="col-sm-4">
                                        <li>ID BIDANG USAHA : <?php echo $d['idbidangusaha'];?></li>
                                        <li>ID PENDIDIKAN TERAKHIR : <?php echo $d['idpendidikanterakhir'];?></li>
                                        <li>TELPON ANGGOTA : <?php echo $d['teleponanggota'];?></li>
                                        <li>TELPON KERABAT : <?php echo $d['teleponkerabat'];?></li>
                                        <li>EMAIL : <?php echo $d['email'];?></li>
                                        <li>NOREK BRI : <?php echo $d['norekbri'];?></li>
                                        <li>NAMA NASABAH : <?php echo $d['namanasabah'];?></li>
                                        <li>NPWP : <?php echo $d['npwp'];?></li>
                                        <li>AHLI WARIS 1 : <?php echo $d['ahliwaris1'];?></li>
                                        <li>AHLI WARIS 2 : <?php echo $d['ahliwaris2'];?></li>
                                        <li>KATEGORI ANGGOTA : <?php echo $d['kategorianggota'];?></li>
                                        <li>STATUS KEANGGOTAAN : <?php echo $d['statuskeanggotaan'];?></li>
                                        <li>PASSWORD : <?php echo $d['password'];?></li>
                                        <li>ID UV : <?php echo $d['iduv'];?></li>
                                        <li>ID UA : <?php echo $d['idua'];?></li>
                                        <li>KODE AMAL : <?php echo $d['kodeamal'];?></li>
                                    </ul>
                                    <br>
                                    <button type="submit" class="btn btn-info" id="ubahPasswordBtn">Ubah Password</button>
                                    <script>
                                        // Menambahkan event listener untuk tombol "Ubah Password"
                                        document.getElementById('ubahPasswordBtn').addEventListener('click', function() {
                                        // Mengarahkan pengguna ke halaman lain
                                        window.location.href = 'ubahpassword.php'; // Ganti 'halaman-tujuan.html' dengan URL halaman yang diinginkan
                                        });
                                    </script>
            </div>
                        <?php }?>
        </div>
       

    <br>
        <div class="row ms-2">
            <div class="col-sm-4">
                <div>    

                </div>
            </div>
            <div class="col-sm-8">
                <div class="alert alert-warning">
                 <b>Informasi!</b> Jika ingin melakukan perubahan data, maka silakan hubungi Admin di nomor:082237200967
                </div>
            </div>
         </div>
         
         <script>
                $(document).ready(function(){
                    $(#myInput).on("keyup",function(){
                        var value = $(this).val()toLowerCase();
                        $("#myTable tr").filter(function(){
                        $(this).toggler($(this).text().toLowerCase().indexOf(value) > -1)

                    });
                  });
                });
            </script>
</div>
</body>

</html>