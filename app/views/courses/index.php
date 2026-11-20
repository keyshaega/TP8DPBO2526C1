<?php require __DIR__ . '/../layouts/header.php'; ?>
<section class="hero"><h1 class="h3 fw-bold">Data Mata Kuliah</h1><p class="mb-0">Kelola mata kuliah dan hubungkan dengan dosen pengampu.</p></section>
<?php if(isset($_GET["status"])): ?><div class="alert alert-success"><?= htmlspecialchars(["created"=>"Mata kuliah berhasil ditambahkan.","updated"=>"Mata kuliah berhasil diperbarui.","deleted"=>"Permintaan hapus diproses.","notfound"=>"Data tidak ditemukan."][$_GET["status"]] ?? "Aksi selesai.") ?></div><?php endif; ?>
<div class="card p-4"><div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h5 mb-0">Daftar Mata Kuliah</h2><a class="btn btn-primary" href="index.php?controller=course&action=create">+ Tambah Mata Kuliah</a></div>
<div class="table-responsive"><table class="table table-hover align-middle"><thead><tr><th>ID</th><th>Kode</th><th>Nama Mata Kuliah</th><th>SKS</th><th>Dosen Pengampu</th><th>Aksi</th></tr></thead><tbody>
<?php if(!$courses): ?><tr><td colspan="6" class="text-center text-muted py-4">Belum ada data mata kuliah.</td></tr><?php endif; ?>
<?php foreach($courses as $row): ?><tr><td><?= (int)$row["id"] ?></td><td><?= htmlspecialchars($row["course_code"]) ?></td><td><?= htmlspecialchars($row["course_name"]) ?></td><td><?= (int)$row["credits"] ?></td><td><?= htmlspecialchars($row["lecturer_name"]) ?></td>
<td class="text-nowrap"><a class="btn btn-sm btn-warning" href="index.php?controller=course&action=edit&id=<?= (int)$row["id"] ?>">Edit</a>
<form class="d-inline" method="post" action="index.php?controller=course&action=delete" onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?')"><input type="hidden" name="id" value="<?= (int)$row["id"] ?>"><button class="btn btn-sm btn-danger">Hapus</button></form></td></tr><?php endforeach; ?>
</tbody></table></div></div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
