<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?> - Blockbuster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top { height: 400px; object-fit: cover; }
        body { background-color: #141414; color: white; }
        .navbar { background-color: #000; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold text-warning" href="#">BLOCKBUSTER</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-warning me-3" href="<?= base_url('/cliente/dashboard') ?>">Catálogo</a>
                    <a class="nav-link text-white me-3" href="<?= base_url('/cliente/mis_alquileres') ?>">Mis Rentas</a>
                <span class="nav-link text-white me-3">Hola, <?= session()->get('nombre') ?></span>
                <a class="btn btn-outline-danger btn-sm" href="<?= base_url('/salir') ?>">Cerrar Sesión</a>
            </div>
        </div>
    </nav>
    

    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <footer class="text-center mt-5 p-4 text-secondary">
        &copy; 2026 UPTX - Proyecto Final Blockbuster
    </footer>
</body>
</html>