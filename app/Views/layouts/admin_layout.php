<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?> - Admin Blockbuster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #f8f9fa; color: #333; }
        .sidebar { min-height: 100vh; background: #212529; color: white; }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 10px 20px; display: block; }
        .sidebar a:hover, .sidebar a.active { background: #343a40; color: #ffc107; }
        .main-content { padding: 20px; }
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar shadow-sm">
                <div class="position-sticky pt-3">
                    <h5 class="text-center text-warning fw-bold mb-4">ADMIN PANEL</h5>
                    <ul class="nav flex-column">
                        <li><a href="<?= base_url('/admin/dashboard') ?>"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a></li>
                        <li><a href="<?= base_url('/admin/streaming') ?>"><i class="bi bi-film me-2"></i> Streaming</a></li>
                        <li><a href="<?= base_url('/admin/usuarios') ?>"><i class="bi bi-people me-2"></i> Usuarios</a></li>
                        <li><a href="<?= base_url('/admin/generos') ?>"><i class="bi bi-tags me-2"></i> Géneros</a></li>
                        <li><a href="<?= base_url('/admin/planes') ?>"><i class="bi bi-card-list me-2"></i> Planes</a></li>
                        <hr class="text-secondary">
                        <li><a href="<?= base_url('/salir') ?>" class="text-danger"><i class="bi bi-box-arrow-left me-2"></i> Salir</a></li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?= $titulo ?></h1>
                    <span class="text-muted">Bienvenido, <?= session()->get('nombre') ?></span>
                </div>
                
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>
</body>
</html>