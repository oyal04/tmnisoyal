<?php

session_start();

include '../assets/konektor.php';

$simpok = 750000;
$_SESSION['simpok'] = $simpok;
$namal = $_SESSION['namal'];

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="white">
<head>
  <title>Castelo</title>
  <?php include 'assets/cdn.php'; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    #content {
        margin: 20px;
    }
    .header {
        text-align: center;
        margin-bottom: 20px;
    }
    .header b {
        font-size: 18px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th {
        background-color: #f2f2f2;
    }
  </style>
</head>
<body>
<div id="content">
    <div class="container pt-0 shadow p-0 mb-0 bg-white">         
        <div class="row ms-2">        
            <div class="col-sm-12">   
                <div class="header">              
                    <b>Laporan Simpanan Pokok Atas Nama <?php echo htmlspecialchars($namal); ?></b>
                </div>
                <table class="table table-bordered" id="tab">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #000; padding: 8px; text-align: left;" >No</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: left;" >Tanggal</th>                                 
                            <th style="border: 1px solid #000; padding: 8px; text-align: left;" >Nominal</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: left;" >Jumlah</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: left;" >Total</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: left;" >Validasi Bank</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: left;" >Status Tagihan</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: left;" >Briva</th>
                            <th style="border: 1px solid #000; padding: 8px; text-align: left;" >Jatuh Tempo</th>
                        </tr>
                    </thead>
                    <tbody id="tabelbody">
                    <?php
                        $no = 1;
                        $data = mysqli_query($konektor, "SELECT * FROM msimpok");
                        while($d = mysqli_fetch_array($data)){
                    ?> 
                        <tr>
                            <td style="border: 1px solid #000; padding: 8px; text-align: left;" ><?php echo $no++; ?></td>
                            <td style="border: 1px solid #000; padding: 8px; text-align: left;" ><?php echo htmlspecialchars($d['tanggal']); ?></td>
                            <td style="border: 1px solid #000; padding: 8px; text-align: left;" ><?php echo htmlspecialchars($d['nominal']); ?></td>
                            <td style="border: 1px solid #000; padding: 8px; text-align: left;" ><?php echo htmlspecialchars($d['jumlah']); ?></td>
                            <td style="border: 1px solid #000; padding: 8px; text-align: left;" ><?php echo htmlspecialchars($d['total']); ?></td>
                            <td style="border: 1px solid #000; padding: 8px; text-align: left;" ><?php echo htmlspecialchars($d['validasi_bank']); ?></td>
                            <td style="border: 1px solid #000; padding: 8px; text-align: left;" ><?php echo htmlspecialchars($d['status_tagihan']); ?></td>
                            <td style="border: 1px solid #000; padding: 8px; text-align: left;" ><?php echo htmlspecialchars($d['briva']); ?></td>
                            <td style="border: 1px solid #000; padding: 8px; text-align: left;" ><?php echo htmlspecialchars($d['jatuh_tempo']); ?></td>
                        </tr>
                    <?php } ?>                               
                    </tbody>
                </table>
            </div>
        </div>                                                          
    </div>
</div>
<script>
    window.onload = () => {
        const element = document.getElementById("content");
        html2pdf().from(element).set({
            filename: 'output.pdf',
            margin: 1,
            html2canvas: { scale: 2 },
            jsPDF: { format: 'a4', orientation: 'portrait' }
        }).save();
    };
</script>
</body>
</html>
