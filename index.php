<?php 

session_start();

include 'assets/konektor.php';

$simpok =50000;
$_SESSION['simpok'] = $simpok;


$data = mysqli_query($konektor, "select * from mprofilperusahaan");
if (mysqli_num_rows($data) > 0) {
    while ($d = mysqli_fetch_array($data)) {
        $visi = $d['visi'];
        $misi = $d['misi'];
        $sejarah = $d['sejarah'];
        $tujuan = $d['tujuan'];
    }
} 
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">


<head>
    <title>castelo</title>
    <?php include 'assets/cdn.php'; ?>
</head>

<body>

    <div class="container pt-0 shadow p-0 mb-0 bg-dark">
        <?php include 'assets/navbar.php'; ?>

        <div class="row m-3">
            <!------------------------------------>
            <div class="col-sm-4">
                <div class="alert alert-info">
                    <center>Selamat Datang di KSP T-Manisee</center>
                </div>
                <!---------------------------------->
                <div id="accordion">

                <div class="card">
      <div class="card-header">
          <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
         Visi
            </a>
         </div>
  <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
    <div class="card-body">
    <?php echo $visi; ?>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
      Misi
    </a>
  </div>
  <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
    <div class="card-body">
    <?php echo $misi; ?>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
     Sejarah
    </a>
  </div>
  <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
    <div class="card-body">
    <?php echo $sejarah; ?>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThreex">
      Tujuan
    </a>
  </div>
  <div id="collapseThreex" class="collapse" data-bs-parent="#accordion">
    <div class="card-body">
    <?php echo $tujuan; ?>
    </div>
  </div>
</div>
                    <br>
                    <!------form login------>

                    <div class="alert alert-info">
                        <center>Silahkan Masukan Email dan Password</center>
                        <br>
                        <form name="login" action="assets/ceklogin.php" method="post">
                            <div class="input-group">
                                <span class="input-group-text">Email</span>
                                <input type="text" class="form-control" name="email"
                                    placeholder="Silahkan Masukkan Email">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text">Password</span>
                                <input type="text" class="form-control" name="password"
                                    placeholder="Silahkan Masukkan Pasword">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Login</button>
                        </form>
                    </div>

                </div>
                <!------form login------>
            </div>
            <!----------form pendaftaran-------------->
            <div class="col-sm-8">
                <div class="alert alert-warning">
                    <center>Form Pendaftaran Anggota Baru</center>
                    <br>
                        <form name="login" action="assets/cekdaftar.php" method="post">
                        <div class="row">
               <div class="col-md-6">


               <div class="input-group mb-2">
        <span class="input-group-text">Tanggal Daftar</span>
        <input type="date" class="form-control" placeholder="Tanggal Daftar" name="tanggaldaftar" id="tanggaldaftar">
      
    </div>
  
  <div class="input-group mb-2">
        <span class="input-group-text">NIK</span>
        <input type="text" class="form-control" placeholder="Masukkan NIK" name="nik" id="nikInput" maxlength="16">
      
    </div>

 <div class="input-group mb-2">
        <span class="input-group-text">No KK</span>
        <input type="text" class="form-control" placeholder="Masukkan NO KK" name="nokk" id="kkInput" maxlength="16">
        
    </div>



  <div class="input-group mb-2">
  <span class="input-group-text">Nama Lengkap</span>
  <input type="text" name="namalengkap" class="form-control" required>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Nama Panggilan</span>
  <input type="text" name="namapanggilan" class="form-control" required>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Tempat Lahir</span>
  <input type="text" name="tempatlahir" class="form-control" required>
  </div>

<div class="input-group mb-2">
  <span class="input-group-text">Tanggal Lahir</span>
  <input type="date" name="tanggallahir" class="form-control" required>
</div>
  
<div class="input-group mb-2">
  <span class="input-group-text">Jenis Kelamin</span>
  <select class="form-select" name="jeniskelamin" type="text" required>
  <option>--Pilih-- </option>
  <option value="1">Perempuan</option>
  <option value="2">Laki-laki</option>
</select>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Nama Ibu Kandung</span>
  <input type="text" name="namaibukandung" class="form-control" required>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Alamat</span>
  <input type="text" name="alamat" class="form-control" required>
</div>
  
<div class="input-group mb-2">
  <span class="input-group-text">Status Tempat Tinggal</span>
  <select name="idstatustempattinggal" class="custom-select form-control" required>
              <?php 
              $data = mysqli_query($konektor,"SELECT * from mstatustempattinggal order by nama ASC");
              while($d = mysqli_fetch_array($data)){
              ?>    
                <option value="<?php echo $d['idstatustempattinggal']; ?>"><?php echo $d['nama']; ?></option>
              <?php } ?>
          </select>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">RT</span>
  <input type="text" name="rt" class="form-control" required>
  <span class="input-group-text">RW</span>
  <input type="text" name="rw" class="form-control" required>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Kelurahan Desa</span>
  <select name="idkeldesa" class="custom-select form-control" required>
              <?php 
              $data = mysqli_query($konektor,"SELECT mkeldesa.idkeldesa, mkeldesa.nama, mkecamatan.nama as namakec from mkeldesa, mkecamatan where mkeldesa.idkecamatan=mkecamatan.idkecamatan");
              while($d = mysqli_fetch_array($data)){
              ?>    
                <option value="<?php echo $d['idkeldesa']; ?>"><?php echo $d['nama']. ' | ' . $d['namakec']; ?></option>
              <?php } ?>
          </select>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Agama</span>
  <select name="idagama" class="custom-select form-control" required>
              <?php 
              $data = mysqli_query($konektor,"SELECT * from magama order by nama ASC");
              while($d = mysqli_fetch_array($data)){
              ?>    
                <option value="<?php echo $d['idagama']; ?>"><?php echo $d['nama']; ?></option>
              <?php } ?>
          </select>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Status Perkawinan</span>
  <select class="form-select" name="statusperkawinan" required>
  <option>--pilih--</option>
  <option value="1">Belum Kawin</option>
  <option value="2">Kawin</option>
  <option value="3">Cerai Mati</option>
  <option value="4">Cerai Hidup</option>
</select>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Pekerjaan</span>
  <select name="idpekerjaan" class="custom-select form-control" required>
              <?php 
              $data = mysqli_query($konektor,"SELECT * from mpekerjaan order by nama ASC");
              while($d = mysqli_fetch_array($data)){
              ?>    
                <option value="<?php echo $d['idpekerjaan']; ?>"><?php echo $d['nama']; ?></option>
              <?php } ?>
          </select>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Nama Tempat Pekerjaan</span>
  <input type="text" name="namatempatkerja" class="form-control">
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Alamat Tempat Kerja</span>
  <input type="text" name="alamattempatkerja" class="form-control">
</div>


</div>
<div class="col-md-6">


<div class="input-group mb-2">
  <span class="input-group-text">Bidang Usaha</span>
  <select name="idbidangusaha" class="custom-select form-control" required>
              <?php 
              $data = mysqli_query($konektor,"SELECT * from mbidangusaha order by nama ASC");
              while($d = mysqli_fetch_array($data)){
              ?>    
                <option value="<?php echo $d['idbidangusaha']; ?>"><?php echo $d['nama']; ?></option>
              <?php } ?>
          </select>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Pendidikan Terakhir</span>
  <select name="idpendidikanterakhir" class="custom-select form-control" required>
              <?php 
              $data = mysqli_query($konektor,"SELECT * from mpendidikanterakhir");
              while($d = mysqli_fetch_array($data)){
              ?>    
                <option value="<?php echo $d['idpendidikanterakhir']; ?>"><?php echo $d['nama']; ?></option>
              <?php } ?>
          </select>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Telepon Anggota</span>
  <input type="number" name="teleponanggota" class="form-control" required>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Telepon Kerabat</span>
  <input type="number"name="teleponkerabat" class="form-control" required>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">email</span>
  <input type="text" name="email" class="form-control" required>
</div>

<div class="input-group mb-2">
<span class="input-group-text">NoRek BRI</span>
    <input type="text"name="norekbri" class="form-control" placeholder="Masukan Nomor Rekening BRI" required>
   
  </div>
  
  <div class="input-group mb-2">
  <span class="input-group-text">Nama Akun BRI</span>
  <input type="text" name="namanasabah" class="form-control" required>
</div>

<div class="input-group mb-2">
<span class="input-group-text">NPWP</span>
    <input type="text" name="npwp" class="form-control" placeholder="Masukan NPWP" required>
   
  </div>

  <div class="input-group mb-2">
  <span class="input-group-text">Ahli Waris Utama</span>
  <input type="text" name="ahliwaris1" class="form-control" required>
              </div>
  <div class="input-group mb-2">
  <span class="input-group-text">Ahli Waris Kedua</span>
  <input type="text" name="ahliwaris2" class="form-control" required>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Kategori Anggota</span>
  <select class="form-select" name="kategorianggota" required>
  <option>--pilih--</option>
  <option value="1">Calon</option>
  <option value="2">Anggota</option>
</select>
</div>

<div class="input-group mb-2">
  <span class="input-group-text">Status Anggota</span>
  <select class="form-select" name="statuskeanggotaan" required>
  <option>--pilih--</option>
  <option value="1">Calon</option>
  <option value="2">Anggota</option>
</select>
</div>
<div class="input-group mb-2">
  <span class="input-group-text">Status Akun</span>
  <select class="form-select" name="statusakun" required>
  <option>--pilih--</option>
  <option value="1">status</option>
  <option value="2">Anggota</option>
</select>
</div>

<div class="input-group mb-2">
<span class="input-group-text">Password</span>
    <input type="text" name="password" class="form-control" placeholder="Masukan NPWP" required>
  </div>

  <div class="input-group mb-2">
<span class="input-group-text">iduv</span>
    <input type="text" name="iduv" class="form-control" placeholder="Masukan NPWP" required>
  </div>

  <div class="input-group mb-2">
<span class="input-group-text">idua</span>
    <input type="text" name="idua" class="form-control" placeholder="Masukan NPWP" required>
  </div>

  <div class="input-group mb-2">
<span class="input-group-text">Kode amal</span>
    <input type="text" name="kodeamal" class="form-control" placeholder="Masukan NPWP" required>
  </div>

    <!-- Input Button-->
    <input class="btn btn-success" type="submit" value="Simpan">
              </div>
              </div>

                        </form>
                </div>


</body>

</html>
            </div>


        </div>
        <?php include 'assets/kaki.php'; ?>
    </div>
    <!-------------------------------------->



    </div>

</body>

</html>