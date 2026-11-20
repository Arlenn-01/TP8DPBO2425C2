<?php
// Mengecek apakah view dipakai untuk edit; jika tidak, dipakai untuk tambah.
$editing = isset($lecturer);
// Edit mengarah ke action update, sedangkan tambah mengarah ke action store.
$action = $editing ? 'update' : 'store';
?>

<!-- Card form lecturer untuk tambah maupun edit. -->
<div class="card col-lg-7 mx-auto">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><?= $editing ? 'Edit' : 'Tambah' ?> Lecturer</h4>
    </div>

    <div class="card-body">
        <!-- Data dikirim melalui POST ke controller Lecturer. -->
        <form method="post" action="index.php?resource=lecturers&action=<?= $action ?>">
            <?php if ($editing): ?>
                <!-- ID tersembunyi dibutuhkan untuk menentukan lecturer yang diperbarui. -->
                <input type="hidden" name="id" value="<?= $lecturer['id'] ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" name="name"
                       value="<?= htmlspecialchars($lecturer['name'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">NIDN</label>
                <input class="form-control" name="nidn"
                       value="<?= htmlspecialchars($lecturer['nidn'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input class="form-control" name="phone"
                       value="<?= htmlspecialchars($lecturer['phone'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Join Date</label>
                <input type="date" class="form-control" name="join_date"
                       value="<?= htmlspecialchars($lecturer['join_date'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Department</label>
                <!-- Dropdown dibentuk dari semua data Department. -->
                <select class="form-select" name="department_id" required>
                    <option value="">Pilih Department</option>
                    <?php foreach ($departments as $department): ?>
                        <!-- Pada mode edit, department lama diberi atribut selected. -->
                        <option value="<?= $department['id'] ?>"
                            <?= ($lecturer['department_id'] ?? null) == $department['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($department['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a class="btn btn-secondary" href="index.php?resource=lecturers">Batal</a>
        </form>
    </div>
</div>
