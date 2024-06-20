<?php 
session_start();
include '../assets/konektor.php';

 $siimpok = $_SESSION['simpok'];
 $simjib =  $_SESSION['simwajib'];
 $simsukrel =  $_SESSION['simsukrel'];
 $total_simpanan = $siimpok + $simjib + $simsukrel;

 $limit = 3*$total_simpanan ;

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <title>Castelo</title>
    <?php include 'assets/cdn.php'; ?>
</head>

<body>

    <div class="container pt-0 shadow p-0 mb-0 bg-dark">
        <?php include 'assets/navbar.php'; ?>

        <div class="row m-3">
            <!------------------------------------>
            <div class="col-sm-6">
                <div class="alert alert-info">
                <p><b>Pinjaman Umum:</b></p>
                <ul style="list-style-type: number">
                    <li>Untuk anggota baru, <b>maksimal</b> mengajukan pinjaman sebesar 3x simpanan   <input class="btn btn-info" type="submit" value="Rp.750.000" style="background-color: yellow; border-color: yellow; color: black; padding: 0px 0px; font-size: 14px;"> baik simpanan kepemilikan maupun simpanan kepercayaan</li>
                    <li>Pinjaman berikutnya dapat dilakukan apabila angsuran pinjaman sebelumnya mencapai minimal 50%</li>
                    <li>Pencairan pinjaman dilakukan tanggal 1 s.d. 25 setiap bulan</li>
                    <li>Bunga pinjaman adalah 1% per bulan flat</li>
                    <li>Administrasi dan materai 1% dari pinjaman</li>
                    <li>Potongan simpanan kapitalisasi yang ditambahkan sebesar 2% dan disimpan ke simpanan sukarela</li>
                    <li>Pembayaran pinjaman dilakukan dari tanggal 1-25 setiap bulan hingga jatuh tempo</li>
                </ul>



                </div>
            </div>
            <!----------form pendaftaran-------------->
            <div class="col-sm-6">
                <div class="alert alert-warning">
                    <center>Form Pengajuan Pinjaman</center>


                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">Ajukan Pinjaman</button>
                                    </div>
                                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Pengajuan Pinjaman</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
    <form>
        <div class="alert p-2" style="background-color:#00FF00">
            <div class="row justify-content-center">
                <div class="col-sm-2" style="display: flex; justify-content: center; align-items: center; height: 100%; margin-top: 45px;">
                    <img src="../assets/centang.png" width="40" height="40">
                </div>
                <div class="col-sm-10">
                    <span style="font-size: smaller;"><b>LIMIT</b> pinjaman Anda saat ini:<br><?php echo "<h3>Rp.$limit</h3>"?> <br>
                    Silakan tingkatkan saldo simpanan untuk <br>mendapatkan limit pinjaman yang lebih tinggi
                    </span>
                </div>
            </div>
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Jumlah Pinjaman</span>
            <input type="text" name="usul" class="form-control" placeholder="Contoh: 11400000" id="jumpin" oninput="calculateTotal()" required>
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Lama Angsuran</span>
            <input type="text" name="kodeamal" class="form-control" placeholder="Contoh: 20" required>
            <span class="input-group-text">Bulan</span>
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Bunga Pinjaman</span>
            <input type="text" name="usul" class="form-control" value="1" id="bungpin" oninput="calculateTotal()" readonly>
            <span class="input-group-text">%</span>
            <input type="text" name="usul" class="form-control" placeholder="simulasi" id="nibung" oninput="calculateTotal()" readonly>
            <span class="input-group-text">Per Bulan</span>
        </div>
        <div class="alert alert-info p-2">
            <div class="row justify-content-center">
                <div class="col-sm-2" style="display: flex; justify-content: center; align-items: center; height: 100%; margin-top: 5px;">
                    <img src="../assets/warning.png" width="40" height="40">
                </div>
                <div class="col-sm-10">
                    <span style="font-size: smaller;">Biaya Kapitalisasi sebesar 2% dari total usulan pinjaman akan disetor ke simpanan sukarela anggota terkait</span>
                </div>
            </div>
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Kapitalisasi</span>
            <input type="text" name="usul" class="form-control" value="2" id="kap" oninput="calculateTotal()" readonly>
            <span class="input-group-text">%</span>
            <input type="text" name="usul" class="form-control" placeholder="simulasi" id="nikap" oninput="calculateTotal()" readonly>
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">realisasi</span>
            <input type="text" name="usul" class="form-control"  oninput="calculateTotal()"   placeholder="simulasi" id="real" readonly>
        </div>
        <div class="input-group mb-2">
            <span class="input-group-text">Nama Penjamin</span>
            <input type="text" name="usul" class="form-control" required>
        </div>
    </form>
</div>

<script>


    // Fungsi untuk menghapus dua angka nol di belakang nilai realisasi
function removeTrailingZeros() {
    const realisasiInput = document.getElementById('real');
    let value = realisasiInput.value;

    // Menghapus dua angka nol di belakang jika ada
    if (value.endsWith('00')) {
        value = value.slice(0, -2);
    }
s
    // Memperbarui nilai input dengan nilai yang telah dimodifikasi
    realisasiInput.value = value;
}

// Memanggil fungsi ini saat halaman dimuat atau saat nilai diubah
document.addEventListener('DOMContentLoaded', removeTrailingZeros);

// Jika ada mekanisme lain yang mengubah nilai input, panggil fungsi ini lagi setelah perubahan tersebut
// Misalnya, setelah AJAX call atau event tertentu



    function calculateTotal() {
        var jumpin = parseFloat(document.getElementById('jumpin').value);
        var bungpin = parseFloat(document.getElementById('bungpin').value);
        var kap = parseFloat(document.getElementById('kap').value);

        var nibung = bungpin / 100 * jumpin;
        var nikap = kap / 100 * jumpin;
        var real = jumpin - nikap;

        if (!isNaN(nibung)) {
            document.getElementById('nibung').value = nibung.toFixed(2);
            document.getElementById('nikap').value = nikap.toFixed(2);
            document.getElementById('real').value = real.toFixed(2);
        } else {
            document.getElementById('nibung').value = '';
            document.getElementById('nikap').value = '';
            document.getElementById('real').value = '';
        }
    }



</script>





                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Ajukan</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                            </div>

                                        </div>
                                    </div>




                    <br>
                    
                </div>
            </div>
        </div>
  

        <div>
            <?php include 'assets/kaki.php'; ?>
        </div>
        <!-------------------------------------->
    </div>
</body>

</html>
