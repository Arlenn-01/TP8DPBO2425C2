<?php

// Controller Lecturer mengatur permintaan pengguna untuk CRUD lecturers.
class LecturerController
{
    // Menampilkan daftar lecturer beserta nama department-nya.
    public function index(): void
    {
        $lecturers = Lecturer::all();
        $title = 'Daftar Lecturer';

        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . '/../views/lecturers/index.php';
        require __DIR__ . '/../views/templates/footer.php';
    }

    // Menyiapkan dropdown department lalu membuka form tambah lecturer.
    public function create(): void
    {
        $departments = Department::all();
        $title = 'Tambah Lecturer';

        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . '/../views/lecturers/form.php';
        require __DIR__ . '/../views/templates/footer.php';
    }

    // Menerima POST dari form dan menyimpan lecturer baru ke database.
    public function store(): void
    {
        Lecturer::create($_POST);
        header('Location: index.php?resource=lecturers');
        exit;
    }

    // Mengambil data lecturer lama lalu menampilkannya pada form edit.
    public function edit(): void
    {
        $lecturer = Lecturer::find((int) ($_GET['id'] ?? 0));
        $departments = Department::all();

        if (!$lecturer) {
            header('Location: index.php?resource=lecturers');
            exit;
        }

        $title = 'Edit Lecturer';

        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . '/../views/lecturers/form.php';
        require __DIR__ . '/../views/templates/footer.php';
    }

    // Memperbarui data lecturer berdasarkan ID yang dikirim form.
    public function update(): void
    {
        Lecturer::update((int) $_POST['id'], $_POST);
        header('Location: index.php?resource=lecturers');
        exit;
    }

    // Menghapus lecturer berdasarkan ID pada parameter URL.
    public function delete(): void
    {
        Lecturer::delete((int) ($_GET['id'] ?? 0));
        header('Location: index.php?resource=lecturers');
        exit;
    }
}
