<?php
// Menentukan mode form berdasarkan keberadaan data course lama.
$editing = isset($course);
$action = $editing ? 'update' : 'store';
?>

<!-- Card form Course. -->
<div class="card col-lg-6 mx-auto">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><?= $editing ? 'Edit' : 'Tambah' ?> Course</h4>
    </div>

    <div class="card-body">
        <form method="post" action="index.php?resource=courses&action=<?= $action ?>">
            <?php if ($editing): ?>
                <!-- ID tersembunyi digunakan saat memperbarui course. -->
                <input type="hidden" name="id" value="<?= $course['id'] ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" name="name"
                       value="<?= htmlspecialchars($course['name'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Lecturer</label>
                <!-- Dropdown lecturer dibentuk dari tabel lecturers. -->
                <select class="form-select" name="lecturer_id" required>
                    <option value="">Pilih Lecturer</option>
                    <?php foreach ($lecturers as $lecturer): ?>
                        <!-- Pada mode edit, lecturer lama diberi atribut selected. -->
                        <option value="<?= $lecturer['id'] ?>"
                            <?= ($course['lecturer_id'] ?? null) == $lecturer['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($lecturer['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a class="btn btn-secondary" href="index.php?resource=courses">Batal</a>
        </form>
    </div>
</div>
