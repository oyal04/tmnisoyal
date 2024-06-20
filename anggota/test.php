<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halaman Tabel</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .hidden {
        display: none;
    }
</style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Usia</th>
        </tr>
    </thead>
    <tbody id="tabelBody">
        <tr><td>1</td><td>John</td><td>25</td></tr>
        <tr><td>2</td><td>Jane</td><td>30</td></tr>
        <tr><td>3</td><td>Doe</td><td>35</td></tr>
        <tr class="hidden"><td>4</td><td>Mark</td><td>40</td></tr>
        <tr class="hidden"><td>5</td><td>Emily</td><td>45</td></tr>
        <tr class="hidden"><td>6</td><td>Lisa</td><td>50</td></tr>
    </tbody>
</table>

<button onclick="nextPage()">Next</button>

<script>
    var currentPage = 1;
    var rowsPerPage = 3;
    var tbody = document.getElementById("tabelBody");
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
            document.querySelector("button").style.display = "none";
        }
    }
</script>

</body>
</html>
