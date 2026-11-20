<?php require __DIR__ . '/../layouts/header.php'; ?>
<section class="hero"><h1 class="h3 fw-bold"><?= htmlspecialchars($pageTitle) ?></h1><p class="mb-0">Lengkapi data mata kuliah dan tentukan dosen pengampunya.</p></section>
<div class="card p-4 mx-auto" style="max-width:680px">
<?php if(!$lecturers): ?><div class="alert alert-warning">Tambahkan data dosen terlebih dahulu sebelum membuat mata kuliah.</div><?php endif; ?>
<?php if($errors): ?><div class="alert alert-danger"><ul class="mb-0"><?php foreach($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form method="post" action="index.php?controller=course&action=<?= $formAction ?>">
<div class="mb-3"><label class="form-label">Nama Mata Kuliah</label><input class="form-control" name="course_name" required value="<?= htmlspecialchars($course["course_name"] ?? $_POST["course_name"] ?? "") ?>"></div>
<div class="mb-3"><label class="form-label">Kode Mata Kuliah</label><input class="form-control" name="course_code" required value="<?= htmlspecialchars($course["course_code"] ?? $_POST["course_code"] ?? "") ?>"></div>
<div class="mb-3"><label class="form-label">Jumlah SKS</label><input type="number" min="1" class="form-control" name="credits" required value="<?= htmlspecialchars($course["credits"] ?? $_POST["credits"] ?? "2") ?>"></div>
<div class="mb-3"><label class="form-label">Dosen Pengampu</label><select class="form-select" name="lecturer_id" required><option value="">-- Pilih Dosen --</option>
<?php foreach($lecturers as $lecturer): $selected = (string)($course["lecturer_id"] ?? $_POST["lecturer_id"] ?? "") === (string)$lecturer["id"]; ?><option value="<?= (int)$lecturer["id"] ?>" <?= $selected ? "selected" : "" ?>><?= htmlspecialchars($lecturer["name"]) ?></option><?php endforeach; ?>
</select></div>
<button class="btn btn-primary" <?= !$lecturers ? "disabled" : "" ?>>Simpan</button> <a class="btn btn-outline-secondary" href="index.php?controller=course&action=index">Batal</a>
</form></div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
