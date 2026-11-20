<?php if (!isset($pageTitle)) $pageTitle = "Lecturers Management"; ?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($pageTitle) ?> | Lecturer Management</title>
<link rel="stylesheet" href="public/assets/bootstrap.min.css">
<style>
:root{--navy:#243b53;--blue:#3b82a0;--ink:#263445;--muted:#718096;--line:#e7edf3}
body{background:#f7f9fc;color:var(--ink);font-family:system-ui,-apple-system,"Segoe UI",sans-serif}
.navbar{background:#fff!important;border-bottom:1px solid var(--line);box-shadow:0 2px 8px rgba(25,45,70,.03)}
.navbar-brand{color:var(--navy)!important;font-size:1.08rem;letter-spacing:-.2px}
.nav-link{color:#607286!important;padding:.65rem .9rem!important;border-radius:7px;margin-left:4px}
.nav-link:hover,.nav-link:focus{background:#f0f5f9;color:var(--navy)!important}
.content{min-height:78vh;padding-top:24px;padding-bottom:36px}
.hero{background:transparent;color:var(--ink);border-radius:0;padding:4px 0 18px;margin:0 0 14px}
.hero h1{font-size:1.55rem;margin-bottom:5px}
.hero p{color:var(--muted);font-size:.94rem}
.card{border:1px solid var(--line);border-radius:12px;box-shadow:0 3px 12px rgba(25,45,70,.035)}
.table{margin-bottom:0}
.table thead th{background:#f1f5f9;color:#536579;font-size:.84rem;font-weight:600;border-bottom:1px solid var(--line);padding:12px}
.table td{padding:12px;color:#425466;font-size:.92rem}
.table-hover tbody tr:hover{background:#f8fbfd}
.btn{border-radius:7px;font-weight:500}
.btn-primary{background:#315f80;border-color:#315f80}
.btn-primary:hover{background:#264d69;border-color:#264d69}
.btn-warning{background:#f3c969;border-color:#f3c969;color:#493914}
.form-control,.form-select{border-color:#dce4ec;border-radius:7px;padding:.62rem .75rem}
.form-control:focus,.form-select:focus{border-color:#8fb2c9;box-shadow:0 0 0 .2rem rgba(59,130,160,.12)}
.form-label{font-size:.9rem;font-weight:600;color:#425466}
.alert{border-radius:9px}
.footer{color:#98a5b3;padding:18px 0;text-align:center;font-size:12px;border-top:1px solid var(--line)}
</style>
</head><body>
<nav class="navbar navbar-expand-lg">
<div class="container"><a class="navbar-brand fw-semibold" href="index.php">📚 Lecturer Management</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="nav"><div class="navbar-nav ms-auto">
<a class="nav-link" href="index.php?controller=lecturer&action=index">Data Dosen</a>
<a class="nav-link" href="index.php?controller=course&action=index">Mata Kuliah</a>
</div></div></div></nav>
<main class="container content">
