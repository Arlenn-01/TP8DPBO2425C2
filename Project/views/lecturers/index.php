<!-- Tombol untuk membuka form create lecturer. -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lecturers</h2>
    <a class="btn btn-primary" href="index.php?resource=lecturers&action=create">
        Tambah Lecturer
    </a>
</div>

<!-- Menampilkan data lecturer dalam tabel Bootstrap. -->
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>NIDN</th>
            <th>Phone</th>
            <th>Join Date</th>
            <th>Department</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop setiap lecturer yang dikirim dari LecturerController::index(). -->
        <?php foreach ($lecturers as $row): ?>
            <tr>
                <!-- htmlspecialchars mencegah karakter berbahaya ditampilkan sebagai HTML mentah. -->
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['nidn']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['join_date']) ?></td>
                <td><?= htmlspecialchars($row['department_name'] ?? '-') ?></td>
                <td>
                    <!-- Mengirim ID lecturer ke aksi edit pada controller. -->
                    <a class="btn btn-sm btn-success"
                       href="index.php?resource=lecturers&action=edit&id=<?= $row['id'] ?>">
                        Edit
                    </a>
                    <!-- Mengirim ID lecturer ke aksi delete dan meminta konfirmasi terlebih dahulu. -->
                    <a class="btn btn-sm btn-danger"
                       href="index.php?resource=lecturers&action=delete&id=<?= $row['id'] ?>"
                       onclick="return confirm('Hapus lecturer ini?')">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
