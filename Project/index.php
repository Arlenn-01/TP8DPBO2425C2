<?php
// Memulai session agar aplikasi dapat menyimpan status/flash message jika dikembangkan lebih lanjut.
session_start();

// Memuat koneksi database yang digunakan seluruh model.
require_once __DIR__ . '/models/DB.php';

// Memuat model untuk mengakses tabel lecturers, departments, dan courses.
require_once __DIR__ . '/models/Lecturer.php';
require_once __DIR__ . '/models/Department.php';
require_once __DIR__ . '/models/Course.php';

// Memuat controller yang bertugas menerima permintaan dan mengatur alur CRUD.
require_once __DIR__ . '/controllers/LecturerController.php';
require_once __DIR__ . '/controllers/DepartmentController.php';
require_once __DIR__ . '/controllers/CourseController.php';

// Menentukan resource yang diminta melalui URL; lecturer menjadi halaman default.
$resource = $_GET['resource'] ?? 'lecturers';
// Menentukan aksi controller; index menampilkan daftar data sebagai aksi default.
$action = $_GET['action'] ?? 'index';

// Memilih controller sesuai resource pada URL.
switch ($resource) {
    case 'departments':
        $controller = new DepartmentController();
        break;

    case 'courses':
        $controller = new CourseController();
        break;

    default:
        $controller = new LecturerController();
        break;
}

// Mencegah error jika action yang diminta tidak tersedia pada controller.
if (!method_exists($controller, $action)) {
    $action = 'index';
}

// Menjalankan method controller yang dipilih.
$controller->$action();
