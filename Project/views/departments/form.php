<?php
// Menentukan apakah form digunakan untuk edit atau tambah.
$editing = isset($department);
$action = $editing ? 'update' : 'store';
?>

<!-- Card form Department. -->
<div class="card col-lg-5 mx-auto">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><?= $editing ? 'Edit' : 'Tambah' ?> Department</h4>
    </div>

    <div class="card-body">
        <form method="post" action="index.php?resource=departments&action=<?= $action ?>">
            <?php if ($editing): ?>
                <!-- ID dibutuhkan oleh operasi update. -->
                <input type="hidden" name="id" value="<?= $department['id'] ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" name="name"
                       value="<?= htmlspecialchars($department['name'] ?? '') ?>" required>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a class="btn btn-secondary" href="index.php?resource=departments">Batal</a>
        </form>
    </div>
</div>
