<!-- Template header memuat metadata, aset CSS, dan navbar bersama. -->
<!doctype html>
<html lang="id">

<head>
    <!-- Encoding karakter agar teks berbahasa Indonesia dapat ditampilkan dengan benar. -->
    <meta charset="utf-8">

    <!-- Membuat tampilan responsif pada perangkat dengan berbagai ukuran layar. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Judul diambil dari variabel yang disiapkan controller. -->
    <title><?= htmlspecialchars($title ?? 'Lecturers') ?></title>

    <!-- Memuat Bootstrap CSS dari folder aset lokal Project. -->
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>

<body>
    <!-- Navbar utama menautkan ketiga fitur CRUD. -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Lecturers MVC</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?resource=lecturers">Lecturers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?resource=departments">Departments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?resource=courses">Courses</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mulai wrapper konten utama; penutupnya ada pada footer. -->
    <div class="container my-4">
