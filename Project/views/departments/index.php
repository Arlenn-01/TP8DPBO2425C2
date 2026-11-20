<!-- Header daftar Department dan tombol pembuka form tambah. -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Departments</h2>
    <a class="btn btn-primary" href="index.php?resource=departments&action=create">
        Tambah Department
    </a>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Menampilkan setiap department yang dikirim controller. -->
        <?php foreach ($departments as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td>
                    <!-- Memuat form edit berdasarkan ID department. -->
                    <a class="btn btn-sm btn-success"
                       href="index.php?resource=departments&action=edit&id=<?= $row['id'] ?>">
                        Edit
                    </a>
                    <!-- Menghapus department dan meminta konfirmasi pengguna. -->
                    <a class="btn btn-sm btn-danger"
                       href="index.php?resource=departments&action=delete&id=<?= $row['id'] ?>"
                       onclick="return confirm('Menghapus department juga dapat menghapus lecturer terkait. Lanjutkan?')">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
