<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark"
        style="background-image: url(../assets/navbar.jpg);background-size:cover;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../assets/logobesar.png" width="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="beranda.php">KSP T-MANIS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keanggotaan.php">Keanggotaan</a>
                    </li>
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a style="text-align" class="btn  dropdown-toggle">Simpanan</a>
                            <ul class="dropdown-menu">
                                <li style="text-align:left" class="nav-item"><a class="dropdown-item"
                                        href="simpananpokok.php">Simpanan
                                        Pokok</a></li>
                                <li style="text-align:left" class="nav-item"><a class="dropdown-item"
                                        href="simpananwajib.php">Simpanan
                                        Wajib</a></li>
                                <li style="text-align:left" class="nav-item"><a class="dropdown-item"
                                        href="simpanansukarela.php">Simpanan
                                        Sukarela</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pinjaman.php">Pinjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="administrasi.php">Biaya Administrasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="debet.php">Debet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="berkas.php">Berkas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="bantuan.php">Bantuan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="assets/logout.php">Logout</a>
                        </li>

                    </ul>
            </div>
        </div>
    </nav>
    <script>
    const dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('mouseover', () => {
            dropdown.querySelector('.dropdown-menu').classList.add('show');
        });

        dropdown.addEventListener('mouseout', () => {
            dropdown.querySelector('.dropdown-menu').classList.remove('show');
        });
    });
    </script>
    <style>
    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 2;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }
    </style>
    <div class="container-fluid mt-3">

    </div>

</body>

</html>