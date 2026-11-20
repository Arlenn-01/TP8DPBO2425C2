<!-- Header daftar course dan tombol membuka form tambah. -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Courses</h2>
    <a class="btn btn-primary" href="index.php?resource=courses&action=create">
        Tambah Course
    </a>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Lecturer</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Menampilkan course beserta nama lecturer hasil JOIN model. -->
        <?php foreach ($courses as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['lecturer_name']) ?></td>
                <td>
                    <!-- Mengirim ID course ke action edit. -->
                    <a class="btn btn-sm btn-success"
                       href="index.php?resource=courses&action=edit&id=<?= $row['id'] ?>">
                        Edit
                    </a>
                    <!-- Mengirim ID course ke action delete. -->
                    <a class="btn btn-sm btn-danger"
                       href="index.php?resource=courses&action=delete&id=<?= $row['id'] ?>"
                       onclick="return confirm('Hapus course ini?')">
                        Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
