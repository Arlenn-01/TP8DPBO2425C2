<?php

// Controller Department mengatur permintaan pengguna untuk CRUD departments.
class DepartmentController
{
    // Menampilkan seluruh department dalam bentuk tabel.
    public function index(): void
    {
        $departments = Department::all();
        $title = 'Daftar Department';

        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . '/../views/departments/index.php';
        require __DIR__ . '/../views/templates/footer.php';
    }

    // Membuka form kosong untuk menambah department baru.
    public function create(): void
    {
        $title = 'Tambah Department';

        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . '/../views/departments/form.php';
        require __DIR__ . '/../views/templates/footer.php';
    }

    // Menyimpan nama department yang dikirim melalui form POST.
    public function store(): void
    {
        Department::create(trim($_POST['name']));
        header('Location: index.php?resource=departments');
        exit;
    }

    // Mengambil department lama lalu menampilkannya pada form edit.
    public function edit(): void
    {
        $department = Department::find((int) ($_GET['id'] ?? 0));

        // Kembali ke daftar jika department tidak ditemukan.
        if (!$department) {
            header('Location: index.php?resource=departments');
            exit;
        }

        $title = 'Edit Department';

        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . '/../views/departments/form.php';
        require __DIR__ . '/../views/templates/footer.php';
    }

    // Memperbarui nama department berdasarkan ID form.
    public function update(): void
    {
        Department::update((int) $_POST['id'], trim($_POST['name']));
        header('Location: index.php?resource=departments');
        exit;
    }

    // Menghapus department dan data terkait melalui aturan foreign key database.
    public function delete(): void
    {
        Department::delete((int) ($_GET['id'] ?? 0));
        header('Location: index.php?resource=departments');
        exit;
    }
}
