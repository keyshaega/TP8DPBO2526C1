<?php require __DIR__ . '/../layouts/header.php'; ?>
<section class="hero"><h1 class="h3 fw-bold"><?= htmlspecialchars($pageTitle) ?></h1><p class="mb-0">Isi informasi dosen pada formulir berikut.</p></section>
<div class="card p-4 mx-auto" style="max-width:680px">
<?php if($errors): ?><div class="alert alert-danger"><ul class="mb-0"><?php foreach($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form method="post" action="index.php?controller=lecturer&action=<?= $formAction ?>">
<div class="mb-3"><label class="form-label">Nama Dosen</label><input class="form-control" name="name" required value="<?= htmlspecialchars($lecturer["name"] ?? $_POST["name"] ?? "") ?>"></div>
<div class="mb-3"><label class="form-label">NIDN</label><input class="form-control" name="nidn" required value="<?= htmlspecialchars($lecturer["nidn"] ?? $_POST["nidn"] ?? "") ?>"></div>
<div class="mb-3"><label class="form-label">Nomor Telepon</label><input class="form-control" name="phone" required value="<?= htmlspecialchars($lecturer["phone"] ?? $_POST["phone"] ?? "") ?>"></div>
<div class="mb-3"><label class="form-label">Tanggal Bergabung</label><input type="date" class="form-control" name="join_date" required value="<?= htmlspecialchars($lecturer["join_date"] ?? $_POST["join_date"] ?? "") ?>"></div>
<button class="btn btn-primary">Simpan</button> <a class="btn btn-outline-secondary" href="index.php?controller=lecturer&action=index">Batal</a>
</form></div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
