<?php require __DIR__ . '/../layouts/header.php'; ?>
<section class="hero"><h1 class="h3 fw-bold">Data Dosen</h1><p class="mb-0">Kelola informasi dosen yang tersimpan di database.</p></section>
<?php if(isset($_GET["status"])): ?><div class="alert alert-success"><?= htmlspecialchars(["created"=>"Data dosen berhasil ditambahkan.","updated"=>"Data dosen berhasil diperbarui.","deleted"=>"Permintaan hapus diproses.","notfound"=>"Data tidak ditemukan."][$_GET["status"]] ?? "Aksi selesai.") ?></div><?php endif; ?>
<div class="card p-4">
<div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h5 mb-0">Daftar Dosen</h2><a class="btn btn-primary" href="index.php?controller=lecturer&action=create">+ Tambah Dosen</a></div>
<div class="table-responsive"><table class="table table-hover align-middle"><thead><tr><th>ID</th><th>Nama</th><th>NIDN</th><th>Telepon</th><th>Tanggal Bergabung</th><th>Aksi</th></tr></thead><tbody>
<?php if(!$lecturers): ?><tr><td colspan="6" class="text-center text-muted py-4">Belum ada data dosen.</td></tr><?php endif; ?>
<?php foreach($lecturers as $row): ?><tr>
<td><?= (int)$row["id"] ?></td><td><?= htmlspecialchars($row["name"]) ?></td><td><?= htmlspecialchars($row["nidn"]) ?></td><td><?= htmlspecialchars($row["phone"]) ?></td><td><?= htmlspecialchars($row["join_date"]) ?></td>
<td class="text-nowrap"><a class="btn btn-sm btn-warning" href="index.php?controller=lecturer&action=edit&id=<?= (int)$row["id"] ?>">Edit</a>
<form class="d-inline" method="post" action="index.php?controller=lecturer&action=delete" onsubmit="return confirm('Yakin ingin menghapus dosen ini?')"><input type="hidden" name="id" value="<?= (int)$row["id"] ?>"><button class="btn btn-sm btn-danger">Hapus</button></form></td></tr><?php endforeach; ?>
</tbody></table></div></div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
