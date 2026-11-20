<?php

// Controller Course mengatur permintaan pengguna untuk CRUD courses.
class CourseController
{
    // Menampilkan course beserta lecturer pengampunya hasil JOIN model.
    public function index(): void
    {
        $courses = Course::all();
        $title = 'Daftar Course';

        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . '/../views/courses/index.php';
        require __DIR__ . '/../views/templates/footer.php';
    }

    // Menyiapkan pilihan lecturer lalu membuka form tambah course.
    public function create(): void
    {
        $lecturers = Lecturer::all();
        $title = 'Tambah Course';

        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . '/../views/courses/form.php';
        require __DIR__ . '/../views/templates/footer.php';
    }

    // Menyimpan course baru beserta lecturer_id yang dipilih.
    public function store(): void
    {
        Course::create($_POST);
        header('Location: index.php?resource=courses');
        exit;
    }

    // Mengambil course lama dan daftar lecturer untuk form edit.
    public function edit(): void
    {
        $course = Course::find((int) ($_GET['id'] ?? 0));
        $lecturers = Lecturer::all();

        // Kembali ke daftar jika course tidak ditemukan.
        if (!$course) {
            header('Location: index.php?resource=courses');
            exit;
        }

        $title = 'Edit Course';

        require __DIR__ . '/../views/templates/header.php';
        require __DIR__ . '/../views/courses/form.php';
        require __DIR__ . '/../views/templates/footer.php';
    }

    // Memperbarui course berdasarkan ID yang dikirim form.
    public function update(): void
    {
        Course::update((int) $_POST['id'], $_POST);
        header('Location: index.php?resource=courses');
        exit;
    }

    // Menghapus course berdasarkan ID pada parameter URL.
    public function delete(): void
    {
        Course::delete((int) ($_GET['id'] ?? 0));
        header('Location: index.php?resource=courses');
        exit;
    }
}
