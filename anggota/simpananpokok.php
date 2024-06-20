<?php

session_start();

include '../assets//konektor.php';

$simpok =750000;
$_SESSION['simpok'] = $simpok;
$namal = $_SESSION['namal'];

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <title>castelo</title>
  <?php include 'assets/cdn.php'; ?>
  <link rel="stylesheet" href="simpok.css">
</head>
<body>

<div class="container pt-0 shadow p-0 mb-0 bg-dark">   
        <?php include 'assets/navbar.php'; ?>
        
        <div class="row ms-2">

           
                <div class="col-sm-4">
                    <div class="row">
                            <div class="alert alert-warning">
                                <b> Menu</b>: Simpanan Pokok Atas Nama <?php echo "$namal" ; ?>   
                            </div>                          
                    </div>
                    <div class="row">
                        <div class="alert alert-info">
                            <br>
                            <form action="" method="post" onsubmit="return calculateTotal()">
                                <div class="input-group">
                                    <span class="input-group-text">nominal</span>
                                    <input type="text" class="form-control" name="nominal" id="nominal" oninput="calculateTotal()">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text">jumlah</span>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" oninput="calculateTotal()">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-text">total</span>
                                    <input type="text" class="form-control" name="total" id="total" readonly>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success" id="kalkulasi">Simpan</button>
                            </form>
                        </div>
                                                 
                    </div>
                        <script>
                            function calculateTotal() {
                                var nominal = parseFloat(document.getElementById('nominal').value);
                                var jumlah = parseFloat(document.getElementById('jumlah').value);
                                var total = nominal * jumlah;
                                
                                

                                if (!isNaN(total)) {
                                    document.getElementById('total').value = total.toFixed(2);
                                } else {
                                    document.getElementById('total').value = '';
                                }
                            }
                        </script>

                </div>

            <div class="col-sm-8">
                <div class="row">
                    <div class="col" style="margin-right: 300px;">
                    
                    </div>
                    <div class="col" style="margin-bottom: 5px;">
                        <span style="display: inline-block;">Search:</span> 
                        <input type="text" class="form-control" style="width: 150px; display: inline-block;">
                    </div>
                </div>
                        
                <div class="row">
                    <div class="col">
                        
                            <div class="table-responsive">
                                <table class="table table-bordered style='width:100%'">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>tangggal</th>                                 
                                        <th>nominal</th>
                                        <th>jumlah</th>
                                        <th>total</th>
                                        <th>validasibank</th>
                                        <th>statustagihan</th>
                                        <th>briva</th>
                                        <th>jatuhtempo</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <?php
                                        $no = 1;
                                        $data = mysqli_query($konektor,"select * from msimpok");
                                        while($d = mysqli_fetch_array($data)){
                                        ?> 
                                    <tbody id="tabelbody">
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $d['tanggal'];?></td>
                                        <td><?php echo $d['nominal'];?></td>
                                        <td><?php echo $d['jumlah'];?></td>
                                        <td><?php echo $d['total'];?></td>
                                        <td><?php echo $d['validasi_bank'];?></td>
                                        <td><?php echo $d['status_tagihan'];?></td>
                                        <td><?php echo $d['briva'];?></td>
                                        <td><?php echo $d['jatuh_tempo'];?></td>
                                        <td><?php echo 'Aksi';?></td>
                                    </tr>
                                    <?php }?>                               
                                    </tbody>
                                </table>
                             </div>  
                                                                                           
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        <a href="#"  class="previous" id="previousBtn">&laquo; Previous</a>
                        <a href="#"  class="next" id="nextBtn">Next &raquo;</a>                                         
                    </div>
                </div>
                                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const table = document.querySelector(".table");
                                const rows = table.querySelectorAll("tbody tr");
                                const numRowsPerPage = 2;
                                let currentPage = 1;

                                function showPage(page) {
                                    const startIndex = (page - 1) * numRowsPerPage;
                                    const endIndex = startIndex + numRowsPerPage;
                                    rows.forEach((row, index) => {
                                        if (index >= startIndex && index < endIndex) {
                                            row.style.display = "table-row";
                                        } else {
                                            row.style.display = "none";
                                        }
                                    });
                                }

                                function goToPage(page) {
                                    if (page < 1) {
                                        currentPage = 1;
                                    } else if (page > Math.ceil(rows.length / numRowsPerPage)) {
                                        currentPage = Math.ceil(rows.length / numRowsPerPage);
                                    } else {
                                        currentPage = page;
                                    }
                                    showPage(currentPage);
                                }

                                document.getElementById("previousBtn").addEventListener("click", function (event) {
                                    event.preventDefault();
                                    goToPage(currentPage - 1);
                                });

                                document.getElementById("nextBtn").addEventListener("click", function (event) {
                                    event.preventDefault();
                                    goToPage(currentPage + 1);
                                });

                                showPage(currentPage);
                            });
                        </script>

                <hr>
                <div class="row">
                    <div class="col">
                      <h2>Total Tagihan = Rp.<?php echo "$simpok"?></h2>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                     <p>Terbilang = Tuju Ratus Lima Puluh Ribu Rupiah</p>
                     <a href="laporan_simpok_pdf.php" class="btn btn-none"><button type="submit" class="btn btn-warning">Laporan Pdf</button></a>
                     <a href="laporan_simpok_excel.php" class="btn btn-none"><button type="submit" class="btn btn-success">Laporan Excel</button></a>
                    </div>
                </div>


            </div>

           

        </div>




        <br><br>
        <?php include 'assets/kaki.php'; ?>
        <script>
                                                var currentPage = 1;
                                                var rowsPerPage = 2;
                                                var tbody = document.getElementById("tabelbody");
                                                var rows = tbody.getElementsByTagName("tr");

                                                function nextPage() {
                                                    var totalPages = Math.ceil(rows.length / rowsPerPage);
                                                    var start = (currentPage - 1) * rowsPerPage;
                                                    var end = start + rowsPerPage;
                                                    
                                                    // Menampilkan baris untuk halaman saat ini
                                                    for (var i = start; i < end; i++) {
                                                        if (rows[i]) {
                                                            rows[i].classList.remove("hidden");
                                                        }
                                                    }

                                                    // Menyembunyikan baris untuk halaman sebelumnya
                                                    for (var j = start - rowsPerPage; j < start; j++) {
                                                        if (rows[j]) {
                                                            rows[j].classList.add("hidden");
                                                        }
                                                    }

                                                    currentPage++;

                                                    // Menyembunyikan tombol Next jika halaman terakhir
                                                    if (currentPage > totalPages) {
                                                        document.querySelector("a.next").style.display = "none";
                                                    }
                                                }

                                                function previousPage() {
                                                    if (currentPage > 1) {
                                                        currentPage--;

                                                        var totalPages = Math.ceil(rows.length / rowsPerPage);
                                                        var start = (currentPage - 1) * rowsPerPage;
                                                        var end = start + rowsPerPage;

                                                        // Menampilkan baris untuk halaman saat ini
                                                        for (var i = start; i < end; i++) {
                                                            if (rows[i]) {
                                                                rows[i].classList.remove("hidden");
                                                            }
                                                        }

                                                        // Menyembunyikan baris untuk halaman setelahnya
                                                        for (var j = end; j < end + rowsPerPage; j++) {
                                                            if (rows[j]) {
                                                                rows[j].classList.add("hidden");
                                                            }
                                                        }

                                                        // Menampilkan tombol Next jika bukan halaman terakhir
                                                        document.querySelector("a.next").style.display = "inline";
                                                    }

                                                    // Menyembunyikan tombol Previous jika halaman pertama
                                                    if (currentPage === 1) {
                                                        document.querySelector("a.previous").style.display = "inline";
                                                    }
                                                }
                                            </script>
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
